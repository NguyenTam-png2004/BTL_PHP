<head>
    <link rel="stylesheet" href="client/assets/css/style.css">
</head>
<body>
    <div class="card">
        <h2 class="title">Look, something new!</h2>
        <div class="image-container">
            <img src="assets/image_hocngoaingu/<?php echo $vocabulary->image?>" alt="Vocabulary image">
        </div>
        <div class="content">
        <div class="vocab-container">
            <h1 class="vocab-word"><?php echo $vocabulary->vocabulary?></h1>
            <audio controls><source src="assets/image_hocngoaingu/<?php echo $vocabulary->sound?>"></audio>        
        </div>
        <?php print_r($_SESSION['listID']);?>
            <p class="definition"><?php echo $vocabulary->description?></p>
            <p class="example"><?php echo $vocabulary->example;?></p>
        </div>
        <button class="continue-button"><a href='<?php echo 'index.php?controller=Study&action=Study&' . $type . '=' . $stt; ?>'>
            Continue</a></button>
    </div>
</body>
</html>
