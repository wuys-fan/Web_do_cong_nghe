<!-- Footer -->
    <footer style="background: linear-gradient(90deg, #0a0a0a 80%, #8a2be2 100%); border-top: 2px solid #00ffff; box-shadow: 0 0 20px #00ffff; color: #fff; font-family: 'Orbitron', monospace;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 style="color: #00ffff; font-weight: bold; text-shadow: 0 0 10px #00ffff;">CYBER STORE</h5>
                    <p>Địa chỉ: 123 Đường ABC, Quận 1, TP.HCM</p>
                    <p>Email: <span style="color: #ff0080;">info@techshop.vn</span></p>
                    <p>Điện thoại: <span style="color: #00ff41;">0123 456 789</span></p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 style="color: #ff0080;">Liên kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: #00ffff;">Trang chủ</a></li>
                        <li><a href="#" style="color: #00ffff;">Sản phẩm</a></li>
                        <li><a href="#" style="color: #00ffff;">Giới thiệu</a></li>
                        <li><a href="#" style="color: #00ffff;">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 style="color: #8a2be2;">Hỗ trợ</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color: #00ffff;">Chính sách bảo hành</a></li>
                        <li><a href="#" style="color: #00ffff;">Hướng dẫn mua hàng</a></li>
                        <li><a href="#" style="color: #00ffff;">Câu hỏi thường gặp</a></li>
                        <li><a href="#" style="color: #00ffff;">Chính sách đổi trả</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 style="color: #00ff41;">Kết nối</h5>
                    <div>
                        <a href="#" style="color: #00ffff; font-size: 1.5rem; margin-right: 15px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="color: #ff0080; font-size: 1.5rem; margin-right: 15px;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="color: #8a2be2; font-size: 1.5rem; margin-right: 15px;"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="mt-3">
                        <img src="https://via.placeholder.com/150x50?text=Payment+Methods" alt="Payment Methods" class="img-fluid" style="border: 1px solid #00ffff; border-radius: 8px;">
                    </div>
                </div>
            </div>
            <hr style="border-color: #00ffff;">
            <div class="text-center" style="color: #00ffff;">
                <p class="mb-0">© 2023 CYBER STORE. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach((card, index) => {
                // Add delay based on index for staggered animation
                card.style.animationDelay = `${index * 0.1}s`;
                
                // Add hover effect
                card.addEventListener('mouseenter', function() {
                    this.classList.add('animate__pulse');
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('animate__pulse');
                });
            });
            
            // Animate elements when they come into view
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.fade-in');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight - 100) {
                        element.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
        });
    </script>
</body>
</html>