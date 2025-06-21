<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/utils/JWTHandler.php');

class ProductApiController
{
    private $productModel;
    private $db;
    private $jwtHandler; //

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->jwtHandler = new JWTHandler(); //
    }
    private function authenticate()
{
$headers = apache_request_headers();if (isset($headers['Authorization'])) {
$authHeader = $headers['Authorization'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1] ?? null;
if ($jwt) {
$decoded = $this->jwtHandler->decode($jwt);
return $decoded ? true : false;
}
}
return false;
}

    // Lấy danh sách sản phẩm
    public function index()
    {
        header('Content-Type: application/json');
        $products = $this->productModel->getProducts();
        echo json_encode($products);
    }

    // Lấy thông tin sản phẩm theo ID
    public function show($id)
    {
        header('Content-Type: application/json');
        $product = $this->productModel->getProductById($id);
        if ($product) {
            echo json_encode($product);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Product not found']);
        }
    }

    // Thêm sản phẩm mới
    public function store()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $category_id = $data['category_id'] ?? null;
        $image = $data['image'] ?? null;

        // Nếu có ảnh base64 mới
        if (!empty($data['image_base64'])) {
            $imageData = $data['image_base64'];
            $imagePath = 'public/img/' . uniqid() . '.jpg';
            $img = explode(',', $imageData);
            if (count($img) == 2) {
                file_put_contents($imagePath, base64_decode($img[1]));
                $image = $imagePath;
            }
        }

        $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);

        if (is_array($result)) {
            http_response_code(400);
            echo json_encode(['errors' => $result]);
        } else {
            http_response_code(201);
            echo json_encode(['message' => 'Product created successfully']);
        }
    }

    // Cập nhật sản phẩm theo ID
    public function update($id)
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $category_id = $data['category_id'] ?? null;
@        $image = $data['image'] ?? null;

        // Nếu có ảnh base64 mới
        if (!empty($data['image_base64'])) {
            $imageData = $data['image_base64'];
            $imagePath = 'public/img/' . uniqid() . '.jpg';
            $img = explode(',', $imageData);
            if (count($img) == 2) {
                file_put_contents($imagePath, base64_decode($img[1]));
                $image = $imagePath;
            }
        }

        $result = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image);

        if ($result) {
            echo json_encode(['message' => 'Product updated successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Product update failed']);
        }
    }

    // Xóa sản phẩm theo ID
    public function destroy($id)
    {
        header('Content-Type: application/json');
        $result = $this->productModel->deleteProduct($id);
        if ($result) {
            echo json_encode(['message' => 'Product deleted successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Product deletion failed']);
        }
    }
}
?>