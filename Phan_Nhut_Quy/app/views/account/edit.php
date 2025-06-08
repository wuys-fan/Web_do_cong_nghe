<?php include 'app/views/shares/header.php'; ?>
<div class="container py-5">
    <h2 class="mb-4 text-center">Chỉnh sửa tài khoản</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="/PHAN_NHUT_QUY/account/update" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow rounded" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($account->id, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="<?php echo htmlspecialchars($account->username, ENT_QUOTES, 'UTF-8'); ?>" required readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="<?php echo htmlspecialchars($account->fullname, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới (bỏ trống nếu không đổi)">
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="confirmpassword" placeholder="Nhập lại mật khẩu mới">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($account->email, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="<?php echo htmlspecialchars($account->phone, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="<?php echo htmlspecialchars($account->address, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">Ảnh đại diện</label>
            <?php if (!empty($account->avt)): ?>
                <div class="mb-2">
                    <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($account->avt, ENT_QUOTES, 'UTF-8'); ?>" alt="Avatar" style="width:60px; height:60px; border-radius:50%; object-fit:cover; box-shadow:0 0 8px #00ffff;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" id="avt" name="avt" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Quyền tài khoản</label>
            <select class="form-control" id="role" name="role">
                <option value="user" <?php if($account->role == 'user') echo 'selected'; ?>>Người dùng</option>
                <option value="admin" <?php if($account->role == 'admin') echo 'selected'; ?>>Quản trị viên</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-primary px-5" type="submit">
                <i class="fas fa-save me-2"></i>Lưu thay đổi
            </button>
            <a href="/PHAN_NHUT_QUY/account/list" class="btn btn-secondary ms-2">Quay lại danh sách</a>
        </div>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>