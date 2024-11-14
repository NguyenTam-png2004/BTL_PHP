<?php
class Database 
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    private static $instance = null;

    // Constructor để khởi tạo giá trị mặc định
    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "webhocngoaingu") {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect() {
        // Khởi tạo kết nối
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        // Kiểm tra kết nối
        if (!$this->conn) {
            die("Unable to connect to MySQL: " . mysqli_connect_error());
        }
    }

    public function close_connect(){
        mysqli_close($this->conn);
    }


    public function insert($table, $data) {
        $this->connect();
        $fieldKey = '';  
        $fieldValue = ''; 
    
        foreach ($data as $key => $value) {
            $fieldKey .= ($fieldKey ? ',' : '') . trim($key); // Thêm dấu phẩy chỉ khi $fieldKey không rỗng
            $fieldValue .= ($fieldValue ? ',' : '') . "'" . mysqli_real_escape_string($this->conn, trim($value)) . "'"; // Thêm dấu phẩy chỉ khi $fieldValue không rỗng
        }
    
        // Tạo câu lệnh SQL
        $sql = 'INSERT INTO ' . trim($table) . ' (' . trim($fieldKey) . ') VALUES (' . trim($fieldValue) . ')';
        $result = mysqli_query($this->conn, $sql);
        $insertedId = mysqli_insert_id($this->conn);

        $this->close_connect();
        return $insertedId; // Trả về ID của bản ghi mới
    }
    
    public function update($table, $data, $id) {
        $this->connect();
        $field = '';
        
        foreach ($data as $key => $value) {
            $field .= ($field ? ',' : '') . trim($key) . " ='" . mysqli_real_escape_string($this->conn, trim($value)) . "'"; // Sửa tên biến
        }
    
        // Tạo câu lệnh SQL
        $sql = 'UPDATE ' . trim($table) . ' SET ' . trim($field) . ' WHERE ID = ' . mysqli_real_escape_string($this->conn, $id); // Thêm khoảng trắng và sửa WHERE
        $result = mysqli_query($this->conn, $sql);
    
        $this->close_connect(); 
        return $result; // Trả về kết quả
    }

    public function update2($table, $data, $conditions) {
        $this->connect();
        $field = '';
        
        foreach ($data as $key => $value) {
            $field .= ($field ? ',' : '') . trim($key) . " ='" . mysqli_real_escape_string($this->conn, trim($value)) . "'"; // Sửa tên biến
        }
        $where = '';
        foreach ($conditions as $key => $value) {
            $where .= ($where ? ' AND ' : '') . trim($key) . " = '" . mysqli_real_escape_string($this->conn, trim($value)) . "'";
        }

        // Tạo câu lệnh SQL
        $sql = 'UPDATE ' . trim($table) . ' SET ' . $field . ' WHERE ' . $where;
        $result = mysqli_query($this->conn, $sql);

        $this->close_connect(); 
        return $result; // Trả về kết quả
    }
    
    public function delete($table, $column, $id) {
        $this->connect();
        $sql = "DELETE FROM ".$table." WHERE ".$column." = '".$id."'";
        $result = mysqli_query($this->conn, $sql);
        $this->close_connect(); 
        return $result; // Trả về kết quả
    }    

    // hàm trả về dữ liệu dạng mảng kết hợp với $sql là query select  
    public function get_rows($sql) {
        $this->connect();
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) { // Kiểm tra nếu truy vấn thất bại
            die("Error: " . mysqli_error($this->conn));
            return false;
        }
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC); // Lấy dữ liệu dưới dạng mảng kết hợp
        $this->close_connect(); // Đóng kết nối
        return $row; // Trả về mảng kết hợp
    }
} 
?>