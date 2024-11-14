<?php
function insert_khoahoc($ID_language, $course)
{
    $sql = "INSERT INTO `courses`(`ID_language`,`course`) VALUES ('$ID_language','$course')";
    pdo_execute($sql);
}
function delete_khoahoc($ID)
{
    $sql = "DELETE FROM `courses` WHERE ID=" . $ID;
    pdo_execute($sql);
}

function loadAll_khoahoc($kyw = "", $ID_language = 0)
{
    $sql = "select * from courses where 1";
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
function loadOne_khoahoc($ID)
{
    $sql = "SELECT * FROM `courses` WHERE ID=" . $ID;
    $kh = pdo_query_one($sql);
    return $kh;
}
function update_khoahoc($ID, $ID_language, $course)
{
    $sql = "UPDATE `courses` SET `course`='" . $course . "',`ID_language`='" . $ID_language . "' WHERE ID=" . $ID;
    pdo_execute($sql);
}
function count_courses()
{
    $sql = "SELECT COUNT(*) FROM `courses`";
    $result = pdo_query_one($sql);
    return $result["COUNT(*)"];
}
function count_users()
{
    $sql = "SELECT COUNT(*) FROM `users`";
    $result = pdo_query_one($sql);
    return $result["COUNT(*)"];
}
function count_tuvung()
{
    $sql = "SELECT COUNT(*) FROM `vocabularies`";
    $result = pdo_query_one($sql);
    return $result["COUNT(*)"];
}