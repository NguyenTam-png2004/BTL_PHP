<?php
class Lesson {
    private $db;
    public $ID;
    public $ID_course;
    public $lesson;
    public $lesson_order;
    public $description;
    public $image;

    public function __construct($ID, $ID_course, $lesson, $lesson_order, $description, $image) {
        $this->db = Database::getInstance();
        $this->ID = $ID;
        $this->ID_course = $ID_course;
        $this->lesson = $lesson;
        $this->lesson_order = $lesson_order;
        $this->description = $description;
        $this->image = $image;
    }
}
class LessonManager{
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function addLesson($ID_course,$lesson, $lesson_order, $description, $image) {
        return $this->db->insert('lessons', 
        ['ID_course' => $ID_course, 
        'lesson'=>$lesson, 
        'lesson_order'=>$lesson_order, 
        'description'=>$description, 
        'image'=>$image]);
    }
    public function updateLesson($ID, $ID_course, $lesson, $lesson_order, $description, $image) {
        $this->db->update('lessons', 
        ['ID_course' => $ID_course, 
        'lesson'=>$lesson, 
        'lesson_order'=>$lesson_order, 
        'description'=>$description, 
        'image'=>$image], $ID);
    }
    public function getLesson($column, $ID, ) {

        $query = "SELECT * FROM lessons WHERE $column = '$ID' ORDER BY lesson_order ASC";
        $results = $this->db->get_rows($query);
        $lessons = [];
        foreach($results as $result){
            $lessons[]= new Lesson($result['ID'], $result['ID_course'], $result['lesson'], $result['lesson_order'], $result['description'], $result['image']);
        }
        return $lessons;
    }
    public function getLessonByLang($ID) {
        $query = "SELECT * FROM lessons 
        INNER JOIN courses ON courses.ID = lessons.ID_course
        WHERE courses.ID_language = '$ID'";
        $results = $this->db->get_rows($query);
        return $results;
    }
    
}
?>