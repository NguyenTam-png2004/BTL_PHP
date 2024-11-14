<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="client/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container" style="margin-top: 80px;">
        <!-- Profile Header -->
        <section class="profile-header">
            <div class="avatar">
                <img src="<?php echo $user->avatar;?>" alt="Avatar">
            </div>
            <div class="profile-info">
                <h1><?php echo $user->username;?></h1>
            </div>
        </section>

        <!-- Learning Progress Section -->
        <section class="progress-section">
            <h2>Tiến độ học</h2>
            <div class="progress-bar1">
                <div class="circle-chart1">
                    <span><?php echo $Progress; ?> %</span>
                </div>
                <div class="progress-bar-english">
                    <p>Hiện tại</p>
                    <img src="assets/image_hocngoaingu/<?php echo $languageCurrent->flag?>">
                    <p><?php echo $languageCurrent->language; ?></p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section" style="display: flex;align-items: center; ">
            <div class="stat-box">
                <i class="fas fa-language"></i>
                <p>Hạng hiện tại: <strong><?php echo $rank; ?></strong></p>
            </div>
        </section>
        <section class="stats-section">
            <div class="stat-box">
                <i class="fas fa-language"></i>
                <p><strong><?php echo $totalLanguage; ?></strong> Ngôn ngữ đã học</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-book"></i>
                <p><strong><?php echo $totalVocabulary; ?></strong> Từ đã học</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-star"></i>
                <p><strong><?php echo $user->experience; ?></strong> Kinh nghiệm</p>
            </div>
        </section>
    </div>
</body>
</html>