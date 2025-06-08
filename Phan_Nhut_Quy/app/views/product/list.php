<?php include 'app/views/shares/header.php'; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-dark fw-bold">Danh Sách Sản Phẩm</h1>
        <a href="/PHAN_NHUT_QUY/Product/add" class="btn btn-success fw-medium">
            <i class="fas fa-plus me-2"></i>Thêm Sản Phẩm Mới
        </a>
    </div>

    <div class="row g-4">
        <?php foreach ($products as $product): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm product-card">
                <!-- Product Image -->
                <div class="card-img-top position-relative" style="height: 200px; overflow: hidden;">
                    <?php if (!empty($product->image)): ?>
                        <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="w-100 h-100 object-fit-cover"
                             alt="Ảnh sản phẩm">
                    <?php else: ?>
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image text-muted fs-1"></i>
                        </div>
                    <?php endif; ?>
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-medium py-2 px-3 rounded-pill">
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>
                </div>

                <!-- Product Body -->
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold mb-2">
                        <a href="/PHAN_NHUT_QUY/Product/show/<?php echo $product->id; ?>" 
                           class="text-decoration-none text-dark hover-text-primary">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h5>
                    
                    <p class="card-text text-secondary mb-3 line-clamp-2" 
                       style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <p class="mb-0 fw-bold text-danger fs-5">
                            <?php echo number_format($product->price, 0, ',', '.'); ?> ₫
                        </p>
                        
                        <div class="d-flex gap-2">
                            <a href="/PHAN_NHUT_QUY/Product/edit/<?php echo $product->id; ?>" 
                               class="btn btn-sm btn-outline-primary rounded-circle action-btn"
                               title="Sửa">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="/PHAN_NHUT_QUY/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-sm btn-outline-danger rounded-circle action-btn"
                               title="Xóa"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .product-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .hover-text-primary:hover {
        color: #0d6efd !important;
    }
    .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .action-btn:hover {
        transform: scale(1.1);
    }
    .object-fit-cover {
        object-fit: cover;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>