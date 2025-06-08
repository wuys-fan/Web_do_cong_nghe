<?php include 'app/views/shares/header.php'; ?>
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #0a0a1a 0%, #1a1a2e 50%, #16213e 100%); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb cyber-breadcrumb">
                        <li class="breadcrumb-item"><a href="/PHAN_NHUT_QUY/" class="text-cyan">Trang chủ</a></li>
                        <li class="breadcrumb-item active text-light">Chi tiết sản phẩm</li>
                    </ol>
                </nav>
                
                <!-- Main Product Card -->
                <div class="product-showcase">
                    <div class="row g-5 align-items-start">
                        <!-- Product Image Section -->
                        <div class="col-lg-7">
                            <div class="image-container">
                                <?php if (!empty($product->image)): ?>
                                    <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                         alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                                         class="main-product-image"
                                         id="mainImage">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/800x600?text=No+Image+Available"
                                         alt="No image"
                                         class="main-product-image"
                                         id="mainImage">
                                <?php endif; ?>
                                <div class="image-overlay">
                                    <button class="zoom-btn" onclick="openImageModal()">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Info Section -->
                        <div class="col-lg-5">
                            <div class="product-info">
                                <!-- Category Badge -->
                                <div class="category-section mb-3">
                                    <span class="category-badge">
                                        <i class="fas fa-tag"></i>
                                        <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
                                    </span>
                                </div>
                                
                                <!-- Product Title -->
                                <h1 class="product-title mb-4">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </h1>
                                
                                <!-- Price Section -->
                                <div class="price-section mb-4">
                                    <div class="current-price">
                                        <?php echo number_format($product->price, 0, ',', '.'); ?> ₫
                                    </div>
                                    <div class="price-note">
                                        <i class="fas fa-shield-alt text-success"></i>
                                        Giá đã bao gồm VAT
                                    </div>
                                </div>
                                
                                <!-- Product Description -->
                                <div class="description-section mb-5">
                                    <h3 class="section-title">
                                        <i class="fas fa-info-circle"></i>
                                        Mô tả sản phẩm
                                    </h3>
                                    <div class="description-content">
                                        <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                                    </div>
                                </div>
                                
                                <!-- Product Stats -->
                                <div class="product-stats mb-5">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="stat-card">
                                                <i class="fas fa-eye"></i>
                                                <div>
                                                    <div class="stat-number">1,234</div>
                                                    <div class="stat-label">Lượt xem</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stat-card">
                                                <i class="fas fa-star"></i>
                                                <div>
                                                    <div class="stat-number">4.8</div>
                                                    <div class="stat-label">Đánh giá</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="action-buttons">
                                    <div class="row g-3">
                                        <?php if (SessionHelper::isAdmin()): ?>
                                        <div class="col-md-6">
                                            <a href="/PHAN_NHUT_QUY/Product/edit/<?php echo $product->id; ?>" 
                                               class="btn btn-primary-custom w-100">
                                                <i class="fas fa-edit"></i>
                                                Chỉnh sửa
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (SessionHelper::isAdmin()): ?>
                                        <div class="col-md-6">
                                            <a href="/PHAN_NHUT_QUY/Product/delete/<?php echo $product->id; ?>" 
                                               class="btn btn-danger-custom w-100"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                                <i class="fas fa-trash"></i>
                                                Xóa sản phẩm
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-12">
                                            <a href="/PHAN_NHUT_QUY/Product/addToCart/<?php echo $product->id; ?>" 
                                               class="btn btn-primary-custom w-100">
                                                <i class="fas fa-shopping-cart"></i>
                                                Thêm vào giỏ hàng
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <a href="/PHAN_NHUT_QUY/" class="btn btn-outline-custom w-100">
                                                <i class="fas fa-arrow-left"></i>
                                                Quay lại danh sách sản phẩm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light">
                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img src="" alt="" class="img-fluid" id="modalImage" style="max-height: 80vh;">
            </div>
        </div>
    </div>
</div>

<style>
/* Global Styles */
.cyber-breadcrumb {
    background: rgba(0, 255, 255, 0.1);
    border-radius: 10px;
    padding: 12px 20px;
    border: 1px solid rgba(0, 255, 255, 0.3);
}

.cyber-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "▶";
    color: #00ffff;
}

.text-cyan {
    color: #00ffff !important;
    text-decoration: none;
    transition: all 0.3s ease;
}

.text-cyan:hover {
    color: #ff0080 !important;
    text-shadow: 0 0 10px #ff0080;
}

/* Product Showcase */
.product-showcase {
    background: rgba(255, 255, 255, 0.02);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(0, 255, 255, 0.2);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.3),
        0 0 30px rgba(0, 255, 255, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

/* Image Container */
.image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    background: linear-gradient(45deg, #1a1a2e, #16213e);
    padding: 20px;
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.4),
        0 0 40px rgba(0, 255, 255, 0.2);
}

