<?php
session_start();
require "vendor/autoload.php";
require_once 'config/function.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../','process.env');
$dotenv->load();

class SignUserController extends BaseController {
    private $client;

    public function __construct() {
        parent::__construct('client'); // Sử dụng thư mục "client" và layout
        // Khởi tạo Google Client
        $this->client = new Google\Client();
        $this->client->setClientId($_ENV['setClientId']);
        $this->client->setClientSecret($_ENV['setClientSecret']);
        $this->client->setRedirectUri($_ENV['setRedirectUri']);
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function ViewLogin() {
        // Tạo URL OAuth
        $authUrl = $this->client->createAuthUrl();
        // Chuyển hướng người dùng đến Google
        $data =[
            'authUrl'=>$authUrl
        ];
        $content = $this->render('login', $data);
        require_once('client/view/application.php');
        exit();
    }

    public function handleGoogleCallback() {
        // Kiểm tra xem có mã authorization code không
        if (!isset($_GET["code"])) {
            header('Location: http://localhost:8088/php03_webhocngoaingu/public/login.php');
            exit();
        }

        // Lấy token bằng mã code từ Google
        $token = $this->client->fetchAccessTokenWithAuthCode($_GET["code"]);
        $this->client->setAccessToken($token);

        // Lấy thông tin người dùng từ Google
        $google_oauth = new Google\Service\Oauth2($this->client);
        $userInfo = $google_oauth->userinfo->get();

        // Kiểm tra xem email có tồn tại trong hệ thống chưa
        $email_exist = $this->UserManager->getUser('email', $userInfo->email);

        if ($email_exist) {
            // Nếu email đã tồn tại, đăng nhập và lưu vào session
            $_SESSION['account'] = $email_exist->ID;
            header('Location: index.php?controller=Home&action=HomeLogin');
            exit();
        } else {
            // Nếu chưa có tài khoản, tạo mới tài khoản
            $password = randomString('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 10);
            $ID = $this->UserManager->addUser($userInfo->name, $userInfo->email, $password, $userInfo->picture);
            $_SESSION['account'] = $ID;
            header('Location: index.php?controller=Home&action=HomeLogin');
            exit();
        }
    }

    public function SignIn() {
        $email_signIn = check_string($_POST['email_signIn']);
        $password_signIn = check_string($_POST['password_signIn']);

        $checkAccount = $this->UserManager->getUser('email', $email_signIn);
        
        if (!$checkAccount) {
            echo json_encode(["status" => "false", "message" => "email không đúng"]);
            exit();
        }

        if ($password_signIn !== $checkAccount->password) {
            echo json_encode(["status" => "false", "message" => "Mật khẩu không đúng"]);
            exit();
        }

        $_SESSION['account'] = $checkAccount->ID; // Lưu ID người dùng vào session
        echo json_encode(["status" => "success", "role" => $checkAccount->role]);
        exit();
    }

    public function SignUp() {
        $username_signUp = check_string($_POST['username_signUp']);
        $email_signUp = check_string($_POST['email_signUp']);
        $password_signUp = check_string($_POST['password_signUp']);
        $image = 'http://localhost:8088/php03_webhocngoaingu/assets/image_hocngoaingu/avatar.jpg';

        // Kiểm tra email đã tồn tại trong hệ thống
        $checkAccount = $this->UserManager->getUser('email', $email_signUp);
        if ($checkAccount) {
            echo json_encode(["status" => "false", "message" => "Email đã tồn tại"]);
            exit();
        }elseif(strlen($password_signUp)<10){
            echo json_encode(["status" => "false", "message" => "Mật khẩu phải trên 10 ký tự"]);
            exit();
        }
        // Thêm người dùng mới vào database
        $ID = $this->UserManager->addUser($username_signUp, $email_signUp, $password_signUp, $image);
        
        $_SESSION['account'] = $ID; // Lưu ID người dùng vào session
        echo json_encode(["status" => "success", "role" => "1"]);
        exit();
    }

    public function Logout() {
        session_destroy();
        header('Location: index.php?controller=Home&action=HomeLogout');
        exit();
    }
}
