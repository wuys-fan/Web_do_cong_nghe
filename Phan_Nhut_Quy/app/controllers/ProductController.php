<?php
// Require các file cần thiết
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/models/AccountModel.php'); 

class ProductController
{
    private $productModel;
    private $db;
    private $categoryModel;
    private $accountModel; 

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->categoryModel = new CategoryModel($this->db);
        $this->accountModel = new AccountModel($this->db);
    }

    // Hiển thị danh sách sản phẩm
    public function list()
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        // Lấy danh sách sản phẩm từ ProductModel
        $products = $this->productModel->getProducts();
        $categories = $this->categoryModel->getCategories();
        include 'app/views/product/list.php';
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $categories = $this->categoryModel->getCategories();
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Hiển thị form thêm sản phẩm
    public function add()
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        $categories = $this->categoryModel->getCategories();
        include_once 'app/views/product/add.php';
    }

    // Xử lý lưu sản phẩm mới
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            // Xử lý upload hình ảnh
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'public/img/';
                $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];

                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                        $imagePath = $targetFile;
                    }
                }
            }

            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $imagePath);

            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /PHAN_NHUT_QUY/Product/list');
            }
        }
    }

    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        $product = $this->productModel->getProductById($id);
        $categories = $this->categoryModel->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Xử lý cập nhật sản phẩm
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];

            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id);

            if ($edit) {
                header('Location: /PHAN_NHUT_QUY/Product/list');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }

    // Xử lý xóa sản phẩm
    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /PHAN_NHUT_QUY/Product/list');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
        public function addToCart($id)
    {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        } if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image
            ];
        }
        header('Location: /PHAN_NHUT_QUY/Product/cart');
    }
    public function cart()
    {
        $categories = $this->categoryModel->getCategories();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }
    public function checkout()
    {
        $account = $this->accountModel->getAccountByUsername($_SESSION['username'] ?? '');
        $categories = $this->categoryModel->getCategories();
        include 'app/views/product/checkout.php';
    }
    public function processCheckout()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

    // Kiểm tra giỏ hàng
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Giỏ hàng trống.";
        return;
        }

    // Bắt đầu giao dịch
    $this->db->beginTransaction();
    try {
        // Lưu thông tin đơn hàng vào bảng orders
        $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
        $order_id = $this->db->lastInsertId();

        // Lưu chi tiết đơn hàng vào bảng order_details
        $cart = $_SESSION['cart'];
        foreach ($cart as $product_id => $item) {
            $query = "INSERT INTO order_details (order_id, product_id, quantity, price) 
            VALUES (:order_id, :product_id, :quantity, :price)";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':quantity', $item['quantity']);
            $stmt->bindParam(':price', $item['price']);
            $stmt->execute();
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);

        // Commit giao dịch
        $this->db->commit();

        // Chuyển hướng đến trang xác nhận đơn hàng
        header('Location: /PHAN_NHUT_QUY/Product/orderConfirmation');
    } catch (Exception $e) {
        // Rollback giao dịch nếu có lỗi
        $this->db->rollBack();
        echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
    }
    }
    }
    public function orderConfirmation()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/product/orderConfirmation.php';
    }
    public function updateCart($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            header('Location: /PHAN_NHUT_QUY/Product/cart');
            return;
        }
        $action = $_GET['action'] ?? '';
        if ($action === 'increase') {
            $_SESSION['cart'][$id]['quantity']++;
        } elseif ($action === 'decrease') {
            $_SESSION['cart'][$id]['quantity']--;
            if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: /PHAN_NHUT_QUY/Product/cart');
    }

    public function removeFromCart($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: /PHAN_NHUT_QUY/Product/cart');
    }
}
?>