<?php
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');
require_once('app/utils/JWTHandler.php');

class CategoryApiController
{
    private $categoryModel;
    private $db;
    private $jwtHandler;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
        $this->jwtHandler = new JWTHandler();
    }

    /**
     * Xác thực JWT từ header Authorization
     * @return array|false Trả về dữ liệu user nếu hợp lệ, false nếu không hợp lệ
     */
    private function authenticate()
    {
        $headers = apache_request_headers();
        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
            $arr = explode(" ", $authHeader);
            $jwt = $arr[1] ?? null;
            if ($jwt) {
                $decoded = $this->jwtHandler->decode($jwt);
                return $decoded ? $decoded : false;
            }
        }
        return false;
    }

    // Lấy danh sách danh mục (ai cũng xem được)
    public function index()
    {
        header('Content-Type: application/json');
        $categories = $this->categoryModel->getCategories();
        echo json_encode($categories);
    }

    // Lấy thông tin danh mục theo ID (ai cũng xem được)
    public function show($id)
    {
        header('Content-Type: application/json');
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            echo json_encode($category);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Category not found']);
        }
    }

    // Thêm danh mục mới (chỉ admin)
    public function store()
    {
        $user = $this->authenticate();
        if (!$user || ($user['role'] ?? '') !== 'admin') {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }

        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';

        $result = $this->categoryModel->addCategory($name, $description);

        if (is_array($result)) {
            http_response_code(400);
            echo json_encode(['errors' => $result]);
        } else {
            http_response_code(201);
            echo json_encode(['message' => 'Category created successfully']);
        }
    }

    // Cập nhật danh mục theo ID (chỉ admin)
    public function update($id)
    {
        $user = $this->authenticate();
        if (!$user || ($user['role'] ?? '') !== 'admin') {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }

        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';

        $result = $this->categoryModel->updateCategory($id, $name, $description);

        if ($result) {
            echo json_encode(['message' => 'Category updated successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Category update failed']);
        }
    }

    // Xóa danh mục theo ID (chỉ admin)
    public function destroy($id)
    {
        $user = $this->authenticate();
        if (!$user || ($user['role'] ?? '') !== 'admin') {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }

        header('Content-Type: application/json');
        $result = $this->categoryModel->deleteCategory($id);
        if ($result) {
            echo json_encode(['message' => 'Category deleted successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Category deletion failed']);
        }
    }
}
?>