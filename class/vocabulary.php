<?php
class VocabularyManager{
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addVocabulary() {
        return $this->db->insert('vocabularies', 
        ['ID_lesson' => $ID_lesson, 
        'vocabulary'=>$vocabulary, 
        'sound'=>$sound,
        'image'=>$image,
        'description'=>$description,
        'meaning'=>$meaning,
        'example'=>$example]);
    }
    public function updateVocabulary() {
        $this->db->update('vocabularies', 
        ['ID_lesson' => $ID_lesson, 
        'vocabulary'=>$vocabulary, 
        'sound'=>$sound,
        'image'=>$image,
        'description'=>$description,
        'meaning'=>$meaning,
        'example'=>$example], $ID);
    }
    public function getVocabulary($column, $value){
        $query = "SELECT * FROM vocabularies WHERE $column = '$value'";
        $results = $this->db->get_rows($query);
        $vocabularies= [];
        foreach ($results as $result){
            $vocabularies[] = new Vocabulary($result['ID'], $result['ID_lesson'], $result['vocabulary'], $result['sound'], $result['image'], $result['description'], $result['meaning'], $result['example']);
        }
        return $vocabularies;
    }
}
class Vocabulary{
    public $ID;
    public $ID_lesson;
    public $vocabulary;
    public $sound;
    public $image;
    public $description;
    public $meaning;
    public $example;
    public function __construct($ID, $ID_lesson, $vocabulary, $sound, $image, $description, $meaning, $example) {
        $this->ID = $ID;
        $this->ID_lesson = $ID_lesson;
        $this->vocabulary = $vocabulary;
        $this->sound = $sound;
        $this->image = $image;
        $this->description = $description;
        $this->meaning = $meaning;
        $this->example = $example;
    }
}

class QuestionManager{
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getQuestion($column, $value) {
        $result = $this->db->get_rows("SELECT * FROM questions WHERE $column = '$value'");
        if ($result){
            return new Question($result[0]['ID'], 
            $result[0]['ID_vocabulary'], 
            $result[0]['type'], 
            $result[0]['question']);
        }
        return false;
    }
    public function getAllQuestion($ID_lesson) {
        $results = $this->db->get_rows("SELECT questions.* FROM questions 
        INNER JOIN vocabularies ON (vocabularies.ID = questions.ID_vocabulary)
        WHERE vocabularies.ID_lesson = '$ID_lesson'");
        if ($results){
            $question = [];
            foreach($results as $result){
                $question[] = new Question($result['ID'], 
                $result['ID_vocabulary'], 
                $result['type'], 
                $result['question']);
            }
            return $question;
        }
        return false;
    }
    public function addQuestion() {
        return $this->db->insert('questions', 
        ['ID_vocabulary' => $this->ID_vocabulary, 
        'type'=>$this->type, 
        'question'=>$this->question]);
    }
    public function updateQuestion() {
        $this->db->update('questions', 
        ['ID_vocabulary' => $this->ID_vocabulary, 
        'type'=>$this->type,
        'question'=>$this->question], $this->ID);
    }
}
class Question{
    public $ID;
    public $ID_vocabulary;
    public $type;
    public $question;
    public function __construct($ID, $ID_vocabulary, $type, $question) {
        $this->ID = $ID;
        $this->ID_vocabulary = $ID_vocabulary;
        $this->type = $type;
        $this->question = $question;
    }
}

class Answer{
    private $db;
    public $ID;
    public $ID_question;
    public $answer;
    public $is_correct;
    public function __construct($ID, $ID_question, $answer, $is_correct) {
        $this->db = Database::getInstance();
        $this->ID = $ID;
        $this->ID_question = $ID_question;
        $this->answer = $answer;
        $this->is_correct = $is_correct;
    }
    public static function getAllAnswer($id) {
        $db = Database::getInstance();
        $results = $db->get_rows("SELECT * FROM answers WHERE ID_question = ".$id);
        if ($results){
            $answers = [];
            foreach($results as $result){
                $answers[] = new Answer($result['ID'], 
                $result['ID_question'], 
                $result['answer'], 
                $result['is_correct']);
            }
            return $answers;
        }
        return false;
    }
    public static function getAnswerById($ID){
        $db = Database::getInstance();
        $result = $db->get_rows("SELECT * FROM answers WHERE ID = ".$ID);
        if ($result){
            return new Answer($result[0]['ID'], 
            $result[0]['ID_question'], 
            $result[0]['answer'], 
            $result[0]['is_correct']);
        }
        return false;
    }
    public static function getCorrectAnswer($ID_question){
        $db = Database::getInstance();
        $query = "SELECT * FROM answers WHERE ID_question = '$ID_question' AND is_correct = 1";
        $result = $db->get_rows($query);
        if (!$result){return null;};
        return  $result[0]['answer'];
    }
    public function addAnswer() {
        return $this->db->insert('answers', 
        ['ID_question' => $this->question_id, 
        'answer'=>$this->answer, 
        'is_correct'=>$this->is_correct]);
    }
    public function updateAnswer() {
        $this->db->update('answers', 
        ['question_id' => $this->question_id, 
        'answer'=>$this->answer, 
        'is_correct'=>$this->is_correct], $this->ID);
    }
    public function deleteAnswer() {
        return $this->db->delete('answers', 'id',$this->ID);
    }
}
?>