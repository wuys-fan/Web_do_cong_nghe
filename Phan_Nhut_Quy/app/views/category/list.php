<?php include 'app/views/shares/header.php'; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-dark fw-bold">Danh Sách Danh Mục</h1>
        <a href="/PHAN_NHUT_QUY/Category/add" class="btn btn-success fw-medium">
            <i class="fas fa-plus me-2"></i>Thêm Danh Mục Mới
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th class="text-center">Tổng sản phẩm</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $index => $category): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="text-center"><?php echo $category->total_products; ?></td>
                            <td class="text-center">
                                <a href="/PHAN_NHUT_QUY/Category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="/PHAN_NHUT_QUY/Category/delete/<?php echo $category->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Không có danh mục nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>