<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom" style="background: linear-gradient(120deg, #0d0d1f 70%, #8a2be2 100%); position:relative; overflow:hidden;">
    <div class="cyber-glow"></div>
    <div class="cyber-particles">
        <?php for($i=0;$i<18;$i++): ?>
            <div class="cyber-particle" style="left:<?php echo rand(5,95); ?>%; animation-duration:<?php echo rand(4,12); ?>s;"></div>
        <?php endfor; ?>
    </div>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white shadow-lg cyber-card" style="border-radius: 1.5rem; background: rgba(10,20,40,0.97); border: 2.5px solid #00ffff; box-shadow: 0 0 48px #00ffff99, 0 0 24px #ff00a099;">
                    <div class="card-body p-5 text-center position-relative">
                        <h2 class="fw-bold mb-4 text-uppercase cyber-title-glitch" style="color:#00ffff; font-family:'SVN-MissionX','Orbitron',sans-serif; text-shadow:0 0 16px #00ffff,0 0 32px #ff00a0; letter-spacing:2px;">
                            <span class="glitch" data-text="ĐĂNG KÝ">ĐĂNG KÝ</span>
                        </h2>
                        <form class="user" action="/PHAN_NHUT_QUY/account/save" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="text"
                                        class="form-control form-control-user cyber-input"
                                        id="username"
                                        name="username"
                                        placeholder="Tên đăng nhập"
                                        style="background:rgba(0,255,255,0.05); color:#00ffff; border:1.5px solid #00ffff; border-radius:10px;"
                                        required
                                    >
                                </div>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control form-control-user cyber-input"
                                        id="fullname"
                                        name="fullname"
                                        placeholder="Họ và tên"
                                        style="background:rgba(255,0,160,0.05); color:#fff; border:1.5px solid #ff00a0; border-radius:10px; font-weight:bold; text-shadow:0 0 8px #ff00a0,0 0 16px #fff;"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    
                                    <input
                                        type="password"
                                        class="form-control form-control-user cyber-input"
                                        id="password"
                                        name="password"
                                        placeholder="Mật khẩu"
                                        style="background:rgba(39, 134, 62, 0.05); color:#00ff41; border:1.5px solid #00ff41; border-radius:10px;"
                                        required
                                    >
                                    
                                </div>
                                <div class="col-sm-6 position-relative">
                                    <input
                                        type="password"
                                        class="form-control form-control-user cyber-input"
                                        id="confirmpassword"
                                        name="confirmpassword"
                                        placeholder="Nhập lại mật khẩu"
                                        style="background:rgba(255,0,160,0.05); color:#fff; border:1.5px solid #ff00a0; border-radius:10px; font-weight:bold; text-shadow:0 0 8px #ff00a0,0 0 16px #fff;"
                                        required
                                    >
                                    <span class="toggle-password" onclick="togglePassword('confirmpassword', 'eyeIcon2')" style="position:absolute;top:50%;right:16px;transform:translateY(-50%);cursor:pointer;color:#ff00a0;font-size:1.2rem;">
                                        <i id="eyeIcon2" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input
                                        type="email"
                                        class="form-control form-control-user cyber-input"
                                        id="email"
                                        name="email"
                                        placeholder="Email"
                                        style="background:rgba(0,255,255,0.05); color:#00ffff; border:1.5px solid #00ffff; border-radius:10px;"
                                        required
                                    >
                                </div>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control form-control-user cyber-input"
                                        id="phone"
                                        name="phone"
                                        placeholder="Số điện thoại"
                                        style="background:rgba(255,0,160,0.05); color:#fff; border:1.5px solid #ff00a0; border-radius:10px; font-weight:bold;"
                                    >
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12">
                                    <input
                                        type="text"
                                        class="form-control form-control-user cyber-input"
                                        id="address"
                                        name="address"
                                        placeholder="Địa chỉ"
                                        style="background:rgba(0,255,255,0.05); color:#00ffff; border:1.5px solid #00ffff; border-radius:10px;"
                                    >
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-12">
                                    <label for="avt" class="form-label" style="color:#ff00a0;">Ảnh đại diện</label>
                                    <input
                                        type="file"
                                        class="form-control form-control-user cyber-input"
                                        id="avt"
                                        name="avt"
                                        accept="image/*"
                                        style="background:rgba(255,0,160,0.05); color:#fff; border:1.5px solid #ff00a0; border-radius:10px;"
                                    >
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-sm-12">
                                    <label for="role" class="form-label fw-bold mb-2" style="color:#00ffff;">Quyền tài khoản:</label>
                                    <select class="form-control form-control-user cyber-input" id="role" name="role"
                                        style="background:rgba(0,255,255,0.05); color:#00ffff; border:1.5px solid #00ffff; border-radius:10px;">
                                        <option value="user" selected>Người dùng</option>
                                        <option value="admin">Quản trị viên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-cyber-primary px-5 py-2 mb-3 cyber-btn-glitch" type="submit" style="font-size:1.2rem; font-weight:700;">
                                    <i class="fas fa-user-plus me-2"></i>Đăng ký
                                    <div class="btn-glow"></div>
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="/PHAN_NHUT_QUY/account/login" style="color:#ff00a0; text-shadow:0 0 8px #ff00a0;">Đã có tài khoản? Đăng nhập</a>
                            </div>
                        </form>
                        <div class="cyber-bottom-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.cyber-title-glitch .glitch {
    position: relative;
    color: #00ffff;
    font-family: 'SVN-MissionX','Orbitron',sans-serif;
    letter-spacing: 2px;
    animation: cyber-glitch 1.2s infinite alternate;
}
.cyber-title-glitch .glitch:before,
.cyber-title-glitch .glitch:after {
    content: attr(data-text);
    position: absolute;
    left: 0; top: 0;
    width: 100%; overflow: hidden;
}
.cyber-title-glitch .glitch:before {
    color: #ff00a0;
    z-index: 1;
    clip-path: inset(0 0 60% 0);
    animation: cyber-glitch-top 1.2s infinite alternate-reverse;
}
.cyber-title-glitch .glitch:after {
    color: #00ff41;
    z-index: 2;
    clip-path: inset(60% 0 0 0);
    animation: cyber-glitch-bottom 1.2s infinite alternate;
}
@keyframes cyber-glitch {
    0% { text-shadow: 2px 0 #ff00a0, -2px 0 #00ff41, 0 0 16px #00ffff; }
    100% { text-shadow: -2px 0 #ff00a0, 2px 0 #00ff41, 0 0 32px #00ffff; }
}
@keyframes cyber-glitch-top {
    0% { transform: translate(-2px, -2px);}
    100% { transform: translate(2px, 2px);}
}
@keyframes cyber-glitch-bottom {
    0% { transform: translate(2px, 2px);}
    100% { transform: translate(-2px, -2px);}
}
.cyber-card {
    box-shadow: 0 0 48px #00ffff99, 0 0 24px #ff00a099, 0 0 64px #8a2be299;
    border: 2.5px solid #00ffff;
    position: relative;
    overflow: hidden;
}
.cyber-card:before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 1.5rem;
    pointer-events: none;
    box-shadow: 0 0 64px #00ffff55, 0 0 32px #ff00a055;
    opacity: 0.5;
    z-index: 0;
}
.cyber-btn-glitch {
    position: relative;
    overflow: hidden;
    z-index: 1;
}
.cyber-btn-glitch:after {
    content: "";
    position: absolute;
    left: -100%;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, #fff 60%, transparent);
    opacity: 0.15;
    transition: left 0.5s;
    z-index: 2;
}
.cyber-btn-glitch:hover:after {
    left: 100%;
}
.cyber-particles {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    pointer-events: none;
    z-index: 0;
}
.cyber-particle {
    position: absolute;
    top: 0;
    width: 8px; height: 8px;
    border-radius: 50%;
    background: linear-gradient(135deg, #00ffff 60%, #ff00a0 100%);
    opacity: 0.7;
    animation: cyber-particle-float linear infinite;
}
@keyframes cyber-particle-float {
    0% { top: 100%; opacity: 0.7;}
    100% { top: -10%; opacity: 0.2;}
}
.cyber-bottom-bar {
    position: absolute;
    left: 0; bottom: 0; width: 100%; height: 6px;
    background: linear-gradient(90deg, #00ffff 40%, #ff00a0 100%);
    box-shadow: 0 0 24px #00ffff, 0 0 32px #ff00a0;
    border-radius: 0 0 1.5rem 1.5rem;
    opacity: 0.8;
    z-index: 2;
}
.cyber-input:focus {
    box-shadow: 0 0 12px #00ffff, 0 0 24px #ff00a0;
    outline: none;
}
.btn-cyber-primary {
    background: linear-gradient(90deg, #00ffff 40%, #8a2be2 100%);
    color: #181828;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    box-shadow: 0 0 10px #00ffff, 0 0 20px #8a2be2;
    position: relative;
    overflow: hidden;
    transition: 0.2s;
}
.btn-cyber-primary:hover {
    background: #ff0080;
    color: #fff;
    box-shadow: 0 0 20px #ff00a0;
}
.btn-glow {
    position: absolute;
    left: -100%;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, #fff 60%, transparent);
    opacity: 0.2;
    transition: left 0.5s;
}
.btn-cyber-primary:hover .btn-glow {
    left: 100%;
}
#fullname::placeholder,
#confirmpassword::placeholder,
#email::placeholder,
#phone::placeholder,
#address::placeholder {
    color: #00ffff;
    text-shadow: 0 0 8px #00ffff, 0 0 16px #ff00a0;
    font-weight: bold;
    opacity: 1;
    letter-spacing: 1px;
}
</style>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?>