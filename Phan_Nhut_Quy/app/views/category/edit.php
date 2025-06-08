<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Sửa danh mục</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="POST" action="/PHAN_NHUT_QUY/Category/update" class="p-4 bg-white shadow rounded">
        <input type="hidden" name="id" value="<?php echo $category->id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" id="name" name="name" class="form-control" required value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/PHAN_NHUT_QUY/Category/list" class="btn btn-secondary">Quay lại danh sách</a>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>