.main-product-image {
    width: 100%;
    height: auto;
    min-height: 500px;
    max-height: 700px;
    object-fit: cover;
    border-radius: 15px;
    transition: transform 0.3s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}

.main-product-image:hover {
    transform: scale(1.02);
}

.image-overlay {
    position: absolute;
    top: 30px;
    right: 30px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .image-overlay {
    opacity: 1;
}

.zoom-btn {
    background: rgba(0, 255, 255, 0.9);
    border: none;
    color: #000;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
}

.zoom-btn:hover {
    background: #ff0080;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(255, 0, 128, 0.4);
}

/* Product Info */
.product-info {
    padding: 20px 0;
}

.category-section {
    margin-bottom: 20px;
}

.category-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #00ffff, #8a2be2);
    color: #000;
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(0, 255, 255, 0.3);
}

.product-title {
    font-family: 'Orbitron', 'Arial', sans-serif;
    font-size: 2.5rem;
    font-weight: 900;
    color: #fff;
    text-shadow: 
        0 0 20px rgba(0, 255, 255, 0.6),
        0 0 40px rgba(138, 43, 226, 0.4);
    line-height: 1.2;
    margin-bottom: 30px;
}

/* Price Section */
.price-section {
    background: linear-gradient(135deg, rgba(255, 0, 128, 0.1), rgba(0, 255, 255, 0.1));
    padding: 25px;
    border-radius: 15px;
    border: 1px solid rgba(255, 0, 128, 0.3);
    margin-bottom: 30px;
}

.current-price {
    font-size: 3rem;
    font-weight: 900;
    color: #ff0080;
    text-shadow: 0 0 20px rgba(255, 0, 128, 0.6);
    margin-bottom: 10px;
}

.price-note {
    color: #00ffff;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Description Section */
.description-section {
    background: rgba(255, 255, 255, 0.03);
    padding: 25px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.section-title {
    color: #00ffff;
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.description-content {
    color: #ccc;
    font-size: 1.1rem;
    line-height: 1.8;
}

/* Product Stats */
.product-stats {
    background: rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 15px;
    border: 1px solid rgba(0, 255, 255, 0.2);
}

.stat-card {
    background: linear-gradient(135deg, rgba(0, 255, 255, 0.1), rgba(138, 43, 226, 0.1));
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    border: 1px solid rgba(0, 255, 255, 0.2);
    display: flex;
    align-items: center;
    gap: 15px;
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card i {
    font-size: 2rem;
    color: #00ffff;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: 900;
    color: #fff;
}

.stat-label {
    font-size: 0.9rem;
    color: #ccc;
    margin-top: 5px;
}

/* Action Buttons */
.action-buttons {
    margin-top: 30px;
}

.btn-primary-custom {
    background: linear-gradient(135deg, #00ffff, #8a2be2);
    border: none;
    color: #000;
    font-weight: 700;
    padding: 15px 30px;
    border-radius: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 255, 255, 0.3);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-primary-custom:hover {
    background: linear-gradient(135deg, #8a2be2, #ff0080);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(138, 43, 226, 0.4);
}

.btn-danger-custom {
    background: linear-gradient(135deg, #ff0080, #8a2be2);
    border: none;
    color: #fff;
    font-weight: 700;
    padding: 15px 30px;
    border-radius: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(255, 0, 128, 0.3);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-danger-custom:hover {
    background: linear-gradient(135deg, #ff4757, #ff0080);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(255, 71, 87, 0.4);
}

.btn-outline-custom {
    background: transparent;
    border: 2px solid #00ffff;
    color: #00ffff;
    font-weight: 700;
    padding: 15px 30px;
    border-radius: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-outline-custom:hover {
    background: #00ffff;
    color: #000;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 255, 255, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-showcase {
        padding: 20px;
    }
    
    .product-title {
        font-size: 2rem;
    }
    
    .current-price {
        font-size: 2.2rem;
    }
    
    .main-product-image {
        min-height: 300px;
        max-height: 400px;
    }
    
    .stat-card {
        flex-direction: column;
        text-align: center;
    }
    
    .stat-card i {
        margin-bottom: 10px;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-showcase {
    animation: fadeInUp 0.8s ease-out;
}
</style>

<script>
function openImageModal() {
    const mainImage = document.getElementById('mainImage');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = mainImage.src;
    modalImage.alt = mainImage.alt;
    
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}

// Add smooth scrolling and parallax effects
document.addEventListener('DOMContentLoaded', function() {
    // Parallax effect for image
  
    
    // Add loading animation
    const productShowcase = document.querySelector('.product-showcase');
    if (productShowcase) {
        productShowcase.style.opacity = '0';
        productShowcase.style.transform = 'translateY(50px)';
        
        setTimeout(() => {
            productShowcase.style.transition = 'all 0.8s ease-out';
            productShowcase.style.opacity = '1';
            productShowcase.style.transform = 'translateY(0)';
        }, 200);
    }
});
</script>

<?php include 'app/views/shares/footer.php'; ?>