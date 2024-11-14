<?php
function insert_baihoc($ID_course, $lesson, $lesson_order, $description, $image)
{
    $sql = "INSERT INTO `lessons`(`ID_course`,`lesson`,`lesson_order`,`description`,`image`) VALUES ('$ID_course','$lesson','$lesson_order','$description','$image')";
    pdo_execute($sql);
}
function delete_baihoc($ID)
{
    $sql = "DELETE FROM `lessons` WHERE ID=" . $ID;
    pdo_execute($sql);
}
function loadAll_baihoc($kyw = "", $ID_course = 0)
{
    $sql = "select * from lessons where 1";
    if ($kyw != "") {
        $sql .= " and lesson like '%" . $kyw . "%'";
    }
    if ($ID_course > 0) {
        $sql .= " and ID_course  = '" . $ID_course . "'";
    }
    $sql .= " order by ID desc";
    $listbaihoc = pdo_query($sql);
    return $listbaihoc;
}

function loadOne_baihoc($ID)
{
    $sql = "SELECT * FROM `lessons` WHERE ID=" . $ID;
    $bh = pdo_query_one($sql);
    return $bh;
}

function update_baihoc($ID, $ID_course, $lesson, $lesson_order, $description, $image)
{
    $sql = "UPDATE `lessons` SET `lesson`='" . $lesson . "',`lesson_order`='" . $lesson_order . "',`description`='" . $description . "',`image`='" . $image . "',`ID_course`='" . $ID_course . "' WHERE ID=" . $ID;
    pdo_execute($sql);
}
