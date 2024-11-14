<?php
session_start();

class ProfileController extends BaseController{

  public function __construct(){
    parent::__construct('client'); // Sử dụng thư mục "home" và layout "client"
  }

  public function getAverProgress(){ // lấy ra tiến trình trung bình người dùng đang học
    $progresses = $this->UserManager->getProgress( $_SESSION['account'], 'ID_language', $_SESSION['language']);      
    $aver=0;
    if(!$progresses){
      return $aver;
    }else{
      $totalLesson = count($this->LessonManager->getLessonByLang($_SESSION['language']));
      $totalLessonLearned = 0;
      foreach($progresses as $progress){
        $totalLessonLearned = $totalLessonLearned + 
        (($progress['percent']/100)*count($this->LessonManager->getLesson('ID_course', $progress['ID_course'])));
      };
      $aver = (int)(($totalLessonLearned/$totalLesson)*100);
      return $aver;
    }
  }

  public function languageCurrent(){ // lấy ra ngôn ngữ hiện tại
    return $this->LanguageManager->getLanguageByID($_SESSION['language']);
  }

  public function totalLanguage() { 
    $progresses = $this->UserManager->getProgress($_SESSION['account']);
    
    $languages = [];
    
    foreach ($progresses as $progress) {
        $languages[] = $progress['ID_language'];
    }

    // Sử dụng array_unique để lọc các ID ngôn ngữ duy nhất
    $languages = array_unique($languages);
    
    return count($languages);
  }

  public function totalVocabulary(){ //Tổng từ vựng người dùng đang học
    return $this->UserManager->getVocabulary(['strong','weak'], $_SESSION['account']);
  }

  public function rank(){
    return $this->UserManager->getRank($this->user()->experience);//lấy ra rank người dùng
  }

  public function DataProfile(){
    $Progress = $this->getAverProgress();
    $languageCurrent = $this->languageCurrent();
    $totalLanguage = $this->totalLanguage();
    $totalVocabulary = count($this->totalVocabulary());
    $rank = $this->rank();//lấy ra rank người dùng
    $data = ['user' => $this->user(),
              'Progress'=> $Progress,
              'languageCurrent'=>$languageCurrent, 
              'totalLanguage'=>$totalLanguage, 
              'totalVocabulary'=>$totalVocabulary,
              'rank' => $rank,
            ];
    return $this->render('profile',$data);
  }

  public function ViewProfile(){
    $this->isLogin();
    $content = $this->DataProfile();
    $content .= $this->renderHeader();
    require_once('client/view/application.php');
  }
  
  public function ViewSetting(){
    $this->isLogin();
    $data=[
      'user' => $this->user()
    ];
    $content = $this->render('setting', $data);
    $content.= $this->renderHeader();
    require_once('client/view/application.php');
  }

  public function Update(){
    $username = $_POST['username'];
    $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : null;
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : null;
    
    // Kiểm tra mật khẩu
    if ($current_password && $new_password) {
        $password = $this->user()->password;
        if ($password == $current_password&& strlen($new_password)>=10) {
            $this->UserManager->updatePassword($_SESSION['account'], $new_password);
        } else {
            echo json_encode(["status" => "false", "message" => "Mật khẩu không đúng!"]);
            exit();
        }
    }
    
    // Cập nhật tên người dùng
    if ($username) {
        $this->UserManager->updateName($_SESSION['account'], $username);
    }

    // Kiểm tra và xử lý ảnh tải lên
    if (isset($_FILES['image-upload']) && $_FILES['image-upload']['error'] === 0) {
        $fileTmpPath = $_FILES['image-upload']['tmp_name']; // Đường dẫn tạm thời của file
        $fileName = $_FILES['image-upload']['name'];         // Tên gốc của file
        $fileSize = $_FILES['image-upload']['size'];         // Kích thước của file
        $fileType = $_FILES['image-upload']['type'];         // Loại file (image/jpeg, image/png, v.v.)

        // Kiểm tra kích thước ảnh
        list($width, $height) = getimagesize($fileTmpPath); // Lấy chiều rộng và chiều cao của ảnh

        // Kiểm tra xem ảnh có kích thước 1x1 không
        /*if ($width !== 1 || $height !== 1) {
          echo json_encode(["status" => "false", "message" => "Ảnh không có kích thước 1x1 pixel. Kích thước: {$width}x{$height}."]);
            exit();
        }*/

        // Kiểm tra loại file ảnh (ví dụ: chỉ chấp nhận jpg, png)
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($fileType, $allowedTypes)) {
          echo json_encode(["status" => "false", "message" => "Chỉ cho phép tải lên các file ảnh JPG hoặc PNG."]);
            exit();
        }

        // Lưu ảnh vào thư mục đích
        $uploadDir = 'assets/';
        $destination = $uploadDir . basename($fileName);
        $avatar = 'http://localhost:8088/php03_webhocngoaingu/'.$destination;

        // Di chuyển file từ thư mục tạm thời vào thư mục đích
        if (!move_uploaded_file($fileTmpPath, $destination)) {
          echo json_encode(["status" => "false", "message" => "Có lỗi xảy ra khi tải lên file."]);
          exit();
        }

        // Cập nhật avatar
        $this->UserManager->updateAvatar($_SESSION['account'], $avatar);
    }

    echo json_encode(["status" => "success", "message" => "Cập nhật thành công!"]);
}

  public function Delete(){
    $this->UserManager->deleteProgress($_SESSION['account']);
    $this->UserManager->deleteVocabUser($_SESSION['account']);
    $this->UserManager->deleteUser($_SESSION['account']);
    session_destroy();
    echo json_encode(["status" => "success", "message" => "Xóa tài khoản thành công!"]);
    header('Location: index.php?controller=Home?action=HomeLogout');
  }
}
?>