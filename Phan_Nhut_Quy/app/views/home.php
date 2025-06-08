<?php include 'app/views/shares/header.php'; ?>
<?php include 'app/views/shares/leftbar.php'; ?>
<?php if (SessionHelper::isAdmin()): ?>
<?php include 'app/views/shares/rightbar.php'; ?>
<?php endif; ?>

<style>
@font-face {
    font-family: 'SVN-MissionX';
    src: url('/PHAN_NHUT_QUY/public/css/SVN-Mission X/SVN-Mission X.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
}

:root {
    --neon-blue: #00f0ff;
    --neon-pink: #ff00a0;
    --neon-green: #00ff41;
    --dark-bg: #0d0d1f;
    --grid-color: rgba(0, 255, 255, 0.1);
}

body,
.cyber-header,
.cyber-title,
.cyber-subtitle,
.product-card,
.product-card-title,
.product-card-price,
.product-card-description,
.product-name,
.product-price,
.product-description,
.product-info,
.btn-tech,
.btn-outline-tech,
.btn-cyber-primary,
.btn-cyber-secondary,
.banner-main-title,
.cyber-tag,
.cyber-gradient-text,
.home-container,
.product-badge,
.wishlist-btn,
.product-actions,
.btn-product,
.btn-product-primary,
.btn-product-secondary {
    font-family: 'SVN-MissionX', Arial, Helvetica, sans-serif !important;
}

body {
    background: var(--dark-bg);
    color: var(--neon-blue);
    font-family: 'Orbitron', sans-serif;
    overflow-x: hidden;
}

.cyber-grid {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(0deg, rgba(0, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 255, 0.05) 1px, transparent 1px);
    background-size: 40px 40px;
    z-index: -1;
    animation: glitch 10s infinite linear;
}

.scan-line {
    position: fixed;
    top: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(to right, transparent, var(--neon-blue), transparent);
    animation: scan 4s linear infinite;
    z-index: 0;
}

@keyframes scan {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100vh); }
}

@keyframes glitch {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; transform: translate(2px, 2px); }
}

.floating-particles .particle {
    position: fixed;
    width: 4px;
    height: 4px;
    background: var(--neon-pink);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--neon-pink), 0 0 20px var(--neon-pink);
    animation: float 5s infinite ease-in-out;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.cyber-header {
    text-align: center;
    margin: 2rem 0;
    animation: neon-flicker 2s infinite;
}

.cyber-title {
    font-size: 3.5rem;
    text-transform: uppercase;
    color: var(--neon-pink);
    text-shadow: 0 0 10px var(--neon-pink), 0 0 20px var(--neon-pink), 0 0 30px var(--neon-pink);
}

.cyber-subtitle {
    color: var(--neon-blue);
    font-size: 1.2rem;
    text-shadow: 0 0 5px var(--neon-blue);
}

.product-card {
    border-radius: 18px;
    overflow: hidden;
    background: rgba(10,10,30,0.97);
    box-shadow: 0 0 24px #00ffff, 0 0 8px #ff00a0;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 0 40px #00ffff, 0 0 24px #ff00a0;
}

.product-card img {
    border-radius: 0 0 18px 18px;
    box-shadow: 0 0 32px #00ffff;
    transition: transform 0.3s;
}

.product-card:hover img {
    transform: scale(1.07);
}

.product-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: linear-gradient(90deg, #00ff41 60%, #00ffff 100%);
    color: #181828;
    font-weight: bold;
    padding: 6px 16px;
    font-size: 0.95rem;
    border-radius: 8px;
    box-shadow: 0 0 8px #00ff41;
    z-index: 2;
}

.wishlist-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    background: transparent;
    border: none;
    color: #ff00a0;
    font-size: 1.6rem;
    z-index: 2;
    transition: color 0.2s, text-shadow 0.2s;
}

.wishlist-btn:hover {
    color: #00ffff;
    text-shadow: 0 0 10px #00ffff;
}

.cyber-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(45deg, transparent, rgba(0,255,255,0.08));
    opacity: 0.7;
    pointer-events: none;
}

.btn-tech, .btn-outline-tech {
    font-family: 'Orbitron', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    border-radius: 8px;
    transition: all 0.2s;
}

