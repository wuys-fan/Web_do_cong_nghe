<?php include 'app/views/shares/header.php'; ?>
<div class="container py-5">
    <h2 class="mb-4 text-center">Thêm tài khoản mới</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="/PHAN_NHUT_QUY/account/save" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow rounded" autocomplete="off">
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="confirmpassword" placeholder="Nhập lại mật khẩu" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
            </div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" id="avt" name="avt" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Quyền tài khoản</label>
            <select class="form-control" id="role" name="role">
                <option value="user" selected>Người dùng</option>
                <option value="admin">Quản trị viên</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-primary px-5" type="submit">
                <i class="fas fa-user-plus me-2"></i>Thêm tài khoản
            </button>
            <a href="/PHAN_NHUT_QUY/account/list" class="btn btn-secondary ms-2">Quay lại danh sách</a>
        </div>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>