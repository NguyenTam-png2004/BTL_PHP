<?php
class LanguageManager{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getLanguageByID($ID) {
        $query = "SELECT * FROM languages WHERE ID = '". $ID. "'";
        $result = $this->db->get_rows($query);
        if ($result) {
            return new Language($result[0]['ID'], $result[0]['language'], $result[0]['flag'], $result[0]['symbol']);
        } else {
            return false;
        }
    }
    public function addLanguage($language, $flag, $symbol){
        return $this->db->insert('languages', [
            'language' => $language,
            'flag' => $flag,
            'symbol' => $symbol
        ]);
    }
    
    public function updateLanguage($ID, $language, $flag, $symbol){
        return $this->db->update('languages', 
        ['language' => $language, 'flag' => $flag, 'symbol' => $symbol], $ID);
    }
    
    public function getAllLanguages() {
        $query = "SELECT * FROM languages";
        $results = $this->db->get_rows($query); 
        $languages = []; // Khởi tạo mảng ngôn ngữ
        foreach ($results as $result) {
            $languages[] = new Language($result['ID'], $result['language'], $result['flag'], $result['symbol']);
        }
        return $languages; 
    }

    public function getAllGrammar($ID_language){
        $query = "SELECT * FROM grammars WHERE ID_language = $ID_language";
        $results = $this->db->get_rows($query); 
        $grammar = []; 
        foreach ($results as $result) {
            $grammar[] = new Grammar($result['ID'], $result['ID_language'], $result['name'], $result['description'], $result['grammar']);
        }
        return $grammar;
    }
}
class Language{
    public $ID;
    public $language;
    public $flag;
    public $symbol;
    public function __construct($ID, $language, $flag, $symbol) {
        $this->ID = $ID;
        $this->language = $language;
        $this->flag = $flag;
        $this->symbol = $symbol;
    }
}
class Course {
    public $db;
    public $ID;
    public $ID_language;
    public $course;

    public function __construct($ID, $ID_language, $course) {
        $this->db = Database::getInstance();
        $this->ID =$ID;
        $this->ID_language = $ID_language;
        $this->course = $course;
    }
    public static function getCourse($column, $value) {
        $db = Database::getInstance();
        $query = "SELECT * FROM courses WHERE $column = '". $value. "'";
        $result = $db->get_rows($query);
        $courses = [];
        foreach($result as $row){
            $courses[] = new Course($row['ID'], $row['ID_language'], $row['course']);
        }
        return $courses;
    }
    public function addCourse(){
        return $this->db->insert('courses',[
            'ID_language' => $this->ID_language,
            'course' => $this->course]);
    }
    public function updateCourse(){
        return $this->db->update('courses', 
        ['ID_language' => $this->ID_language, 
        'course' => $this->course], $this->ID);
    }
}

class Grammar {
    public $db;
    public $ID;
    public $ID_language;
    public $name;
    public $grammar;

    public function __construct($ID,$ID_language, $name, $description, $grammar) {
        $this->db = Database::getInstance();
        $this->ID = $ID;
        $this->ID_language = $ID_language;
        $this->name = $name;
        $this->description= $description;
        $this->grammar = $grammar;
    }
    public static function getGrammarByID($ID) {
        $db = Database::getInstance();
        $query = "SELECT * FROM grammars WHERE ID = '". $ID. "'";
        $result = $db->get_rows($query);
        if ($result) {
            return new Grammar($result[0]['ID'], $result[0]['ID_language'], $result[0]['name'], $result[0]['description'], $result[0]['grammar']);
        } else {
            return false;
        }
    }
    public function addGrammar(){ 
        return $this->db->insert('grammars', ['ID_language' => $ID_language, 'Name' => $name, 'description'=>$description, 'grammar' => $grammar]);
    }
    public function updateGrammar($ID_language, $name, $grammar){
        return $this->db->update('grammars', ['ID_language' => $ID_language, 'Name' => $name, 'description'=>$description, 'grammar' => $grammar], $this->ID);
    }
    public function deleteGrammar(){ // xóa grammar theo id grammar
        return $this->db->delete('grammars', 'ID', $this->ID);
    }
    
}
?>