.btn-tech {
    background: transparent;
    border: 2px solid #00ffff;
    color: #00ffff;
    box-shadow: 0 0 8px #00ffff;
}

.btn-tech:hover {
    background: #00ffff;
    color: #181828;
    box-shadow: 0 0 16px #00ffff;
}

.btn-outline-tech {
    border: 2px solid #ff00a0;
    color: #ff00a0;
}

.btn-outline-tech:hover {
    background: #ff00a0;
    color: #181828;
    box-shadow: 0 0 16px #ff00a0;
}

@keyframes neon-flicker {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.95; }
}

/* Font Orbitron */
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

.home-container {
    padding-left: 32px;
    padding-right: 32px;
}
@media (min-width: 1200px) {
    .home-container {
        padding-left: 64px;
        padding-right: 64px;
    }
}

/* Enhanced Cyberpunk Banner Styles */
.cyber-banner-enhanced {
    background: linear-gradient(135deg, #0a0a1f 0%, #1a0a2e 50%, #16213e 100%);
    min-height: 80vh;
    position: relative;
    overflow: hidden;
    border: 2px solid #00ffff;
    border-radius: 20px;
    box-shadow: 
        0 0 50px rgba(0, 255, 255, 0.3),
        0 0 100px rgba(255, 0, 160, 0.2),
        inset 0 0 50px rgba(0, 255, 255, 0.1);
    margin-bottom: 3rem;
}

/* Matrix Rain Effect */
.matrix-rain {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(90deg, transparent 98%, #00ff41 100%),
        linear-gradient(0deg, transparent 98%, #00ffff 100%);
    background-size: 25px 25px, 50px 50px;
    opacity: 0.1;
    animation: matrix-flow 20s linear infinite;
}

@keyframes matrix-flow {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
}

/* Holographic Overlay */
.holographic-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(45deg, transparent 49%, rgba(0, 255, 255, 0.03) 50%, transparent 51%),
        linear-gradient(-45deg, transparent 49%, rgba(255, 0, 160, 0.03) 50%, transparent 51%);
    background-size: 30px 30px;
    animation: hologram-shift 8s ease-in-out infinite;
}

@keyframes hologram-shift {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(10px); }
}

/* Neon Grid */
.neon-grid {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(0deg, rgba(0, 255, 255, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: grid-pulse 4s ease-in-out infinite;
}

@keyframes grid-pulse {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 0.6; }
}

/* Banner Main Content */
.banner-main-content {
            position: relative;
            z-index: 10;
            padding: 4rem 0;
            height: 100%;
}
.banner-container {
            display: flex;
            justify-content: space-between;
            padding: 0;
            margin: 0;
            max-width: 100vw;
}
/* Text Content */
.cyber-tag {
    background: linear-gradient(90deg, #00ff41, #00ffff);
    color: #000;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
    letter-spacing: 1px;
    display: inline-block;
    box-shadow: 0 0 20px rgba(0, 255, 65, 0.5);
    animation: tag-glow 2s ease-in-out infinite alternate;
}

@keyframes tag-glow {
    0% { box-shadow: 0 0 20px rgba(0, 255, 65, 0.5); }
    100% { box-shadow: 0 0 30px rgba(0, 255, 255, 0.7); }
}

 .banner-main-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            line-height: 0.9;
            margin: 0;
 }


.text-line-1 {
    display: block;
    font-size: 4rem;
    color: #fff;
    text-shadow: 0 0 20px #00ffff;
    animation: neon-flicker 3s infinite;
}

.text-line-2 {
    display: block;
    font-size: 5rem;
    margin: -10px 0;
    animation: glitch-text 4s infinite;
}

.text-line-3 {
    display: block;
    font-size: 2rem;
    color: #ff00a0;
    text-shadow: 0 0 15px #ff00a0;
    letter-spacing: 8px;
}

.cyber-gradient-text {
    background: linear-gradient(90deg, #00ffff 0%, #ff00a0 50%, #00ff41 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    background-size: 200% 100%;
    animation: gradient-flow 3s ease-in-out infinite;
}

@keyframes gradient-flow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes glitch-text {
    0%, 90%, 100% { transform: translateX(0); }
    10% { transform: translateX(-2px) skewX(-1deg); }
    20% { transform: translateX(2px) skewX(1deg); }
}

.banner-description {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    text-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
}

.highlight-text {
    color: #00ff41;
    font-weight: bold;
    text-shadow: 0 0 10px #00ff41;
}

/* Cyber Buttons */
.btn-cyber-primary, .btn-cyber-secondary {
    position: relative;
    padding: 15px 30px;
    font-family: 'Orbitron', sans-serif;
    font-weight: bold;
    font-size: 1rem;
    text-transform: uppercase;
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    overflow: hidden;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-cyber-primary {
    background: linear-gradient(45deg, #00ffff, #0080ff);
    color: #000;
    box-shadow: 
        0 0 20px rgba(0, 255, 255, 0.5),
        0 5px 15px rgba(0, 128, 255, 0.3);
}

.btn-cyber-primary:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 0 30px rgba(0, 255, 255, 0.8),
        0 10px 25px rgba(0, 128, 255, 0.5);
    color: #000;
}

.btn-cyber-secondary {
    background: transparent;
    color: #ff00a0;
    border: 2px solid #ff00a0;
    box-shadow: 0 0 15px rgba(255, 0, 160, 0.3);
}

.btn-cyber-secondary:hover {
    background: rgba(255, 0, 160, 0.1);
    color: #ff00a0;
    box-shadow: 0 0 25px rgba(255, 0, 160, 0.6);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.btn-cyber-primary:hover .btn-glow {
    left: 100%;
}

/* Featured Products Section */
.featured-products-container {
    position: relative;
    height: 500px;
}

.hologram-frame {
    position: relative;
    width: 100%;
    height: 100%;
    border: 2px solid rgba(0, 255, 255, 0.5);
    border-radius: 15px;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    overflow: hidden;
}

.scan-lines {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(0deg, transparent 95%, rgba(0, 255, 255, 0.1) 100%);
    background-size: 100% 20px;
    animation: scan-effect 2s linear infinite;
}

@keyframes scan-effect {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
}

.products-grid {
    position: relative;
    padding: 20px;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 15px;
}

.featured-product {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(20, 20, 40, 0.8);
    border: 1px solid rgba(0, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.product-1 {
    grid-column: 1 / 3;
    grid-row: 1;
}

.product-2, .product-3 {
    grid-row: 2;
}

.featured-product:hover {
    transform: scale(1.05);
    border-color: #00ffff;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
}

.product-hologram {
    display: flex;
    height: 100%;
    padding: 15px;
    align-items: center;
}

.product-image-wrapper {
    position: relative;
    width: 80px;
    height: 80px;
    margin-right: 15px;
    flex-shrink: 0;
}

.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
    filter: brightness(1.2) contrast(1.1);
}

.product-scan-effect {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 49%, rgba(0, 255, 255, 0.2) 50%, transparent 51%);
    animation: product-scan 3s ease-in-out infinite;
}

@keyframes product-scan {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}

.product-info {
    flex: 1;
}

.product-name {
    font-family: 'Orbitron', sans-serif;
    font-size: 1rem;
    color: #00ffff;
    margin: 0 0 5px 0;
    text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
}

.product-price {
    font-size: 1.1rem;
    color: #00ff41;
    font-weight: bold;
    margin: 0 0 8px 0;
    text-shadow: 0 0 10px rgba(0, 255, 65, 0.5);
}

.product-stats {
    display: flex;
    gap: 10px;
}

.stat {
    font-size: 0.8rem;
    color: #ff00a0;
    background: rgba(255, 0, 160, 0.1);
    padding: 2px 8px;
    border-radius: 4px;
    border: 1px solid rgba(255, 0, 160, 0.3);
}

/* Particle Streams */
.cyber-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.particle-stream {
    position: absolute;
    width: 2px;
    height: 100px;
    background: linear-gradient(0deg, transparent, #00ffff, transparent);
    animation: particle-flow 4s linear infinite;
}

.stream-1 {
    left: 20%;
    animation-delay: 0s;
}

.stream-2 {
    left: 60%;
    animation-delay: 1.5s;
    background: linear-gradient(0deg, transparent, #ff00a0, transparent);
}

.stream-3 {
    left: 80%;
    animation-delay: 3s;
    background: linear-gradient(0deg, transparent, #00ff41, transparent);
}

@keyframes particle-flow {
    0% {
        transform: translateY(-100px);
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        transform: translateY(calc(100vh + 100px));
        opacity: 0;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .cyber-banner-enhanced {
        min-height: 60vh;
    }
    
    .text-line-1 {
        font-size: 2.5rem;
    }
    
    .text-line-2 {
        font-size: 3rem;
    }
    
    .text-line-3 {
        font-size: 1.5rem;
        letter-spacing: 4px;
    }
    
   .banner-description {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    
    .featured-products-container {
        height: 300px;
        margin-top: 2rem;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
    }
    
    .product-1 {
        grid-column: 1;
    }
    
    .product-hologram {
        padding: 10px;
    }
    
    .product-image-wrapper {
        width: 60px;
        height: 60px;
    }
}
.product-slider {
    align-items: flex-end;
}
.product-slide {
    justify-content: center;
}
.product-image-container {
    width: 500px;
    height: 500px;
    margin-right: 32px;
}
.product-info {
    min-width: 180px;
    max-width: 240px;
    background: rgba(20,20,40,0.7);
    border-radius: 16px;
    box-shadow: 0 0 12px #00ffff44;
    padding: 12px 10px 18px 10px;
    margin-bottom: 30px;
}
@media (max-width: 900px) {
    .product-image-container { width: 220px; height: 220px; }
    .product-info { min-width: 120px; max-width: 160px; padding: 8px 4px 10px 4px; }
}
</style>

<div class="cyber-grid"></div>
<div class="scan-line"></div>

<div class="floating-particles">
    <div class="particle" style="left: 10%; animation-duration: 6s;"></div>
    <div class="particle" style="left: 20%; animation-duration: 8s;"></div>
    <div class="particle" style="left: 30%; animation-duration: 7s;"></div>
    <div class="particle" style="left: 40%; animation-duration: 9s;"></div>
    <div class="particle" style="left: 50%; animation-duration: 5s;"></div>
    <div class="particle" style="left: 60%; animation-duration: 8s;"></div>
    <div class="particle" style="left: 70%; animation-duration: 6s;"></div>
    <div class="particle" style="left: 80%; animation-duration: 7s;"></div>
    <div class="particle" style="left: 90%; animation-duration: 9s;"></div>
</div>

<?php
// Lấy ngẫu nhiên 3 sản phẩm từ danh sách sản phẩm
$randomProducts = [];
if (!empty($products)) {
    $randomProducts = $products;
    shuffle($randomProducts);
    $randomProducts = array_slice($randomProducts, 0, 3);
}
?>
<!-- Enhanced Cyberpunk Banner -->
<div class="cyber-banner-enhanced position-relative mb-5 overflow-hidden">
    <div class="matrix-rain"></div>
    <div class="holographic-overlay"></div>
    <div class="neon-grid"></div>
    <div class="banner-main-content position-relative">
        <div class="container-fluid px-4">
            <div class="banner-container">
                <!-- Left Content -->
                <div style="flex:1;max-width:500px;">
                    <div class="banner-text-content">
                        <div class="glitch-wrapper mb-3">
                            <div class="cyber-tag">
                                <i class="fas fa-microchip me-2"></i> FUTURE TECH STORE
                            </div>
                        </div>
                        <h1 class="banner-main-title mb-4">
                            <span class="text-line-1">CYBER</span>
                            <span class="text-line-2 cyber-gradient-text">NEXUS</span>
                            <span class="text-line-3">2077</span>
                        </h1>
                        <p class="banner-description mb-5">
                            Khám phá thế giới công nghệ tương lai với những sản phẩm đột phá. 
                            <span class="highlight-text">Neural interfaces</span>, 
                            <span class="highlight-text">quantum processors</span>, và 
                            <span class="highlight-text">holographic displays</span> 
                            đang chờ đợi bạn.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#products" class="btn-cyber-primary">
                                <i class="fas fa-bolt me-2"></i> JACK IN NOW
                                <div class="btn-glow"></div>
                            </a>
                            <a href="#featured" class="btn-cyber-secondary">
                                <i class="fas fa-eye me-2"></i> SCAN PRODUCTS
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Right Content - Product Showcase Slider -->
                <div class="product-showcase">
                    <div class="product-hologram-frame">
                        <div class="hologram-scan"></div>
                        <div class="slider-nav slider-prev" onclick="prevSlide()">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="slider-nav slider-next" onclick="nextSlide()">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="product-slider">
                            <?php foreach ($randomProducts as $i => $product): ?>
                            <div class="product-slide<?php echo $i === 0 ? ' active' : ''; ?>">
                                <div class="product-image-container large-img">
                                    <img src="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                         alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                                         class="product-image">
                                </div>
                                <div class="product-info info-right">
                                    <h3 class="product-name animated-info"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <p class="product-price animated-info"><?php echo number_format($product->price, 0, ',', '.'); ?>₫</p>
                                    <p class="product-description animated-info"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                                    <div class="product-actions animated-info">
                                        <a href="/PHAN_NHUT_QUY/Product/addToCart/<?php echo $product->id; ?>" class="btn-product btn-product-primary">
                                            <i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                                        </a>
                                        <a href="/PHAN_NHUT_QUY/Product/show/<?php echo $product->id; ?>" class="btn-product btn-product-secondary">
                                            <i class="fas fa-info-circle"></i> Chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="slider-controls">
                            <?php foreach ($randomProducts as $i => $product): ?>
                                <div class="slider-dot<?php echo $i === 0 ? ' active' : ''; ?>" onclick="goToSlide(<?php echo $i; ?>)"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cyber-particles">
            <div class="particle-stream stream-1"></div>
            <div class="particle-stream stream-2"></div>
            <div class="particle-stream stream-3"></div>
        </div>
    </div>
</div>
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.product-slide');
const dots = document.querySelectorAll('.slider-dot');
const totalSlides = slides.length;
function showSlide(index) {
    slides.forEach((slide, i) => slide.classList.toggle('active', i === index));
    dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
    currentSlide = index;
}
function nextSlide() { showSlide((currentSlide + 1) % totalSlides); }
function prevSlide() { showSlide((currentSlide - 1 + totalSlides) % totalSlides); }
function goToSlide(index) { showSlide(index); }
setInterval(nextSlide, 5000);
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') prevSlide();
    else if (e.key === 'ArrowRight') nextSlide();
});
let startX = 0, endX = 0;
document.addEventListener('touchstart', e => startX = e.touches[0].clientX);
document.addEventListener('touchend', e => {
    endX = e.changedTouches[0].clientX;
    if (Math.abs(startX - endX) > 50) (startX > endX) ? nextSlide() : prevSlide();
});
document.addEventListener('DOMContentLoaded', () => showSlide(currentSlide));
</script>
<main class="home-container mb-5" id="products">
    <div class="cyber-header">
        <h1 class="cyber-title">CYBER STORE</h1>
        <p class="cyber-subtitle">// Future Tech Products //</p>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row g-5 justify-content-center">
                <!-- Vòng lặp sản phẩm -->
                <?php foreach ($products as $product): ?>
                <div class="col-md-4 col-lg-3 fade-in">
                    <div class="product-card h-100 d-flex flex-column position-relative p-0" style="border-radius:18px; overflow:hidden; box-shadow:0 0 24px #00ffff, 0 0 8px #ff00a0;">
                        <div class="position-relative" style="height: 230px; background: #181828;">
                            <img src="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                                 class="img-fluid w-100 h-100"
                                 style="object-fit:cover; border-radius:0 0 18px 18px; box-shadow:0 0 32px #00ffff;">
                            <span class="product-badge" style="top:16px; left:16px; font-size:0.9rem; border-radius:8px; box-shadow:0 0 8px #00ff41;">
                                NEW
                            </span>
                            <button class="wishlist-btn" title="Add to Favorites" style="top:16px; right:16px; font-size:1.6rem;">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="cyber-overlay"></div>
                        </div>
                        <div class="product-card-body d-flex flex-column flex-grow-1 p-4" style="background:rgba(10,10,30,0.97); border-radius:0 0 18px 18px;">
                            <h3 class="product-card-title mb-2 text-center" style="font-family:'Orbitron',sans-serif; color:#00ffff; text-shadow:0 0 8px #00ffff,0 0 16px #ff00a0;">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                            <p class="product-card-price mb-2 text-center" style="font-size:1.3rem; color:#00ff41; font-weight:bold; text-shadow:0 0 8px #00ff41;">
                                <?php echo number_format($product->price, 0, ',', '.'); ?> ₫
                            </p>
                            <p class="product-card-description mb-3 text-center flex-grow-1" style="color:#b0b0b0; font-size:1rem;">
                                <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="/PHAN_NHUT_QUY/Product/addToCart/<?php echo $product->id; ?>"
                                   class="btn btn-tech flex-grow-1 py-2"
                                   style="border-radius: 8px; font-size:1rem; font-weight:700; box-shadow:0 0 8px #00ffff;">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </a>
                                <a href="/PHAN_NHUT_QUY/Product/show/<?php echo $product->id; ?>"
                                   class="btn btn-outline-tech py-2"
                                   style="border-radius: 8px; font-size:1rem; font-weight:700;">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php include 'app/views/shares/footer.php'; ?>

<!-- Thêm CSS và JS cho slider nếu chưa có -->
<style>
.product-showcase {
    position: relative;
    min-height: 400px;
    margin-left: auto;
    
}
.product-hologram-frame {
    background: rgba(20, 20, 40, 0.8);
    border-radius: 15px;
    padding: 30px 0;
    overflow: hidden;
    box-shadow: 0 0 32px #00ffff;
}
.hologram-scan {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(0deg, transparent 90%, #00ffff33 100%);
    pointer-events: none;
    animation: scan-effect 2s linear infinite;
    z-index: 1;
}
@keyframes scan-effect {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
}
.product-slider {
    position: relative;
    width: 1000px;
    height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.product-slide {
    display: none;
    flex-direction: row;
    align-items: center;
    width: 100%;
    height: 100%;
    animation: fadeIn 0.7s;
}
.product-slide.active {
    display: flex;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px);}
    to { opacity: 1; transform: translateY(0);}
}
.product-image-container {
    flex-shrink: 0;
    width: 500px;
    height: 500px;
    margin-right: 32px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 0 24px #00ffff;
    background: #181828;
    display: flex;
    align-items: center;
    justify-content: center;
}
.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
}
.product-info {
    flex: 1;
    color: #fff;
}
.product-name {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.3rem;
    color: #00ffff;
    margin-bottom: 8px;
}
.product-price {
    font-size: 1.1rem;
    color: #00ff41;
    font-weight: bold;
    margin-bottom: 10px;
}
.product-description {
    color: #b0b0b0;
    font-size: 1rem;
    margin-bottom: 18px;
}
.product-actions {
    display: flex;
    gap: 12px;
}
.btn-product {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 18px;
    border-radius: 8px;
    font-family: 'Orbitron', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    border: none;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-product-primary {
    background: #00ffff;
    color: #181828;
    box-shadow: 0 0 8px #00ffff;
}
.btn-product-primary:hover {
    background: #00ff41;
    color: #181828;
}
.btn-product-secondary {
    background: transparent;
    color: #ff00a0;
    border: 2px solid #ff00a0;
}
.btn-product-secondary:hover {
    background: #ff00a0;
    color: #fff;
}
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    background: rgba(0,255,255,0.15);
    color: #00ffff;
    border-radius: 50%;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.5rem;
    transition: background 0.2s, color 0.2s;
    box-shadow: 0 0 8px #00ffff;
}
.slider-prev { left: 10px; }
.slider-next { right: 10px; }
.slider-nav:hover {
    background: #00ffff;
    color: #181828;
}
@media (max-width: 768px) {
    .product-hologram-frame { padding: 10px 0; }
    .product-slider { height: 220px; }
    .product-image-container { width: 90px; height: 90px; margin-right: 12px; }
    .product-info { font-size: 0.95rem; }
    .slider-nav { width: 36px; height: 36px; font-size: 1.1rem; }
}
</style>
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.product-slide');
function showSlide(idx) {
    if (!slides.length) return;
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === idx);
    });
}
function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}
function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}
document.addEventListener('DOMContentLoaded', function() {
    showSlide(currentSlide);
});
</script>