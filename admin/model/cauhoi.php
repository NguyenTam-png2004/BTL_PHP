<?php
function insert_cauhoi($question, $type, $ID_vocabulary)
{
    $sql = "INSERT INTO `questions`(`ID_vocabulary`,`type`,`question`) VALUES ('$ID_vocabulary','$type','$question')";
    pdo_execute($sql);
}
function delete_cauhoi($ID)
{
    $sql = "DELETE FROM `questions` WHERE ID=" . $ID;
    pdo_execute($sql);
}
function loadAll_cauhoi($kyw = "", $ID_course = 0)
{
    $sql = "select * from questions where 1";
    if ($kyw != "") {
        $sql .= " and lesson like '%" . $kyw . "%'";
    }
    if ($ID_course > 0) {
        $sql .= " and ID_course  = '" . $ID_course . "'";
    }
    $sql .= " order by ID desc";
    $listcauhoi = pdo_query($sql);
    return $listcauhoi;
}

function loadOne_cauhoi($ID)
{
    $sql = "SELECT * FROM `questions` WHERE ID=" . $ID;
    $bh = pdo_query_one($sql);
    return $bh;
}

function update_cauhoi($ID, $question, $type, $ID_vocabulary)
{
    $sql = "UPDATE `questions` SET `question`='" . $question . "',`type`='" . $type . "',`ID_vocabulary`='" . $ID_vocabulary . "'  WHERE ID=" . $ID;
    pdo_execute($sql);
}