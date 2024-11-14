<head>
    <link rel="stylesheet" href="client/assets/css/style.css">
    <style>
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .sentence {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        .input-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .input-container input {
            padding: 8px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 120px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="title">Complete the sentence.</div>
        <h3 class="quiz-title" style="text-align:left">Câu hỏi số: <?php echo $ques?></h3>
        <div class="image-container">
            <img src="assets/image_hocngoaingu/<?php echo $imageVocab?>" alt="Placeholder Image">
        </div>
        <form id="studyForm" method="POST" action="">
            <div class="sentence">
                <?php echo $question->question?> <br><br>
                <input type="hidden" id="question_id" name="question_id" value="<?php echo $question->ID?>">
                <input type="hidden" id="ques" name="ques" value="<?php echo $ques?>">
                <input type="hidden" id="vocab" name="vocab" value="<?php echo $question->ID_vocabulary?>">
                <input type="text" placeholder="..." id="user_answer" name = "user_answer" required>
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
