<?php include 'app/views/shares/header.php'; ?>
<div class="container my-5">
    <h2 class="cyber-title mb-4 text-center">THANH TOÁN</h2>
    <form method="POST" action="/PHAN_NHUT_QUY/Product/processCheckout" class="p-4 bg-dark rounded-4 shadow-lg" style="max-width: 600px; margin: 0 auto; border: 2px solid #00ffff;">
        <div class="mb-3">
            <label for="name" class="form-label text-neon">Họ và tên</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
                value="<?php echo isset($account->fullname) ? htmlspecialchars($account->fullname, ENT_QUOTES, 'UTF-8') : ''; ?>"
            >
        </div>
        <div class="mb-3">
            <label for="address" class="form-label text-neon">Địa chỉ giao hàng</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label text-neon">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label text-neon">Ghi chú</label>
            <textarea class="form-control" id="note" name="note" rows="2"></textarea>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="/PHAN_NHUT_QUY/Product/cart" class="btn btn-out btn-lg">Quay lại giỏ hàng</a>
            <button type="submit" class="btn btn-neon btn-lg">Xác nhận đặt hàng</button>
        </div>
    </form>
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
    .text-neon { color: #00ffff; }
    
    .btn-out {
        background: linear-gradient(90deg,rgb(205, 220, 38) 40%, #8a2be2 100%);
        color: #fff;
        border: none;
        font-weight: bold;
        box-shadow: 0 0 10px #00ffff, 0 0 20px #8a2be2;
        transition: 0.2s;
    }

    .btn-out:hover {
        background: #ff0080;
        color: #fff;
        box-shadow: 0 0 20px #ff0080;
    }
</style>
<?php include 'app/views/shares/footer.php'; ?>