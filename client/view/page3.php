<head>
    <link rel="stylesheet" href="client/assets/css/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        .quiz-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
            text-align: left;
        }

        .quiz-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .quiz-question {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .instruction {
            font-size: 16px;
            margin-bottom: 15px;
            color: #9baacf;
        }

        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .hidden-radio {
        display: none;
        }

        .option {
            padding: 15px;
            font-size: 18px;
            border: 2px solid #40405c;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            display: inline-block;
        }

        .option:hover {
            background-color: #116EEE;
            border-color: #116EEE;
            color: white;
        }

        input:checked + label {
            background-color: #116EEE;
            border-color: #116EEE;
            color: white;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h2 class="quiz-title">Câu hỏi số: <?php echo $ques?></h2>
        <p class="quiz-question"> <?php echo $question->question?></p>
        <p class="instruction">Chọn đáp án đúng</p>
        <?php print_r($_SESSION['strong']); ?>
        <?php print_r($_SESSION['weak']); ?>
        <form action="" method="POST" id="studyForm" >
        <input type="hidden" id="question_id" name="question_id" value="<?php echo $question->ID?>">
        <input type="hidden" id="ques" name="ques" value="<?php echo $ques?>">
        <input type="hidden" id="vocab" name="vocab" value="<?php echo $question->ID_vocabulary?>">
            <div class="options">
                <?php
                foreach($answer as $a){
                    echo "
                    <input type='radio' class='hidden-radio' name='user_answer' value='$a->answer' id='$a->ID'>
                    <label for='$a->ID' class='option' required>$a->answer</label>";                
                }
                ?>
            </div>
            <button class="continue-button" type="submit">Submit</button>
        </form>
    </div>
</body>
<script>
    const form = document.getElementById("studyForm");
        form.addEventListener('submit', function(e){
        e.preventDefault();
        const formData = new FormData(form);

        fetch(`index.php?controller=Study&action=CheckAnswers`,{
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data)
            const newMessage = document.createElement('div');
            // Hiển thị phản hồi từ PHP lên trang
            newMessage.innerHTML = data; // Gán nội dung từ phản hồi vào phần tử mới

            // Thêm phần tử mới vào cuối body
            document.body.appendChild(newMessage);
        })
        .catch(error => alert("Error"));
    })
</script>
