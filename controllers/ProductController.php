<?php
class ProductController {
    public function index() {
        require_once 'models/ProductModel.php';
        $model = new ProductModel();
        require_once 'views/productpage.php';
    }
}
?>