<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client/assets/css/complete_lesson.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <title>Header</title>
</head>
<body>
    <div class = "header">
        <div class = "header_left">
            <a href="index.php?controller=Home&action=HomeLogin"><div class = "inline">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path fill="#116EEE" d="M21.25 4h-.75v-.75a.75.75 0 00-.75-.75H15c-1.2275 0-2.3155.5955-3 1.5095C11.3155 3.0955 10.2275 2.5 9 2.5H4.25a.75.75 0 00-.75.75V4h-.75c-.414 0-.75.336-.75.75v15.5c0 .414.336.75.75.75h18.5c.414 0 .75-.336.75-.75V4.75c0-.414-.336-.75-.75-.75zM5 4h4c1.2405 0 2.25 1.0095 2.25 2.25v11A.75.75 0 0012 18a.75.75 0 00.75-.75v-11C12.75 5.0095 13.7595 4 15 4h4v14h-4c-1.213 0-2.308.588-3 1.516C11.308 18.588 10.213 18 9 18H5V4z"></path>
            </svg>
                <p>Learn</p>
            </div></a>
            <a href="index.php?controller=Home&action=ReviewGrammar&status=weak"><div class = "inline">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="#116EEE" d="M19.25 2C18.0075 2 17 3.0075 17 4.25v15.5c0 1.2425 1.0075 2.25 2.25 2.25s2.25-1.0075 2.25-2.25V4.25C21.5 3.0075 20.4925 2 19.25 2zm-10.5.5a.75.75 0 00-.2903 1.446A.75.75 0 008.75 4h1.5898L2.252 11.1895a.7492.7492 0 00-.2641.5194.7502.7502 0 001.007.7575.7499.7499 0 00.2532-.1559L11.5 4.9755V6.75a.7513.7513 0 00.2159.5372A.7501.7501 0 0013 6.75v-3.5a.7498.7498 0 00-.75-.75h-3.5zm3.25 7c-1.2425 0-2.25 1.0075-2.25 2.25v8C9.75 20.9925 10.7575 22 12 22s2.25-1.0075 2.25-2.25v-8c0-1.2425-1.0075-2.25-2.25-2.25zM4.75 14c-1.2425 0-2.25 1.0075-2.25 2.25v3.5C2.5 20.9925 3.5075 22 4.75 22S7 20.9925 7 19.75v-3.5C7 15.0075 5.9925 14 4.75 14z">
            </path></svg>
                <p>Review</p>
            </div></a>
        </div>
        <div class = "header_right">
            <div class = "bxh_wrapper wrapper">
                <img src="assets/image_hocngoaingu/bxh.png" class = "">
                <div class="container_BXH responsive-text menu">
                    <div class = "league_header">
                        <p style = "font-size: 25px"><b>TOP 10</b></p>
                    </div>
                    <div>
                        <div class ="bxh top_10">
                            <?php 
                                $stt=1;
                                foreach ($BXH as $B){
                                    echo"<div class='account'>
                                    <div class='stt_top10'>$stt</div>
                                    <div class ='avatar'>
                                        <img src='$B->avatar'>
                                    </div>
                                    <div class='name_account'>
                                        <p> $B->username </p>
                                    </div>
                                    <div class='star_bxh'>
                                        <p>$B->experience</p>
                                        <i class='fa-solid fa-star fa-l' style='color: #FFD43B;'></i>
                                    </div>
                                    </div>";
                                    $stt++;
                                }
                            ?>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="language_wrapper wrapper">
                <img src = "assets/image_hocngoaingu/<?php echo $LanguageCurrent->flag; ?>">
                <ul class = 'menu_language menu'>
                <p style = 'font-size: 25px;padding: 20px;'><b>You're learning</b></p>
                <li><img src="assets/image_hocngoaingu/<?php echo $LanguageCurrent->flag; ?>" alt="flag"><?php echo $LanguageCurrent->language; ?></li>
                <p style = "font-size: 25px;padding: 20px;"><b>Learn another language</b></p>
                <?php //truyền dữ liệu ở đây
                    foreach ($languages as $language){
                        echo "<a href='index.php?controller=Home&action=HomeLogin&language=$language->ID'>
                        <li><img src='assets/image_hocngoaingu/".$language->flag."'> ".$language->language."</li></a>";
                    }
                ?>
                </ul>
            </div>
            <div class="avatar_wrapper wrapper">
                <img src="<?php echo $user->avatar?>">
                <ul class = "menu_avatar menu">
                    <a href="index.php?controller=Profile&action=ViewProfile"><li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path fill="inherit" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 4.5c1.3805 0 2.5 1.1195 2.5 2.5s-1.1195 2.5-2.5 2.5S9.5 10.3805 9.5 9s1.1195-2.5 2.5-2.5zm4.5 8.269c0 1.4295-1.8235 2.731-4.5 2.731s-4.5-1.3015-4.5-2.731v-.338c0-.514.417-.931.931-.931h7.138c.514 0 .931.417.931.931v.338z"></path></svg> 
                    My profile</li></a>
                    <a href="index.php?controller=Profile&action=ViewSetting"><li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path fill="inherit" d="M19.5695 13.1409A1.3987 1.3987 0 0119 12.0169c0-.4425.213-.8625.569-1.1235l1.647-1.2075a.7514.7514 0 00.2685-.842c-.424-1.274-1.0945-2.436-1.9935-3.4545a.7516.7516 0 00-.864-.19l-1.8545.8155a1.3977 1.3977 0 01-1.258-.069c-.383-.221-.64-.615-.6885-1.0545l-.223-2.036a.751.751 0 00-.5955-.6535c-1.2985-.2655-2.663-.27-3.9845-.005a.7493.7493 0 00-.598.654l-.221 2.023c-.0485.44-.3055.834-.6895 1.055-.383.221-.852.2475-1.2575.069l-1.8645-.82c-.296-.131-.646-.055-.8625.1885-.902 1.0145-1.5755 2.175-2.004 3.448a.7505.7505 0 00.2675.844l1.6365 1.2c.357.262.57.682.57 1.1245s-.213.8625-.569 1.1235l-1.647 1.2075a.7514.7514 0 00-.2685.842c.424 1.274 1.0945 2.436 1.9935 3.4545.2165.2445.5665.322.864.19l1.8545-.8155c.404-.178.874-.1525 1.258.069.383.221.64.615.6885 1.0545l.223 2.036a.751.751 0 00.5955.6535c.657.134 1.332.202 2.0075.202.659 0 1.324-.0665 1.9765-.1975a.7493.7493 0 00.598-.654l.2215-2.023c.0485-.44.3055-.834.6895-1.055a1.401 1.401 0 011.2575-.069l1.8645.82a.7485.7485 0 00.8625-.1885c.902-1.0145 1.5755-2.175 2.004-3.448a.7505.7505 0 00-.2675-.844l-1.637-1.2zM12 15.4999c-1.933 0-3.5-1.567-3.5-3.5s1.567-3.5 3.5-3.5 3.5 1.567 3.5 3.5-1.567 3.5-3.5 3.5z"></path></svg>
                    Setting</li></a>
                    <a href="index.php?controller=SignUser&action=Logout"><li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path fill="inherit" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-.75 3.2065c0-.4145.3355-.75.75-.75s.75.3355.75.75V11.75c0 .4145-.3355.75-.75.75a.7496.7496 0 01-.75-.75V5.2065zM12 19c-3.86 0-7-3.14-7-7 0-2.461 1.256-4.697 3.3595-5.98a.7496.7496 0 011.031.25.75.75 0 01-.25 1.031C7.487 8.3095 6.5 10.066 6.5 12c0 3.0325 2.4675 5.5 5.5 5.5s5.5-2.4675 5.5-5.5c0-1.934-.987-3.6905-2.6405-4.699a.7505.7505 0 01-.25-1.031c.2155-.354.677-.4655 1.031-.25C17.744 7.303 19 9.539 19 12c0 3.86-3.14 7-7 7z"></path></svg> 
                    Logout</li></a>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
