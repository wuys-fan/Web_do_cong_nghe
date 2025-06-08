<?php
SessionHelper::start();
$username = $_SESSION['username'] ?? 'Khách';
$role = $_SESSION['role'] ?? 'guest';
$fullname = $_SESSION['fullname'] ?? '';
$email = $_SESSION['email'] ?? '';
$avt = $_SESSION['avt'] ?? '';
?>
<!-- Nút mở leftbar -->
<button class="btn btn-cyber-primary position-fixed start-0 top-50 translate-middle-y z-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#leftSidebar" aria-controls="leftSidebar" style="border-radius: 0 50px 50px 0;">
    <i class="fas fa-user"></i> Tài khoản
</button>

<!-- Sidebar Offcanvas -->
<div class="offcanvas offcanvas-start cyber-leftbar" tabindex="-1" id="leftSidebar" aria-labelledby="leftSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="leftSidebarLabel">Thông tin tài khoản</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Đóng"></button>
    </div>
    <div class="offcanvas-body">
        <div class="cyber-profile-card text-center p-4 mb-4">
            <div class="cyber-avatar mx-auto mb-3">
                <?php if ($avt): ?>
                    <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($avt, ENT_QUOTES, 'UTF-8'); ?>" alt="Avatar" style="width:80px; height:80px; border-radius:50%; object-fit:cover; box-shadow:0 0 16px #00ffff,0 0 32px #ff00a0;">
                <?php else: ?>
                    <i class="fas fa-user-circle" style="font-size:80px; color:#00ffff; text-shadow:0 0 16px #00ffff,0 0 32px #ff00a0;"></i>
                <?php endif; ?>
            </div>
            <div class="cyber-info">
                <div class="cyber-username fw-bold mb-1" style="color:#00ffff; font-size:1.3rem; text-shadow:0 0 8px #00ffff,0 0 16px #ff00a0;">
                    <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php if ($fullname): ?>
                    <div class="cyber-fullname mb-1" style="color:#fff; font-size:1.1rem; text-shadow:0 0 8px #fff;">
                        <i class="fas fa-id-card me-1"></i><?php echo htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($email): ?>
                    <div class="cyber-email mb-1" style="color:#ff00a0; font-size:1rem; text-shadow:0 0 8px #ff00a0;">
                        <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>
                <div class="cyber-role mb-2">
                    <span class="badge <?php echo $role === 'admin' ? 'bg-danger' : 'bg-primary'; ?>" style="font-size:1rem; box-shadow:0 0 8px #00ffff;">
                        <i class="fas fa-user-shield me-1"></i><?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </div>
            </div>
            <a href="/PHAN_NHUT_QUY/account/logout" class="btn btn-cyber-primary w-100 mt-3">
                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
            </a>
        </div>
    </div>
</div>
<style>
.cyber-leftbar {
    background: linear-gradient(120deg, #0d0d1f 80%, #8a2be2 100%);
    box-shadow: 0 0 32px #00ffff55;
    border-right: 2.5px solid #00ffff;
    min-width: 320px;
    max-width: 90vw;
}
.cyber-profile-card {
    background: rgba(10,20,40,0.97);
    border-radius: 1.5rem;
    border: 2px solid #00ffff;
    box-shadow: 0 0 32px #00ffff99, 0 0 16px #ff00a099;
    margin: 0 auto;
    margin-top: 32px;
    max-width: 95%;
}
.btn-cyber-primary {
    background: linear-gradient(90deg, #00ffff 40%, #8a2be2 100%);
    color: #181828;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    box-shadow: 0 0 10px #00ffff, 0 0 20px #8a2be2;
    transition: 0.2s;
}
.btn-cyber-primary:hover {
    background: #ff0080;
    color: #fff;
    box-shadow: 0 0 20px #ff00a0;
}
</style>