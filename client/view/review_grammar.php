<head>
    <link rel="stylesheet" href="client/assets/css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container_grammar {
            max-width: 1200px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-top: 20px;
        }
        .content h1 {
            font-size: 24px;
            color: #333
        }
        .content h2 {
            font-size: 18px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .content h3 {
            font-size: 18px;
            color: #333;
            text-align:center;
        }
        .content p span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="review_vocal">
        <div class="categories style_input">
            <input type="radio" name="categories" id="option1" checked>
            <label for="option1">Grammar</label>
            <input type="radio" name="categories" id="option2" style="margin-left: 20px">
            <label for="option2"><a href="index.php?controller=Home&action=ReviewVocabulary&status=weak">Vocabulary</a></label>
        </div>
        <div class="container_review_vocabulary">
            <h5>Your Grammar</h5>
            <div class="word_container grammar_container" id="grammarContainer">
            <?php foreach ($grammars as $grammar){
                echo"<a href = 'index.php?controller=Home&action=ViewGrammar&grammar=$grammar->ID'><div>
                    <b>$grammar->name </b>
                    <p>$grammar->description</p>
                </div></a>";
            }
            ?>
            </div>
        </div>
    </div>
</body>