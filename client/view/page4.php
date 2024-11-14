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
        <div class="title">Điền từ nghe được</div>
        <form id="studyForm" method="POST" action="">
            <div class="sentence">
                <audio controls><source src="assets/image_hocngoaingu/<?php echo $vocabulary->sound?>"></audio><br><br><br>      
                <input type="hidden" id="ques" name="ques" value="<?php echo $ques?>">
                <?php print_r($_SESSION['listID'])?>
                <input type="hidden" id="ID_vocab" name="ID_vocab" value="<?php echo $vocabulary->ID?>">
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

        fetch(`index.php?controller=Study&action=CheckVocab`,{
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
