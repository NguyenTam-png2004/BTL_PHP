<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/logo.png" />
    <script src="https://kit.fontawesome.com/cd29af7a45.js" crossorigin="anonymous"></script>
    <title>Admin</title>

</head>
<?php
if (!isset($_SESSION)) {
  session_start();
}
// extract($_SESSION['username']);
?>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <!-- <a class="navbar-brand brand-logo" href="index.php"><img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="logo" /></a> 
      <a class="navbar-brand brand-logo-mini" href="index.php"><img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">

                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="image">
                            <!-- <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" alt=""> -->
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <!-- <p class="mb-1 text-black"><?php echo $username ?></p> -->
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="../index.php?controller=SignUser&action=Logout">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper body1">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="profile">
                            <!-- <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" alt="profile"> -->
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">Admin</span>

                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=home">
                        <span class="menu-title">Thống kê</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_khoahoc">
                        <span class="menu-title">Quản lý khóa học</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_baihoc">
                        <span class="menu-title">Quản lý bài học</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_account">
                        <span class="menu-title">Quản lý người dùng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_nguphap">
                        <span class="menu-title">Review ngữ pháp</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_vocabulary">
                        <span class="menu-title">Quản lý từ vựng</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_answer_question">
                        <span class="menu-title">Answer_Question</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_ngonngu">
                        <span class="menu-title">Quản lý Ngôn ngữ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=list_cauhoi">
                        <span class="menu-title">Quản lý câu hỏi</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <a class="nav-link text-black font-weight-bold" href="../index.php">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Admin
                        </a>
                    </h3>
                </div>