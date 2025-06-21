
<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">Chi tiết danh mục</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="/PHAN_NHUT_QUY/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning">Sửa</a>
            <a href="/PHAN_NHUT_QUY/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
            <a href="/PHAN_NHUT_QUY/Category/list" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>