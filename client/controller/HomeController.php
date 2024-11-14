<?php
session_start();
class HomeController extends BaseController{
  private $IDCourseCurr;
    public function __construct()
  {
    parent::__construct('client'); // Sử dụng thư mục "home" và layout "client"
    $this->IDCourseCurr = isset($_GET['course']) ? (int) $_GET['course'] : null;
  }
    public function HomeLogout(){
        include "client/view/home_logout.php";
    }

  
    public function getCourseCurrent(){
      if ($this->IDCourseCurr){
        return Course::getCourse('ID', $this->IDCourseCurr)[0];
      }else{
        return Course::getCourse('ID_language', $_SESSION['language'])[0];
      }
    }

    public function getCourses(){
      return Course::getCourse('ID_language', $_SESSION['language']);
    }

    public function getProgressCourse(){
      $progressData =$this->UserManager->getProgress($_SESSION['account'], 'ID',$this->getCourseCurrent()->ID);
      if (!$progressData){
        return 0;
      }
      return $progressData[0]['percent'];
    }

    public function getLesson(){
      $ListLesson = $this->LessonManager->getLesson('ID_course', $this->getCourseCurrent()->ID);
      $percent = $this->getProgressCourse();
      $Learned = ceil(($percent/100)*count($ListLesson));
      $Lesson = [
        'LessonLearned' => [],
        'LessonLearning' => [],
        'LessonNext' => []
      ];
      foreach ($ListLesson as $lesson){
        if ($lesson->lesson_order <= $Learned){
          $Lesson['LessonLearned'][] = $lesson;
        }elseif ($lesson->lesson_order == $Learned+1){
          $Lesson['LessonLearning'][] = $lesson;
        } else{
          $Lesson['LessonNext'][] = $lesson;
        }
      }
      return $Lesson;
    }

    public function getVocabByStatus($status){
      return $this->UserManager->getVocabulary($status,$_SESSION['account']);
    }

    public function getAllGrammar(){
      return $this->LanguageManager->getAllGrammar($_SESSION['language']);
    }

    public function ReviewVocabulary(){
      $status[]=$_GET['status'];
      $strong = count($this->getVocabByStatus(['strong']));
      $weak = count($this->getVocabByStatus(['weak']));
      $totalVocab = count($this->getVocabByStatus(['strong', 'weak']));
      if($totalVocab==0){
        $percentStrong =0;
        $percentWeak =0;
      }else{
        $percentStrong = ($strong/$totalVocab)*100;
        $percentWeak = ($weak/$totalVocab)*100;
      }
      $data=[
        'strong' => $strong,
        'percentStrong' => $percentStrong,
        'weak' => $weak,
        'percentWeak' => $percentWeak,
      ];
      $content = $this->render('review_vocabulary',$data);
      $content .=$this->RenderHeader();
      require_once('client/view/application.php');
    }

    public function FilterVocab(){
      $status[]=$_GET['status'];
      $vocabulary = $this->getVocabByStatus($status);
      echo json_encode($vocabulary);
    }

    public function ReviewGrammar(){
      $grammars = $this->getAllGrammar($_SESSION['language']);
      $data=[
        'grammars' => $grammars
      ];
      $content = $this->render('review_grammar',$data);
      $content .=$this->RenderHeader();
      require_once('client/view/application.php');
    }

    public function ViewGrammar(){
      $this->isLogin();
      $grammar = Grammar::getGrammarByID($_GET['grammar']);
      $data=[
        'grammar' => $grammar,
      ];
      $content= $this->render('grammar',$data);
      $content.=$this->RenderHeader();
      require_once('client/view/application.php');
    }

    public function RenderHomeLogin(){
      $ListCourse = $this->getCourses();
      $CourseCurrent = $this->getCourseCurrent();
      $getProgressCourse = $this->getProgressCourse();
      $ListLesson = $this->getLesson();
      $language = $this->LanguageManager->getLanguageByID($_SESSION['language']);
      $user = $this->user()->username;
      $data = [ 
        'user' => $user,
        'language' => $language,
        'courseCurrent' => $CourseCurrent,
        'courses'=>$ListCourse,
        'progressCourse' => $getProgressCourse,
        'lessons' => $ListLesson];
      return $this->render('home_login',$data);
    }

    public function HomeLogin(){
      $this->isLogin();
      $content = $this->renderHeader();    // Render phần header
      $content .= $this->renderHomeLogin();
      require_once('client/view/application.php');
    }
}
?>