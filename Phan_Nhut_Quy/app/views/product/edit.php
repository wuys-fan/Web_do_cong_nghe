<!DOCTYPE html>
<html>
<head>
    <title>Sửa sản phẩm</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <a href="/PHAN_NHUT_QUY/" class="btn btn-primary home-btn">Home</a>
    <h1 class="text-center mb-4">Sửa sản phẩm</h1>
    <form method="POST" action="/PHAN_NHUT_QUY/Product/update" onsubmit="return validateForm();">
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" required value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
         <div class="form-group mb-3">
            <label for="category_id">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Hình ảnh sản phẩm" class="img-thumbnail mt-2" style="max-width: 200px;">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="/PHAN_NHUT_QUY/Product/list" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
    </form>
</div>
<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>