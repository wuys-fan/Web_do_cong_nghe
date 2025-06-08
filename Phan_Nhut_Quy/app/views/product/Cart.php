<?php include 'app/views/shares/header.php'; ?>
<div class="container my-5">
    <h2 class="cyber-title mb-4 text-center">GIỎ HÀNG</h2>
    <?php if (empty($cart)): ?>
        <div class="alert alert-info text-center">Giỏ hàng của bạn đang trống.</div>
        <div class="text-center">
            <a href="/PHAN_NHUT_QUY/" class="btn btn-neon mt-3">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-dark table-hover align-middle shadow-lg" style="background: rgba(10,10,20,0.95); border-radius: 16px;">
            <thead style="background: linear-gradient(90deg, #00ffff44, #8a2be244);">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $total = 0; foreach ($cart as $id => $item): $total += $item['price'] * $item['quantity']; ?>
                <tr>
                    <td>
                        <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="" style="width:70px; border-radius:8px; box-shadow:0 0 10px #00ffff;">
                    </td>
                    <td class="fw-bold text-neon"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="text-warning"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <a href="/PHAN_NHUT_QUY/Product/updateCart/<?php echo $id; ?>?action=decrease" class="btn btn-sm btn-outline-light px-2 py-0" style="font-size:1.2rem;">-</a>
                            <span class="mx-2"><?php echo $item['quantity']; ?></span>
                            <a href="/PHAN_NHUT_QUY/Product/updateCart/<?php echo $id; ?>?action=increase" class="btn btn-sm btn-outline-light px-2 py-0" style="font-size:1.2rem;">+</a>
                        </div>
                    </td>
                    <td class="text-success"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> ₫</td>
                    <td>
                        <a href="/PHAN_NHUT_QUY/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end fw-bold text-accent">Tổng cộng:</td>
                    <td class="fw-bold text-neon"><?php echo number_format($total, 0, ',', '.'); ?> ₫</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="text-end mt-4">
        <?php if (SessionHelper::isLoggedIn()): ?>
            <a href="/PHAN_NHUT_QUY/Product/checkout" class="btn btn-neon btn-lg">Thanh toán</a>
        <?php else: ?>
            <a class="nav-link" href="/PHAN_NHUT_QUY/account/login">Đăng nhập để thanh toán</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
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
    .text-accent { color: #8a2be2; }
</style>
<?php include 'app/views/shares/footer.php'; ?>