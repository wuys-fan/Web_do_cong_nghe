
<?php include 'app/views/shares/header.php'; ?>
<div class="container my-5 text-center">
    <div class="p-5 rounded-4 shadow-lg" style="background: rgba(10,10,20,0.95); border: 2px solid #00ffff;">
        <i class="fas fa-check-circle fa-4x mb-4 text-neon"></i>
        <h2 class="cyber-title mb-3">ĐẶT HÀNG THÀNH CÔNG</h2>
        <p class="lead text-light">Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được xử lý thành công!</p>
        <a href="/PHAN_NHUT_QUY/" class="btn btn-neon mt-4">Tiếp tục mua sắm</a>
    </div>
</div>
<style>
    .btn-neon {
        background: linear-gradient(90deg, #00ffff 40%, #8a2be2 100%);
        color: #fff;
        border: none;
        font-weight: bold;
        box-shadow: 0 0 10px #00ffff, 0 0 20px #8a2be2;
        transition: 0.2s;
    }
    .btn-neon:hover {
        background: #ff0080;
        color: #fff;
        box-shadow: 0 0 20px #ff0080;
    }
    .cyber-title {
        font-family: 'Orbitron', monospace;
        color: #00ffff;
        text-shadow: 0 0 10px #00ffff, 0 0 20px #8a2be2;
        letter-spacing: 2px;
        font-weight: 900;
    }
    .text-neon { color: #00ffff; }
</style>
<?php include 'app/views/shares/footer.php'; ?>