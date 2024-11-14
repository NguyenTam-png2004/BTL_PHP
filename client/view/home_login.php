<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="client/assets/css/complete_lesson.css">
    <title>Home page</title>
</head>
<body>
    <div class = "viewport_container">
        <div class = "viewport_content">
            <div class="header_home_login">
                <h1>Complete <?php echo $language->language?></h1>
                <div class="course_current">
                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 0.5C1.60218 0.5 1.22064 0.658035 0.93934 0.93934C0.658035 1.22064 0.5 1.60218 0.5 2C0.5 2.39782 0.658035 2.77936 0.93934 3.06066C1.22064 3.34196 1.60218 3.5 2 3.5C2.39782 3.5 2.77936 3.34196 3.06066 3.06066C3.34196 2.77936 3.5 2.39782 3.5 2C3.5 1.60218 3.34196 1.22064 3.06066 0.93934C2.77936 0.658035 2.39782 0.5 2 0.5ZM7 1C6.86749 0.998126 6.73593 1.02261 6.61296 1.07202C6.48999 1.12143 6.37807 1.1948 6.2837 1.28784C6.18933 1.38088 6.11439 1.49176 6.06324 1.61401C6.0121 1.73627 5.98576 1.86747 5.98576 2C5.98576 2.13253 6.0121 2.26373 6.06324 2.38599C6.11439 2.50824 6.18933 2.61912 6.2837 2.71216C6.37807 2.8052 6.48999 2.87857 6.61296 2.92798C6.73593 2.97739 6.86749 3.00187 7 3H20C20.1325 3.00187 20.2641 2.97739 20.387 2.92798C20.51 2.87857 20.6219 2.8052 20.7163 2.71216C20.8107 2.61912 20.8856 2.50824 20.9368 2.38599C20.9879 2.26373 21.0142 2.13253 21.0142 2C21.0142 1.86747 20.9879 1.73627 20.9368 1.61401C20.8856 1.49176 20.8107 1.38088 20.7163 1.28784C20.6219 1.1948 20.51 1.12143 20.387 1.07202C20.2641 1.02261 20.1325 0.998126 20 1H7ZM2 6.5C1.60218 6.5 1.22064 6.65804 0.93934 6.93934C0.658035 7.22064 0.5 7.60218 0.5 8C0.5 8.39782 0.658035 8.77936 0.93934 9.06066C1.22064 9.34196 1.60218 9.5 2 9.5C2.39782 9.5 2.77936 9.34196 3.06066 9.06066C3.34196 8.77936 3.5 8.39782 3.5 8C3.5 7.60218 3.34196 7.22064 3.06066 6.93934C2.77936 6.65804 2.39782 6.5 2 6.5ZM7 7C6.86749 6.99813 6.73593 7.02261 6.61296 7.07202C6.48999 7.12143 6.37807 7.1948 6.2837 7.28784C6.18933 7.38088 6.11439 7.49176 6.06324 7.61401C6.0121 7.73627 5.98576 7.86748 5.98576 8C5.98576 8.13252 6.0121 8.26373 6.06324 8.38599C6.11439 8.50824 6.18933 8.61912 6.2837 8.71216C6.37807 8.8052 6.48999 8.87857 6.61296 8.92798C6.73593 8.97739 6.86749 9.00187 7 9H20C20.1325 9.00187 20.2641 8.97739 20.387 8.92798C20.51 8.87857 20.6219 8.8052 20.7163 8.71216C20.8107 8.61912 20.8856 8.50824 20.9368 8.38599C20.9879 8.26373 21.0142 8.13252 21.0142 8C21.0142 7.86748 20.9879 7.73627 20.9368 7.61401C20.8856 7.49176 20.8107 7.38088 20.7163 7.28784C20.6219 7.1948 20.51 7.12143 20.387 7.07202C20.2641 7.02261 20.1325 6.99813 20 7H7ZM2 12.5C1.60218 12.5 1.22064 12.658 0.93934 12.9393C0.658035 13.2206 0.5 13.6022 0.5 14C0.5 14.3978 0.658035 14.7794 0.93934 15.0607C1.22064 15.342 1.60218 15.5 2 15.5C2.39782 15.5 2.77936 15.342 3.06066 15.0607C3.34196 14.7794 3.5 14.3978 3.5 14C3.5 13.6022 3.34196 13.2206 3.06066 12.9393C2.77936 12.658 2.39782 12.5 2 12.5ZM7 13C6.86749 12.9981 6.73593 13.0226 6.61296 13.072C6.48999 13.1214 6.37807 13.1948 6.2837 13.2878C6.18933 13.3809 6.11439 13.4918 6.06324 13.614C6.0121 13.7363 5.98576 13.8675 5.98576 14C5.98576 14.1325 6.0121 14.2637 6.06324 14.386C6.11439 14.5082 6.18933 14.6191 6.2837 14.7122C6.37807 14.8052 6.48999 14.8786 6.61296 14.928C6.73593 14.9774 6.86749 15.0019 7 15H20C20.1325 15.0019 20.2641 14.9774 20.387 14.928C20.51 14.8786 20.6219 14.8052 20.7163 14.7122C20.8107 14.6191 20.8856 14.5082 20.9368 14.386C20.9879 14.2637 21.0142 14.1325 21.0142 14C21.0142 13.8675 20.9879 13.7363 20.9368 13.614C20.8856 13.4918 20.8107 13.3809 20.7163 13.2878C20.6219 13.1948 20.51 13.1214 20.387 13.072C20.2641 13.0226 20.1325 12.9981 20 13H7Z" fill="#1E2D40"></path>
                    </svg>
                    <p><b><?php echo $courseCurrent->course; ?></b></p>
                    <div class = "list_courses">
                        <ul>
                            <?php
                            foreach($courses as $course){
                                echo "<a href = 'index.php?controller=Home&action=HomeLogin&course=$course->ID'><li><p>".$course->course."</p></li></a>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="position:relative">
                    <div class = "rank_current" id='rank_current'>
                        <p>Xin chào! <?php echo $user?></p>
                    </div>
                </div>
            <div class="body_home_login">
                <section class = "course">
                    <p class = "name_course"><b><?php echo $courseCurrent->course; ?></b></p>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            <span data-value="<?php echo $progressCourse; ?>"><?php echo $progressCourse; ?>%</span>
                        </div>
                    </div>
                    <!--  BÀI HỌC ĐÃ HOÀN THÀNH -->
                <?php foreach ($lessons["LessonLearned"] as $lesson){
                    echo "<a href = 'index.php?controller=Study&action=Study&type=StudyAgain&course=$courseCurrent->ID
                    &lesson=$lesson->ID&order=$lesson->lesson_order&vocab=0'>
                        <div class = 'content_course complete'>
                        <div class = 'circle circle_complete'>
                            <img src='assets/image_hocngoaingu/$lesson->image'>
                            <div class='checkmark'><img src='assets/image_hocngoaingu/check.svg'></div>
                        </div>
                        <div class = 'lesson'>
                            <p><b>$lesson->lesson</b></p>
                            <p>$lesson->description</p>
                        </div>
                    </div></a>"; 
                      }?>
                    <!--  BÀI HỌC HIỆN TẠI -->
                    <?php foreach ($lessons["LessonLearning"] as $lesson){
                    echo "<a href = 'index.php?controller=Study&action=Study&type=Study&course=$courseCurrent->ID&lesson=$lesson->ID&order=$lesson->lesson_order&vocab=0'>
                        <div class = 'content_course current '>
                        <div class = 'circle circle_current'>
                            <img src='assets/image_hocngoaingu/$lesson->image'>
                        </div>
                        <div class = 'lesson'>
                            <p><b> $lesson->lesson</b></p>
                            <p> $lesson->description</p>
                        </div>
                    </div></a>"; } ?>
                    <!--  BÀI HỌC CHƯA HỌC -->

                    <?php foreach ($lessons["LessonNext"] as $lesson){
                    echo "<a>
                        <div class = 'content_course unfinished'>
                        <div class = 'circle circle_unfinished'>
                            <img src='assets/image_hocngoaingu/$lesson->image'>
                            <div class = 'icon_unfinished'><img src = 'assets/image_hocngoaingu/icon_lock.svg'></div>
                        </div>
                        <div class = 'lesson'>
                            <p><b>$lesson->lesson</b></p>
                            <p>$lesson->description</p>
                        </div>
                    </div></a>";
                    }; ?>
                </section>
            </div>
        </div>
    </div>
</body>
<script>
    window.addEventListener('scroll', function() {
    const rank_current = document.getElementById('rank_current');
    if (window.scrollY > 130) {
        rank_current.classList.add('shrink');
    } else {
        rank_current.classList.remove('shrink');
    }
});
</script>
</html>