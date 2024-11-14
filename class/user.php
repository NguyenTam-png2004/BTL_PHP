<?php
class UserManager {
    private $db;
    function __construct(){
        $this->db = Database::getInstance();
    }
    public function getAllUsers() {
        $query = "SELECT * FROM users ORDER BY experience DESC";
        $results = $this->db->get_rows($query);
        $users = [];
        foreach ($results as $result) {
            $users[] = new User($result['ID'], $result['username'], $result['email'], $result['avatar'], $result['password'], $result['experience'], $result['role']);
        }
        return $users;
    }

    public function getUser($column, $ID) {
        $query = "SELECT * FROM users WHERE $column = '" . $ID . "'";
        $result = $this->db->get_rows($query); 
        if ($result) {
            return new User(
                $result[0]['ID'],
                $result[0]['username'],
                $result[0]['email'],
                $result[0]['avatar'],
                $result[0]['password'],
                $result[0]['experience'],
                $result[0]['role']
            );
        } else {
            return false;
        }
    }    

    public function addUser($username, $email, $password, $avatar) {
        $id = $this->db->insert('users', [
            'username' => $username, 
            'email' => $email, 
            'password' => $password, 
            'avatar' => $avatar
        ]);
        return $id; // Trả về ID vừa được tạo
    }
    public function updateUser() {
        return $this->db->update('users', [
            'username' => $username, 
            'email' => $email, 
            'password' => $password, 
            'avatar' => $avatar, 
            'experience' => $experience, 
            'role' => $role
        ], $ID);
    }
    public function updateName($ID, $username){
        return $this->db->update('users', [
            'username' => $username, 
        ], $ID);
    }
    public function updateAvatar($ID, $avatar){
        return $this->db->update('users', [
            'avatar' => $avatar, 
        ], $ID);
    }
    public function updatePassword($ID, $password){
        return $this->db->update('users', [
            'password' => $password, 
        ], $ID);
    }
    public function updateExpUser($ID,$experience) {
        return $this->db->update('users', [
            'experience' => $experience
        ], $ID);
    }
    public function deleteUser($ID) {
            return $this->db->delete('users', 'ID', $ID);  
    }  
    public function getRank($experience) {
        $query = "SELECT * FROM users WHERE experience > $experience ORDER BY experience DESC";
        $results = $this->db->get_rows($query);  // get_rows() trả về mảng kết quả
        $rank = count($results) + 1;  // Tính số lượng người có kinh nghiệm cao hơn và cộng 1 cho rank của người hiện tại
        return $rank;
    }     
    public function bxhTop10(){
        $query = "SELECT * FROM users ORDER BY experience DESC
        LIMIT 10";
        $results = $this->db->get_rows($query);
        $bxh = [];
        foreach ($results as $result) {
            $bxh[] = new User($result['ID'], $result['username'], $result['email'], $result['avatar'], $result['password'], $result['experience'], $result['role']);
        }
        return $bxh;
    }
    public function getProgress($ID_user, $column = null, $ID = null) {
        // Câu truy vấn cơ bản
        $query = "SELECT * FROM progress
                  INNER JOIN courses ON progress.ID_course = courses.ID
                  WHERE ID_user = '$ID_user'";
    
        // Nếu có tham số $column và $ID, thêm điều kiện lọc vào câu truy vấn
        if ($column && $ID) {
            $query .= " AND courses.$column = '$ID'";
        }
        $query = $query ."ORDER BY progress.updated_at DESC";
        // Thực thi câu truy vấn và trả về kết quả
        return $this->db->get_rows($query);
    }    
    public function updateProgress($ID, $course, $percent){
        return $this->db->update2('progress', ['percent'=>$percent], ['ID_user'=>$ID,'ID_course'=>$course]);
    }
    public function addProgress($ID_user, $course, $percent){
        return $this->db->insert('progress', ['ID_user'=>$ID_user,'ID_course'=>$course,'percent'=>$percent]);
    }
    public function deleteProgress($ID_user){
        return $this->db->delete('progress', 'ID_user', $ID_user);
    }
    //lấy ra từ vụng của người dùng theo status
    public function getVocabulary($status, $ID_user) { //Đầu vào status id là dạng mảng ví dụ [1] hoặc [1,2]
        $status_str = "'" . implode("','", $status) . "'";
        $query = "SELECT vocabularies.* FROM vocabularies
              INNER JOIN vocabstatus ON vocabularies.ID = vocabstatus.ID_vocabulary
              WHERE vocabstatus.ID_user = $ID_user
              AND vocabstatus.status IN ($status_str)";
        $results = $this->db->get_rows($query);
        $vocabulary = [];
        foreach ($results as $result) {
            $vocabulary[] = new Vocabulary (
            $result['ID'], 
            $result['ID_lesson'], 
            $result['vocabulary'], 
            $result['sound'], 
            $result['image'], 
            $result['description'], 
            $result['meaning'],
            $result['example']);
        }
        return $vocabulary;
    }
    public function addVocabUser($ID_user, $ID_vocabulary, $status){
        return $this->db->insert('vocabstatus', ['ID_user' => $ID_user, 'ID_vocabulary' => $ID_vocabulary, 'status' =>$status]);
    }
    public function updateVocabUser($ID_user, $ID_vocabulary, $status) {
        return $this->db->update2('vocabstatus', ['status' => $status], ['ID_user' => $ID_user, 'ID_vocabulary' => $ID_vocabulary]);
    }
    public function deleteVocabUser($ID_user) {
        return $this->db->delete('vocabstatus','ID', $ID_user);
    }
}
class User {
    public $ID; 
    public $username;
    public $email;
    public $avatar;
    public $password;
    public $experience;
    public $role;

    public function __construct($ID, $username, $email, $avatar, $password, $experience, $role) {
        $this->ID = $ID;
        $this->username = $username;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->password = $password;
        $this->experience = $experience;
        $this->role = $role;
    }    
    // Phương thức xác thực mật khẩu (không trả về mật khẩu)
    public function verifyPassword($inputPassword) {
        return password_verify($inputPassword, $this->password);
    }     
}
?>