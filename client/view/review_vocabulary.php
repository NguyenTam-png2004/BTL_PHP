<head>
    <link rel="stylesheet" href="client/assets/css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Review Vocabulary</title>
</head>
<body>
    <div class="review_vocal">
        <div class="categories style_input">
            <input type="radio" name="categories" id="option1">
            <label for="option1"><a href="index.php?controller=Home&action=ReviewGrammar">Grammar</a></label>
            <input type="radio" name="categories" id="option2" style="margin-left: 20px" checked>
            <label for="option2"><a>Vocabulary</a></label>
        </div>

        <div class="container_review_vocabulary">
            <h5>Your vocabulary</h5>
            <div class="bar-container">
                <div class="container">
                    <div class="bar weak_container" id="weak-container">
                        <div class="bar weak" id="weak-bar"></div>
                        <span id="weak-count" data-value="<?php echo $percentWeak?>"><?php echo $weak?></span>
                    </div>
                    <p>Weak words</p>
                </div>
                <div class="container">
                    <div class="bar strong_container" id="strong-container">
                        <div class="bar strong" id="strong-bar"></div>
                        <span id="strong-count" data-value="<?php echo $percentStrong?>"><?php echo $strong?></span>
                    </div>
                    <p>Strong words</p>
                </div>
            </div>

            <div class="vocal_filter">
                <p>Filter by</p>
                <select id="statusFilter">
                    <option value="weak">Weak vocabulary</option>
                    <option value="strong">Strong vocabulary</option>
                </select>
                <a style="height:40px" type="button" id="reviewLink" href="index.php?controller=Study&action=Review&ques=0&status=<?php echo $_GET['status']?>">Review now</a>
            </div><br>

            <div class="word_container" id="wordContainer">
            </div>
        </div>
    </div>

    <script>
        var statusFilter = document.getElementById("statusFilter");
        var reviewLink = document.getElementById("reviewLink");

        statusFilter.addEventListener("change", function() {
            const status = statusFilter.value;
            reviewLink.href = "index.php?controller=Study&action=Review&ques=0&status=" + status;
            fetchVocabulary(status);
        });
        function fetchVocabulary(status) {
            fetch(`index.php?controller=Home&action=FilterVocab&status=${status}`)
                .then(response => response.json())
                .then(data => {
                    const vocabContainer = document.getElementById("wordContainer");
                    vocabContainer.innerHTML = ""; 

                    data.forEach(word => {
                        vocabContainer.innerHTML += `
                            <div class="vocal_list_row">
                            <div class="main">
                                    <i class="fa-solid fa-chevron-down" style="color: #666E7E;"></i>
                                    <img src="assets/image_hocngoaingu/${word.image}" alt="${word.vocabulary}">
                                    <i class="fa-solid fa-volume-high" style="color: #116EEE;"></i>
                                </div>
                                <p class="vocab"><strong>${word.vocabulary}</strong></p>
                                <p class="vocal_mean">${word.meaning}</p>
                                <div class="extend">
                                    <i class="fa-regular fa-star" style="color: #A7B0B7;"></i>
                                </div>
                            </div>`;
                    });
                })
                .catch(error => console.error("Error:", error));
        }
    </script>
    <script src="client/assets/javascript/review.js"></script>
</body>