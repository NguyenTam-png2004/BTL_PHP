<?php
session_start();
class StudyController extends BaseController{
    public function __construct(){
        parent::__construct('client');
    }
    public function Vocabulary($ID_lesson){
        return $this->VocabularyManager->getVocabulary('ID_lesson',$ID_lesson);
    }

    public function getIDvocabByLes($ID_lesson){
        $ListID=[
            'ID'=>[],
            'total'=>1
        ];
        $vocab = $this->Vocabulary($ID_lesson);
        foreach($vocab as $v){
            $ListID['ID'][]=$v->ID;
        }
        $ListID['total'] = count($ListID['ID']);
        return $ListID;
    }

    public function GetVocabByID($ID){
        return $this->VocabularyManager->getVocabulary('ID',$ID);
    }

    public function getQuestionByID($ID){ // lấy câu hỏi và câu trả lời dựa vào id câu hỏi
        return $this->QuestionManager->getQuestion('ID',$ID );
    }

    public function getIDQuesByLes($ID_lesson){
        $ListID=[
            'ID'=>[],
            'total'=>1
        ];
        $ques = $this->QuestionManager->getAllQuestion($_SESSION['lesson']);
        foreach($ques as $c){
            $ListID['ID'][]=$c->ID;
        }
        $ListID['total'] = count($ListID['ID']);
        return $ListID;
    }

    public function getIDVocabByType($status){
        $ListID=[
            'ID'=>[],
            'total'=>1
        ];
        $listStatus[]=$status;
        $vocab = $this->UserManager->getVocabulary($listStatus, $_SESSION['account']);
        foreach($vocab as $v){
            $ListID['ID'][]=$v->ID;
        }
        $ListID['total'] = count($ListID['ID']);
        return $ListID;
    }

    public function ViewPage1(){
        $IDVocab = $_SESSION['listID']['ID'][$_GET['vocab']];
        $vocabulary = $this->GetVocabByID($IDVocab)[0];
        $stt=(int)$_GET['vocab'];
        $data = [
            'vocabulary' => $vocabulary
        ];        
        if($stt+1 < $_SESSION['listID']['total']){
            $data['type'] = 'vocab';
            $data['stt'] = $stt+1;
        }else{
            $data['type'] = 'ques';
            $data['stt']=0;
        }
        return $this->render('page1', $data);
    }

    public function ViewPage2and3() {
        $IDQues = $_SESSION['listID']['ID'][$_GET['ques']];
        $question = $this->GetQuestionByID($IDQues);
        $imgVocab = $this->GetVocabByID($question->ID_vocabulary)[0]->image;
        $answer = Answer::getAllAnswer($IDQues);
        $data = [
            'question' => $question,
            'ques' => (int)$_GET['ques'] + 1,
            'imageVocab'=>$imgVocab,
            'answer'=>$answer
        ];
        if($question->type == 1){
            return $this->render('page2', $data);
        } else{
            return $this->render('page3', $data);
        }
    }

    public function ViewPage4(){
        $IDVocab = $_SESSION['listID']['ID'][$_GET['ques']];
        $vocabulary = $this->GetVocabByID($IDVocab)[0];
        $data = [
            'vocabulary' => $vocabulary,
            'ques'=>(int)$_GET['ques'] +1
        ];
        return $this->render('page4', $data);
    }

    public function isQuesInRange($type){
        return isset($_GET[$type]) && $_GET[$type] < $_SESSION['listID']['total'];
    }

    public function getProgress(){
        return $this->UserManager->getProgress($_SESSION['account'],'ID', $_SESSION['course']);
    }

    public function updateProgress(){
        $totalLesson = count($this->LessonManager->getLesson('ID_course', $_SESSION['course']));
        $isProgress = $this->getProgress();
        $progress = floor(((int)$_SESSION['order']/$totalLesson)*100);
        if (!$isProgress){
            $updatePro=$this->UserManager->addProgress($_SESSION['account'],$_SESSION['course'],$progress);
        }
        else{
            $updatePro=$this->UserManager->updateProgress($_SESSION['account'],$_SESSION['course'], $progress );
        }
        return $updatePro;
    }

    public function updateExp(){
        $updateExp=$this->UserManager->updateExpUser($_SESSION['account'],$this->user()->experience+1);
        return $updateExp;
    }

    public function updateStatusVocab(){
        for ($i = 0; $i < count($_SESSION['strong']); $i++) {
            $this->UserManager->updateVocabUser($_SESSION['account'], $_SESSION['strong'][$i], 'strong');
        }
        for ($i = 0; $i < count($_SESSION['weak']); $i++) {
            $this->UserManager->updateVocabUser($_SESSION['account'], $_SESSION['weak'][$i], 'weak');
        }
    }

    public function adStatusVocab(){
        for ($i = 0; $i < count($_SESSION['strong']); $i++) {
            $this->UserManager->addVocabUser($_SESSION['account'], $_SESSION['strong'][$i], 'strong');
        }
        for ($i = 0; $i < count($_SESSION['weak']); $i++) {
            $this->UserManager->addVocabUser($_SESSION['account'], $_SESSION['weak'][$i], 'weak');
        }
    }
    
    public function completeStudy(){
        $this->updateExp();
        $this->updateProgress();
        $this->adStatusVocab();
    }

    public function completeReview(){
        $this->updateStatusVocab();
    }

