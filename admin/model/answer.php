<?php
function insert_answer($ID_question, $answer, $is_correct)
{
    $sql = "INSERT INTO `answers`(`ID_question`, `answer`, `is_correct`) 
            VALUES ('$ID_question', '$answer', '$is_correct')";
    pdo_execute($sql);
}

function delete_answer($ID)
{
    $sql = "DELETE FROM `answers` WHERE ID = $ID";
    pdo_execute($sql);
}

function loadAll_answers() {
    $sql = "SELECT answers.ID, answers.ID_question, answers.answer, questions.question 
            FROM answers 
            JOIN questions ON answers.ID_question = questions.ID";
    return pdo_query($sql);
}
function loadOne_answer($ID)
{
    $sql = "SELECT * FROM `answers` WHERE ID = $ID";
    $answer = pdo_query_one($sql);
    return $answer;
}
function update_answer($ID, $ID_question, $answer, $is_correct)
{
    $sql = "UPDATE `answers` 
            SET `ID_question` = '$ID_question', 
                `answer` = '$answer', 
                `is_correct` = '$is_correct' 
            WHERE ID = $ID";
    pdo_execute($sql);
}