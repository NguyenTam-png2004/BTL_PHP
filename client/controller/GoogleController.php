<?php
require "vendor/autoload.php";
include 'config/function.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../','process.env');
$dotenv->load();

class GoogleController extends BaseController {

    private $client;
    private $userManager;

    public function __construct() {
        parent::__construct('client');
        // Khởi tạo Google Client
        $this->client = new Google\Client();
        $this->client->setClientId($_ENV['setClientId']);
        $this->client->setClientSecret($_ENV['setClientSecret']);
        $this->client->setRedirectUri($_ENV['setRedirectUri']);
        $this->client->addScope('email');
        $this->client->addScope('profile');
        
        // Khởi tạo UserManager
        $this->userManager = new UserManager();
    }

    // Phương thức đăng nhập với Google (tạo URL OAuth)
    public function loginWithGoogle() {
        // Tạo URL OAuth
        $authUrl = $this->client->createAuthUrl();
        // Chuyển hướng người dùng đến Google
        $data =[
            'authUrl'=>$authUrl
        ];
        $content = $this->render('login', $data);
        require_once('view/client/application.php');
        exit();
    }

    // Phương thức xử lý callback từ Google sau khi người dùng đăng nhập
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
        $email_exist = $this->userManager->getUser('email', $userInfo->email);

        if ($email_exist) {
            // Nếu email đã tồn tại, đăng nhập và lưu vào session
            $_SESSION['account'] = $email_exist->ID;
            header('Location: index.php?controller=Home&action=HomeLogin');
            exit();
        } else {
            // Nếu chưa có tài khoản, tạo mới tài khoản
            $password = randomString('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 10);
            $ID = $this->userManager->addUser($userInfo->name, $userInfo->email, $password, $userInfo->picture);
            $_SESSION['account'] = $ID;
            header('Location: index.php?controller=Home&action=HomeLogin');
            exit();
        }
    }
}
