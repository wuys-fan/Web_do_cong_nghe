<?php
// Require các file cần thiết
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
class DefaultController
{
    private $categoryModel;
    private $productModel;
    private $db;
     public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
        $this->productModel = new ProductModel($this->db);
    }


    public function index()
    {
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        if ($category_id) {
            $products = $this->productModel->getProductsByCategory($category_id);
        } else {
            $products = $this->productModel->getProducts();
        }
        $categories = $this->categoryModel->getCategories();
        
        include 'app/views/home.php';
    }
}