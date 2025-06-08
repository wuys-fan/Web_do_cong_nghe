<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let errors = [];
            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }
            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là một số dương lớn hơn 0.');
            }
            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-light">
<div class="container mt-5 position-relative">
    <h1 class="text-center mb-4">Thêm sản phẩm mới</h1>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" action="/PHAN_NHUT_QUY/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();" class="p-4 bg-white shadow rounded">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category->id; ?>"><?php echo
            htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
        </div>
        
     
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        <a href="/PHAN_NHUT_QUY/Product/list" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
    </form>
</div>
<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>