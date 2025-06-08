<?php include 'app/views/shares/header.php'; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 fw-bold" style="color:#00ffff; text-shadow:0 0 8px #00ffff,0 0 16px #ff00a0; font-family:'SVN-MissionX','Orbitron',sans-serif;">Danh Sách Tài Khoản</h1>
        <a href="/PHAN_NHUT_QUY/account/add" class="btn btn-cyber-primary fw-medium px-4 py-2" style="font-size:1.1rem;">
            <i class="fas fa-user-plus me-2"></i>Thêm Tài Khoản Mới
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover align-middle shadow cyber-table" style="border-radius:16px; overflow:hidden;">
            <thead style="background: linear-gradient(90deg, #00ffff 40%, #8a2be2 100%); color:#181828; font-family:'SVN-MissionX','Orbitron',sans-serif;">
                <tr>
                    <th>#</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Avatar</th>
                    <th>Quyền</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($accounts)): ?>
                    <?php foreach ($accounts as $index => $acc): ?>
                        <tr class="cyber-row">
                            <td class="fw-bold" style="color:#00ffff;"><?php echo $index + 1; ?></td>
                            <td class="fw-bold" style="color:#00ffff; text-shadow:0 0 8px #00ffff;"><?php echo htmlspecialchars($acc->username, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td style="color:#fff; text-shadow:0 0 8px #ff00a0;"><?php echo htmlspecialchars($acc->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td style="color:#ff00a0; text-shadow:0 0 8px #ff00a0;"><?php echo htmlspecialchars($acc->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td style="color:#00ff41;"><?php echo htmlspecialchars($acc->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td style="color:#8a2be2;"><?php echo htmlspecialchars($acc->address, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php if (!empty($acc->avt)): ?>
                                    <img src="/PHAN_NHUT_QUY/<?php echo htmlspecialchars($acc->avt, ENT_QUOTES, 'UTF-8'); ?>" alt="Avatar" style="width:40px; height:40px; border-radius:50%; object-fit:cover; box-shadow:0 0 8px #00ffff,0 0 16px #ff00a0;">
                                <?php else: ?>
                                    <span class="text-muted">Không có</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?php echo $acc->role === 'admin' ? 'bg-danger' : 'bg-primary'; ?>" style="font-size:1rem; box-shadow:0 0 8px #00ffff;">
                                    <i class="fas fa-user-shield me-1"></i><?php echo htmlspecialchars($acc->role, ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="/PHAN_NHUT_QUY/account/edit?id=<?php echo $acc->id; ?>" class="btn btn-sm btn-warning me-1 cyber-action-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/PHAN_NHUT_QUY/account/delete?id=<?php echo $acc->id; ?>" class="btn btn-sm btn-danger cyber-action-btn" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">Không có tài khoản nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<style>
.cyber-table {
    border: 2.5px solid #00ffff;
    box-shadow: 0 0 32px #00ffff55, 0 0 16px #ff00a055;
    font-family: 'Orbitron', 'SVN-MissionX', monospace;
}
.cyber-table thead th {
    border: none;
    font-size: 1.1rem;
    letter-spacing: 1px;
}
.cyber-row:hover {
    background: rgba(0,255,255,0.08) !important;
    box-shadow: 0 0 16px #00ffff55;
    transition: 0.2s;
}
.cyber-action-btn {
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 0 8px #00ffff, 0 0 8px #ff00a0;
    border: none;
    transition: 0.2s;
}
.cyber-action-btn:hover {
    background: #ff00a0 !important;
    color: #fff !important;
    box-shadow: 0 0 16px #ff00a0, 0 0 24px #00ffff;
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
.table td, .table th {
    vertical-align: middle;
}
</style>
<?php include 'app/views/shares/footer.php'; ?>