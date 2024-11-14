<?php

function loadAll_tuvung($kyw = "", $ID_language = 0)
{
    $sql = "select * from vocabularies where 1";
    if ($kyw != "") {
        $sql .= " and course like '%" . $kyw . "%'";
    }
    if ($ID_language > 0) {
        $sql .= " and ID_language = '" . $ID_language . "'";
    }
    $sql .= " order by ID desc";
    $listkhoahoc = pdo_query($sql);
    return $listkhoahoc;
}
function insert_tuvung($ID_lesson, $vocabulary, $file_name_sound, $image, $desc, $meaning, $example)
{
    $sql = "INSERT INTO `vocabularies`(`ID_lesson`,`vocabulary`, `sound`,`image`, `description`, `meaning`, `example`) VALUES ('$ID_lesson', '$vocabulary', '$file_name_sound', '$image', '$desc', '$meaning', '$example')";
    pdo_execute($sql);
}
function update_tuvung($ID, $ID_lesson, $vocabulary, $file_name_sound, $image, $desc, $meaning, $example)
{
    $sql = "UPDATE `vocabularies` 
            SET `ID_lesson` = '$ID_lesson',
                `vocabulary` = '$vocabulary',
                `sound` = '$file_name_sound',
                `image` = '$image',
                `description` = '$desc',
                `meaning` = '$meaning',
                `example` = '$example'
            WHERE `ID` = $ID";
    pdo_execute($sql);
}
function loadOne_tuvung($ID)
{
    $sql = "SELECT * FROM `vocabularies` WHERE ID=" . $ID;
    $kh = pdo_query_one($sql);
    return $kh;
}
function delete_tuvung($ID)
{
    $sql = "DELETE FROM `vocabularies` WHERE ID=" . $ID;
    pdo_execute($sql);
}
