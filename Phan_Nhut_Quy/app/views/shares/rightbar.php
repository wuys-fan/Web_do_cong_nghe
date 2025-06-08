<body>
    <!-- Nút mở sidebar -->
    <button class="btn btn-primary position-fixed end-0 top-50 translate-middle-y z-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#rightSidebar" aria-controls="rightSidebar" style="border-radius: 50px 0 0 50px;">
        <i class="fas fa-bars"></i> Quản lý
    </button>


    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="rightSidebar" aria-labelledby="rightSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="rightSidebarLabel">Quản lý hệ thống</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Đóng"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Quản lý sản phẩm -->
            <div class="mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-boxes"></i> Quản lý sản phẩm</h6>
                <div class="d-grid gap-2">
                    <a href="/PHAN_NHUT_QUY/Product/list" class="btn btn-outline-primary">
                        <i class="fas fa-list"></i> Danh sách sản phẩm
                    </a>
                    <a href="/PHAN_NHUT_QUY/Product/add" class="btn btn-outline-success">
                        <i class="fas fa-plus"></i> Thêm sản phẩm mới
                    </a>
                </div>
            </div>
            <!-- Quản lý danh mục -->
            <div class="mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-tags"></i> Quản lý danh mục</h6>
                <div class="d-grid gap-2">
                    <a href="/PHAN_NHUT_QUY/Category/list" class="btn btn-outline-primary">
                        <i class="fas fa-list"></i> Danh sách danh mục
                    </a>
                    <a href="/PHAN_NHUT_QUY/Category/add" class="btn btn-outline-success">
                        <i class="fas fa-plus"></i> Thêm danh mục mới
                    </a>
                </div>
            </div>
            <!-- Quản lý tài khoản -->
            <div class="mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-users-cog"></i> Quản lý tài khoản</h6>
                <div class="d-grid gap-2">
                    <a href="/PHAN_NHUT_QUY/account/list" class="btn btn-outline-primary">
                        <i class="fas fa-list"></i> Danh sách tài khoản
                    </a>
                    <a href="/PHAN_NHUT_QUY/account/add" class="btn btn-outline-success">
                        <i class="fas fa-plus"></i> Thêm tài khoản mới
                    </a>
                    <a href="/PHAN_NHUT_QUY/account/edit" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i> Sửa tài khoản
                    </a>
                </div>
            </div>
            <!-- Thông tin liên hệ -->
            <div>
                <h6 class="fw-bold mb-3"><i class="fas fa-info-circle"></i> Thông tin</h6>
                <p class="mb-1"><i class="fas fa-phone-alt me-2"></i>0123 456 789</p>
                <p class="mb-1"><i class="fas fa-envelope me-2"></i>info@techshop.vn</p>
                <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>123 Đường ABC, Q.1, TP.HCM</p>
            </div>
        </div>
    </div>
</body>
</html>