    public function Study(){
        $this->isLogin();
        if (isset($_GET['lesson'])) {
            $_SESSION['lesson']= $_GET['lesson'];
            $_SESSION['course']= $_GET['course'];
            $_SESSION['order']=$_GET['order'];
            $_SESSION['type']=$_GET['type'];
            $_SESSION['strong']=[];
            $_SESSION['weak']=[];
        }
        if (!isset($_SESSION['listID'])) {
            $_SESSION['listID']=$this->getIDvocabByLes($_SESSION['lesson']);
        }
        if ($this->isQuesInRange('vocab')) {
            $content = $this->ViewPage1();
        } elseif ($this->isQuesInRange('ques')) {
            $_SESSION['listID'] = $this->getIDQuesByLes($_SESSION['lesson']);
            $content = $this->ViewPage2and3();
        } else {
            if($_SESSION['type']=='Study'){
                $this->completeStudy();
            }else{
                $this->completeReview();
            }
            header("Location: index.php?controller=Study&action=ViewFinished1");
            exit();
        }
        require_once('client/view/application.php');
    }

    public function Review(){
        if(isset($_GET['status'])){
            unset($_SESSION['listID']);
            $_SESSION['status'] = $_GET['status'];
            $_SESSION['strong'] = [];
            $_SESSION['weak'] = [];
        }
        if(!isset($_SESSION['listID'])){
            $_SESSION['listID'] = $this->getIDVocabByType($_SESSION['status']);
        }
        if($this->isQuesInRange('ques')){
            $content = $this->ViewPage4();
        }else{
            $this->completeReview();
            header("Location: index.php?controller=Study&action=ViewFinished2");
            exit();
        }
        require_once('client/view/application.php');
    }

    public function ViewFinished1(){
        $this->isLogin();
        $language= $this->LanguageManager->getLanguageByID($_SESSION['language']);
        $percent = $this->getProgress();
        $data=[
            'symbol' => $language->symbol,
            'percent' => $percent[0]['percent']
        ];
        $content = $this->render('finish1', $data);
        require_once('client/view/application.php');
    }

    public function ViewFinished2(){
        unset($_SESSION['listID']);
        unset($_SESSION['lesson']);
        unset($_SESSION['course']);
        unset($_SESSION['order']);
        unset($_SESSION['type']);
        unset($_SESSION['strong']);
        unset($_SESSION['weak']);
        $this->isLogin();
        $content = $this->render('finish2');
        require_once('client/view/application.php');
    }

    public function CheckAnswers(){
        $question_id = isset($_POST['question_id']) ? $_POST['question_id'] : null; // câu hỏi
        $user_answer = isset($_POST['user_answer']) ? strtolower($_POST['user_answer']) : null; // câu trả lời của ng dùng
        $ques = isset($_POST['ques']) ? strtolower($_POST['ques']) : null;
        $ID_vocab = isset($_POST['vocab']) ? $_POST['vocab'] : null; // câu hỏi

        $correct_answer = Answer::getCorrectAnswer($question_id);
        
        $isCorrect = $correct_answer === $user_answer;

        if ($isCorrect) {
            // Kiểm tra và xóa $ID_vocab có trong $_SESSION['weak'] và strong không
            if ((!in_array($ID_vocab, $_SESSION['weak']))&&!in_array($ID_vocab, $_SESSION['strong'])) {
                $_SESSION['strong'][] = $ID_vocab;
            }
        } else {
            // Kiểm tra và xóa $ID_vocab khỏi $_SESSION['strong'] nếu nó tồn tại
            if (($key = array_search($ID_vocab, $_SESSION['strong'])) !== false) {
                unset($_SESSION['strong'][$key]);
            }
            // Chỉ thêm vào $_SESSION['weak'] nếu $ID_vocab chưa tồn tại
            if (!in_array($ID_vocab, $_SESSION['weak'])) {
                $_SESSION['weak'][] = $ID_vocab;
            }
        } 

        $responseHTML = "<div class='message-container'>
        <div class='icon'>
            <img src='assets/image_hocngoaingu/" . ($isCorrect ? "success_message.png" : "false_message.png") . "'>
        </div>
        <div class='message-content'>
            <h2>" . ($isCorrect ? "Amazing work!" : "Not quite") . "</h2>
        </div>
        <div class= 'true_answer'>
            <h2>$correct_answer</h2>
        </div>
        <a class='continue-button message_button' href='index.php?controller=Study&action=Study&ques=" . htmlspecialchars($ques) . "'>Continue</a>
        </div>";
        echo $responseHTML;
    }

    public function CheckVocab(){
        $ID_vocab = $_POST['ID_vocab'];
        $ques=$_POST['ques'];
        $user_answer = isset($_POST['user_answer']) ? strtolower($_POST['user_answer']) : null;
        $vocab = $this->GetVocabByID($ID_vocab)[0];

        $isCorrect = $user_answer===$vocab->vocabulary;
       
        if($isCorrect){
            $_SESSION['strong'][]=$ID_vocab;
        }else{
            $_SESSION['weak'][]=$ID_vocab;
        }
        $responseHTML = "<div class='message-container'>
        <div class='icon'>
            <img src='assets/image_hocngoaingu/" . ($isCorrect ? "success_message.png" : "false_message.png") . "'>
        </div>
        <div class='message-content'>
            <h2>" . ($isCorrect ? "Amazing work!" : "Not quite") . "</h2>
        </div>
        <div class= 'true_answer'>
            <h2>$vocab->vocabulary</h2>
            <p>$vocab->description</p>
        </div>
        <a class='continue-button message_button' href='index.php?controller=Study&action=Review&ques=" . htmlspecialchars($ques) . "'>Continue</a>
        </div>";
        echo $responseHTML;

    }
}
?>