<?php
class BaseController {
  protected $folder;
  public $UserManager;
  public $LanguageManager;
  public $LessonManager;
  public $VocabularyManager;
  public $QuestionManager;
  public $IDLanguageCurr;
  public function __construct($folder)
  {
    $this->folder = $folder;
    $this->UserManager = new UserManager();
    $this->LanguageManager = new LanguageManager();
    $this->LessonManager = new LessonManager();
    $this->VocabularyManager = new VocabularyManager();
    $this->QuestionManager = new QuestionManager();
    $this->IDLanguageCurr = isset($_GET['language'])? (int) $_GET['language'] : null;
  }

  // Hàm render từng view file và lưu nội dung vào $contents
  function render($file, $data = array()){
    $view_file = "client/view/" . $file . ".php"; 

    if (is_file($view_file)) {
      extract($data);
      ob_start();
      require_once($view_file);
      $content = ob_get_clean(); // Nối kết quả của mỗi lần render vào $contents
      return $content;
    } else {
      return $view_file;
    }
  }

  public function LanguageCurrent(){
    // Kiểm tra xem có ngôn ngữ được người dùng chọn không
    if ($this->IDLanguageCurr) {
        $_SESSION['language'] = $this->IDLanguageCurr;
    } else {
        // Lấy tiến độ học của người dùng
        $progress = $this->UserManager->getProgress($_SESSION['account']);
        $_SESSION['language'] = ($progress) ? $progress[0]['ID_language'] : 1;
    }
    return $this->LanguageManager->getLanguageByID($_SESSION['language']);
  }

  public function user(){
    return $this->UserManager->getUser('ID', $_SESSION['account']);
  }

  public function BXH(){
    return $this->UserManager->bxhTop10();
  }
  
  public function RenderHeader(){
    $ListLanguage = $this->LanguageManager->getAllLanguages(); // lấy tất cả language
      $LanguageCurrent = $this->LanguageCurrent();
      $user= $this->user();
      $data = ['user'=>$user,
              'languages' => $ListLanguage, 
              'LanguageCurrent'=>$LanguageCurrent,
              'BXH'=>$this->BXH()
              ];
      return $this->render('header',$data);
  }

  
  public function isLogin(){
  if (!isset($_SESSION['account']) || empty($_SESSION['account'])) {
      header('Location: index.php?controller=SignUser&action=ViewLogin');
      exit();
  }
  }
}

?>
