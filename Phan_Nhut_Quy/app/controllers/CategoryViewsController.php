<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryViewsController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Hiển thị danh sách danh mục
    public function list()
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        // Lấy danh mục và tổng sản phẩm mỗi danh mục
        $sql = "SELECT c.*, (SELECT COUNT(*) FROM product p WHERE p.category_id = c.id) AS total_products FROM category c";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
        include 'app/views/api/category/list.php';
    }

    // Hiển thị chi tiết danh mục
    public function show($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/api/category/show.php';
        } else {
            echo "Không thấy danh mục.";
        }
    }

    // Hiển thị form thêm danh mục
    public function add()
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        include 'app/views/api/category/add.php';
    }

    // Xử lý lưu danh mục mới
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory($name, $description);

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/api/category/add.php';
            } else {
                header('Location: /PHAN_NHUT_QUY/Category/list');
            }
        }
    }

    // Hiển thị form sửa danh mục
    public function edit($id)
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/api/category/edit.php';
        } else {
            echo "Không thấy danh mục.";
        }
    }

    // Xử lý cập nhật danh mục
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $edit = $this->categoryModel->updateCategory($id, $name, $description);

            if ($edit) {
                header('Location: /PHAN_NHUT_QUY/Category/list');
            } else {
                echo "Đã xảy ra lỗi khi lưu danh mục.";
            }
        }
    }

    // Xử lý xóa danh mục
    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /PHAN_NHUT_QUY/Category/list');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }
}
?>