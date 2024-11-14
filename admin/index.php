<?php
session_start();
ob_start();
include "config/pdo.php";
include 'header.php';
include "model/khoahoc.php";
include "model/ngonngu.php";
include "model/baihoc.php";
include "model/account.php";
include "model/nguphap.php";
include "model/tuvung.php";
include "model/lessons.php";
include "model/answer.php";
include "model/cauhoi.php";

// Model chưa có function để giao tiếp với cơ sở dữ liệu
// Index đóng vai trò như 1 controller để giao tiếp với model và view

if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
      //khoahoc
    case 'add_khoahoc':
      if (isset($_POST['btn_add_categori']) && $_POST['btn_add_categori']) {
        $ID_language = $_POST['ID_language'];
        $course = $_POST['course'];
        insert_khoahoc($ID_language, $course);
        $thongbao = "Thêm thành công";
      }
      $listngonngu = loadAll_ngonngu();
      include './khoahoc/add_khoahoc.php';
      break;

    case 'list_khoahoc':
      // Nhận thông tin của search và chuyền vào function để tìm kiểm thông tin qua truy vấn
      if (isset($_POST['search_dm']) && $_POST['search_dm']) {
        $kyw = $_POST['course'];
        $ID_language = $_POST['ID_language'];
      } else {
        $kyw = '';
        $ID_language = 0;
      }
      $listngonngu = loadAll_ngonngu();
      $listkhoahoc = loadAll_khoahoc($kyw, $ID_language);
      include "./khoahoc/list_khoahoc.php";
      break;
    case 'delete_khoahoc':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_khoahoc($_GET['ID']);
      }
      $listkhoahoc = loadAll_khoahoc("", 0);
      include './khoahoc/list_khoahoc.php';
      break;
    case 'edit_khoahoc':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $khoahoc = loadOne_khoahoc($_GET['ID']); // gọi chi tiết thông của khóa học qua ID khóa học đã được chuyền
      }
      $listngonngu = loadAll_ngonngu();
      include "./khoahoc/update_khoahoc.php";
      break;
    case 'update_khoahoc':
      if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $ID = $_POST['ID'];
        $ID_language = $_POST['ID_language'];
        $course = $_POST['course'];
        update_khoahoc($ID, $ID_language, $course);
        $thongbao = "Cập nhật thành công";
      }
      $listkhoahoc = loadAll_khoahoc();
      include "./khoahoc/list_khoahoc.php";
      break;
      // baihoc
    case 'add_baihoc':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $ID_course = $_POST['ID_course'];
        $lesson = $_POST['lesson'];
        $lesson_order = $_POST['lesson_order'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "assets/upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        insert_baihoc($ID_course, $lesson, $lesson_order, $description, $image);
        $thongbao = "Thêm thành công";
      }
      $listkhoahoc = loadAll_khoahoc();
      include './baihoc/add_baihoc.php';
      break;
    case 'list_baihoc':
      if (isset($_POST['search_dm']) && $_POST['search_dm']) {
        $kyw = $_POST['lesson'];
        $ID_course = $_POST['ID_course'];
      } else {
        $kyw = '';
        $ID_course = 0;
      }
      $listkhoahoc = loadAll_khoahoc();
      $listbaihoc = loadAll_baihoc($kyw, $ID_course);
      include "./baihoc/list_baihoc.php";
      break;
    case 'delete_baihoc':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_baihoc($_GET['ID']);
      }
      $listbaihoc = loadAll_baihoc("", 0);
      include "./baihoc/list_baihoc.php";
      break;
    case 'edit_baihoc':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $baihoc = loadOne_baihoc($_GET['ID']);
      }
      $listkhoahoc = loadAll_khoahoc();
      include "./baihoc/update_baihoc.php";
      break;
    case 'update_baihoc':
      if (isset($_POST['capnhatpr']) && $_POST['capnhatpr']) {
        $ID = $_POST['ID'];
        $ID_course = $_POST['ID_course'];
        $lesson = $_POST['lesson'];
        $lesson_order = $_POST['lesson_order'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "assets/upload/";
        if (!empty($image)) {
          $target_file = $target_dir . basename($image);
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          } else {
          }
        } else {
          $current_data = loadOne_baihoc($ID);
          $image = $current_data['image'];
        }

        update_baihoc($ID, $ID_course, $lesson, $lesson_order, $description, $image);
        $thongbao = "Cập nhật thành công";
      }
      $listbaihoc = loadAll_baihoc();
      include "./baihoc/list_baihoc.php";
      break;
      //account
    case 'list_account':
      $listaccount = loadAll_account();
      include "./account/list_account.php";
      break;
    case 'delete_account':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_account($_GET['ID']);
      }
      $listaccount = loadAll_account("", 0);
      include "./account/list_account.php";
      break;
    case 'add_account':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $avatar = $_FILES['avatar']['name'];
        $target_dir = "assets/upload/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        $experience = $_POST['experience'];
        $role = $_POST['role'];
        insert_account($username, $email, $password, $avatar, $experience, $role);
        $thongbao = "Thêm thành công";
      }
      include "./account/add_account.php";
      break;
    case 'logout':
      session_unset();
      header('Location:login_admin.php');
      break;
    case 'edit_account':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $account = loadOne_account($_GET['ID']);
      }
      $listngonngu = loadAll_ngonngu();
      include "./account/update_account.php";
      break;
    case 'update_account':
      if (isset($_POST['update_account_one']) && $_POST['update_account_one']) {

        $ID = $_POST['ID'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $avatar = $_FILES['avatar']['name'];
        $target_dir = "assets/upload/";

        if (!empty($avatar)) {
          $target_file = $target_dir . basename($avatar);
          if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
          } else {
          }
        } else {
          $current_data = loadOne_account($ID);
          $avatar = $current_data['avatar'];
        }
        $experience = $_POST['experience'];
        $role = $_POST['role'];
        update_account($ID, $username, $email, $password, $avatar, $experience, $role);
        $thongbao = "Cập nhật thành công";
      }
      $listaccount = loadAll_account();
      include "./account/list_account.php";
      break;

      //nguphap
    case 'list_nguphap':
      //lấy danh sách
      $listnguphap = loadAll_nguphap();
      include 'nguphap/list_nguphap.php';
      break;
    case 'delete_nguphap':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_nguphap($_GET['ID']);
      }
      $listnguphap = loadAll_nguphap();
      include './nguphap/list_nguphap.php';
      break;
    case 'edit_nguphap':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $nguphap = loadOne_nguphap($_GET['ID']);
      }
      $listngonngu = loadAll_ngonngu();
      include "./nguphap/update_nguphap.php";
      break;
    case 'update_nguphap':
      if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $ID = $_POST['ID'];
        $ID_language = $_POST['ID_language'];
        $name = $_POST['name'];
        $grammar = $_POST['grammar'];
        update_nguphap($ID, $ID_language, $name, $grammar);
        $thongbao = "Cập nhật thành công";
      }
      $listnguphap = loadAll_nguphap();
      include 'nguphap/list_nguphap.php';
      break;
    case 'add_nguphap':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $ID_language = $_POST['ID_language'];
        $name = $_POST['name'];
        $grammar = $_POST['grammar'];
        insert_nguphap($ID_language, $name, $grammar);
        $thongbao = "Thêm thành công";
      }
      $listngonngu = loadAll_ngonngu();
      include "./nguphap/add_nguphap.php";
      break;
    case 'list_vocabulary':
      $listtuvung = loadAll_tuvung();
      include './vocabulary/list_vocabulary.php';
      break;

    case 'add_vocabulary':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $ID_lesson = $_POST['ID_lesson'];
        $vocabulary = $_POST['vocabulary'];
        $desc = $_POST['description'];
        $meaning = $_POST['meaning'];
        $example = $_POST['example'];

        // Xử lý hình ảnh
        $image = $_FILES['image']['name'];
        $target_dir = "assets/upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if ($_FILES["image"]["error"] == 0) {
          if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Lỗi khi tải lên hình ảnh.";
          }
        } else {
          echo "Không có tệp hình ảnh hoặc có lỗi khi tải lên hình ảnh.";
        }

        // Xử lý tệp âm thanh
        $file_name_sound = $_FILES['sound']['name'];
        $file_tmp_name = $_FILES['sound']['tmp_name'];
        $target_file_sound = $target_dir . basename($file_name_sound);
        $file_type = strtolower(pathinfo($target_file_sound, PATHINFO_EXTENSION));

        if ($file_type !== 'mp3' && $file_type !== 'mp4') {
          echo "Chỉ chấp nhận file MP3 hoặc MP4.";
        } else {
          if ($_FILES["sound"]["error"] == 0) {
            if (!move_uploaded_file($file_tmp_name, $target_file_sound)) {
              echo "Rất tiếc, đã xảy ra lỗi khi tải lên file âm thanh.";
            }
          } else {
            echo "Không có tệp âm thanh hoặc có lỗi khi tải lên tệp âm thanh.";
          }
        }

        // Nếu không có lỗi trong việc tải lên, tiếp tục chèn từ khóa vào CSDL
        insert_tuvung($ID_lesson, $vocabulary, $file_name_sound, $image, $desc, $meaning, $example);
        $thongbao = "Thêm thành công";
      }
      $listlessons = loadAll_lessons();
      include './vocabulary/add_vocabulary.php';
      break;

    case 'delete_vocabulary':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_tuvung($_GET['ID']);
      }
      $listtuvung = loadAll_tuvung();
      include './vocabulary/list_vocabulary.php';
      break;
    case 'edit_vocabulary':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $tuvung = loadOne_tuvung($_GET['ID']);
      }
      $listlessons = loadAll_lessons();
      include "./vocabulary/update_vocabulary.php";
      break;
    case 'update_vocabulary':
      if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $ID = $_POST['ID'];
        $ID_lesson = $_POST['ID_lesson'];
        $vocabulary = $_POST['vocabulary'];
        $desc = $_POST['description'];
        $meaning = $_POST['meaning'];
        $example = $_POST['example'];

        // Xử lý hình ảnh
        $image = $_FILES['image']['name'];
        $target_dir = "assets/upload/";
        if (!empty($image)) {
          $target_file = $target_dir . basename($image);
          if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Rất tiếc, đã xảy ra lỗi khi tải lên hình ảnh.";
          }
        } else {
          // Nếu không có hình ảnh mới, giữ lại hình ảnh cũ
          $current_data = loadOne_tuvung($ID);
          $image = $current_data['image'];
        }

        // Xử lý âm thanh
        $file_name_sound = $_FILES['sound']['name'];
        if (!empty($file_name_sound)) {
          $file_tmp_name = $_FILES['sound']['tmp_name'];
          $target_file_sound = $target_dir . basename($file_name_sound);
          $file_type = strtolower(pathinfo($target_file_sound, PATHINFO_EXTENSION));

          // Kiểm tra loại file
          if ($file_type !== 'mp3' && $file_type !== 'mp4') {
            echo "Chỉ chấp nhận file MP3 hoặc MP4.";
          } else {
            if ($_FILES["sound"]["error"] == 0) {
              if (!move_uploaded_file($file_tmp_name, $target_file_sound)) {
                echo "Rất tiếc, đã xảy ra lỗi khi tải lên file âm thanh.";
              }
            } else {
              echo "Có lỗi xảy ra khi tải lên âm thanh.";
            }
          }
        } else {
          // Nếu không có âm thanh mới, giữ lại âm thanh cũ
          $current_data = loadOne_tuvung($ID);
          $file_name_sound = $current_data['sound'];
        }
        // Cập nhật từ khóa
        update_tuvung($ID, $ID_lesson, $vocabulary, $file_name_sound, $image, $desc, $meaning, $example);
        $thongbao = "Cập nhật thành công";
      }
      $listtuvung = loadAll_tuvung();
      $listlessons = loadAll_lessons();
      include './vocabulary/list_vocabulary.php';
      break;

    case 'list_answer_question':
      $listanswers = loadAll_answers();
       $listcauhoi = loadAll_cauhoi();
      include './answer_question/list_answer_question.php';
      break;

    case 'add_answer_question': 
      include './answer_question/add_answer_question.php';
      break;
    case 'delete_answer_question':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_answer($_GET['ID']);
      }
      $listanswers = loadAll_answers();
      include './answer_question/list_answer_question.php';
      break;
    case 'update_answer_question':
      include './answer_question/update_answer_question.php';
      break;
    case 'list_ngonngu':
      $listngonngu = loadAll_ngonngu();
      
      include './ngonngu/list_ngonngu.php';
      break;

    case 'add_ngonngu':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $language = $_POST['language'];
        $symbol = $_POST['symbol'];
        $flag = $_POST['flag'];

        insert_ngonngu($language, $symbol, $flag);
        $thongbao = "Thêm thành công";
      }
      include './ngonngu/add_ngonngu.php';
      break;
    case 'delete_ngonngu':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_ngonngu($_GET['ID']);
      }
      $listngonngu = loadAll_ngonngu();
      include './ngonngu/list_ngonngu.php';
      break;
    case 'edit_ngonngu':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $ngonngu = loadOne_ngonngu($_GET['ID']);
      }
      include "./ngonngu/update_ngonngu.php";
      break;
    case 'update_ngonngu':
      if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $ID = $_POST['ID'];
        $language = $_POST['language'];
        $symbol = $_POST['symbol'];
        $flag = $_POST['flag'];

        update_ngonngu($ID, $language, $symbol, $flag);
        $thongbao = "Cập nhật thành công";
      }
      $listngonngu = loadAll_ngonngu();
      include './ngonngu/list_ngonngu.php';
      break;
    case 'list_cauhoi':
      $listcauhoi = loadAll_cauhoi();
      include './cauhoi/list_cauhoi.php';
      break;
    case 'add_cauhoi':
      if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $question = $_POST['question'];
        $type = $_POST['type'];
        $ID_vocabulary = $_POST['ID_vocabulary'];

        insert_cauhoi($question, $type, $ID_vocabulary);
        $thongbao = "Thêm thành công";
      }
      $listtuvung = loadAll_tuvung();
      include './cauhoi/add_cauhoi.php';
      break;
    case 'delete_cauhoi':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        delete_cauhoi($_GET['ID']);
      }
      $listcauhoi = loadAll_cauhoi();
      include './cauhoi/list_cauhoi.php';
      break;
    case 'edit_cauhoi':
      if (isset($_GET['ID']) && $_GET['ID'] > 0) {
        $cauhoi = loadOne_cauhoi($_GET['ID']);
      }
      $listtuvung = loadAll_tuvung();
      include "./cauhoi/update_cauhoi.php";
      break;
    case 'update_cauhoi':
      if (isset($_POST['capnhat']) && $_POST['capnhat']) {
        $ID = $_POST['ID'];
        $question = $_POST['question'];
        $type = $_POST['type'];
        $ID_vocabulary = $_POST['ID_vocabulary'];

        update_cauhoi($ID, $question, $type, $ID_vocabulary);
        $thongbao = "Cập nhật thành công";
      }
      $listcauhoi = loadAll_cauhoi();
      include './cauhoi/list_cauhoi.php';
      break;
    case 'home':
      $countKhoahoc = count_courses();
      $countUser = count_users();
      $countTuVung = count_tuvung();
      include './home.php';
      break;
    default:
      $countKhoahoc = count_courses();
      $countUser = count_users();
      $countTuVung = count_tuvung();
      include './home.php';
      break;
  }
}

include 'footer.php';
ob_end_flush();