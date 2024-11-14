<head>
    <link rel="stylesheet" href="client/assets/css/complete_lesson.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
</head>
<body>
    <div class = "complete_1 container_complete_lesson">
        <div class = " icon_language">
            <img src="assets/image_hocngoaingu/<?php echo $symbol?>">
            <p><b>Lesson complete!</b></p>
        </div>
        <div>
            <div class = "box exp_container">
                <div class = "exp_container_left">
                    <p>Experience</p>
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class = "exp_container_right">
                    <p> + 1 </p>
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                </div>
            </div>
            <div class = "box score_container">
                <p>progress</p>
                <div class = "Score">
                    <p><?php echo $percent?> % </p>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><path d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z"/></svg>
                </div>
            </div>
        </div>
    </div>
    <div class = "buttons_complete_lession responsive-button">
        <a class ="next" type="button" href="index.php?controller=Study&action=ViewFinished2"> Next</a>
    </div>     
</body>