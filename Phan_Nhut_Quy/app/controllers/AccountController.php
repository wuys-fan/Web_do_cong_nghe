<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController {
    private $accountModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register() {
        include_once 'app/views/account/register.php';
    }

    public function login() {
        include_once 'app/views/account/login.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = $_POST['role'] ?? 'user';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $avt = ''; // Xử lý upload avt nếu có

            // Xử lý upload avatar nếu có
            if (isset($_FILES['avt']) && $_FILES['avt']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'public/img/';
                $fileName = uniqid() . '_' . basename($_FILES['avt']['name']);
                $targetFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['avt']['tmp_name'], $targetFile)) {
                    $avt = $targetFile;
                }
            }

            $errors = [];
            if (empty($username)) $errors['username'] = "Vui lòng nhập username!";
            if (empty($fullName)) $errors['fullname'] = "Vui lòng nhập fullname!";
            if (empty($email)) $errors['email'] = "Vui lòng nhập email!";
            if (empty($password)) $errors['password'] = "Vui lòng nhập password!";
            if ($password != $confirmPassword) $errors['confirmPass'] = "Mật khẩu và xác nhận chưa khớp!";

            if (!in_array($role, ['admin', 'user'])) $role = 'user';
            if ($this->accountModel->getAccountByUsername($username)) {
                $errors['account'] = "Tài khoản này đã được đăng ký!";
            }

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $result = $this->accountModel->save($username, $fullName, $password, $role, $email, $phone, $address, $avt);
                if ($result) {
                    header('Location: /PHAN_NHUT_QUY/account/login');
                    exit;
                }
            }
        }
    }

    public function logout() {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header('Location: /PHAN_NHUT_QUY/');
        exit;
    }

    public function checkLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $account = $this->accountModel->getAccountByUsername($username);

            if ($account && password_verify($password, $account->password)) {
                session_start();
                $_SESSION['username'] = $account->username;
                $_SESSION['role'] = $account->role;
                $_SESSION['fullname'] = $account->fullname;
                $_SESSION['email'] = $account->email;
                $_SESSION['avt'] = $account->avt;
                header('Location: /PHAN_NHUT_QUY/');
                exit;
            } else {
                $error = $account ? "Mật khẩu không đúng!" : "Không tìm thấy tài khoản!";
                include_once 'app/views/account/login.php';
                exit;
            }
        }
    }

    public function list() {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        $accounts = $this->accountModel->getAllAccounts();
        include 'app/views/account/list.php';
    }

    public function add() {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        include 'app/views/account/add.php';
    }

    public function edit() {
        if (!\SessionHelper::isAdmin()) {
            header('Location: /PHAN_NHUT_QUY/');
            exit;
        }
        $id = $_GET['id'] ?? 0;
        $account = $this->accountModel->getAccountById($id);
        if (!$account) {
            header('Location: /PHAN_NHUT_QUY/account/list');
            exit;
        }
        include 'app/views/account/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? 0;
            $fullname = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = $_POST['role'] ?? 'user';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $avt = $_POST['old_avt'] ?? '';

            // Xử lý upload avatar nếu có
            if (isset($_FILES['avt']) && $_FILES['avt']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'public/img/';
                $fileName = uniqid() . '_' . basename($_FILES['avt']['name']);
                $targetFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['avt']['tmp_name'], $targetFile)) {
                    $avt = $targetFile;
                }
            }

            $errors = [];
            if (empty($fullname)) $errors[] = "Vui lòng nhập fullname!";
            if (empty($email)) $errors[] = "Vui lòng nhập email!";
            if ($password !== $confirmPassword) $errors[] = "Mật khẩu xác nhận chưa khớp!";

            if (count($errors) > 0) {
                $account = $this->accountModel->getAccountById($id);
                include 'app/views/account/edit.php';
                return;
            }

            $this->accountModel->update($id, $fullname, $password, $role, $email, $phone, $address, $avt);
            header('Location: /PHAN_NHUT_QUY/account/list');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? 0;
        $this->accountModel->delete($id);
        header('Location: /PHAN_NHUT_QUY/account/list');
        exit;
    }
}
?>