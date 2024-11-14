<?php
function loadAll_ngonngu()
{
    $sql = "select * from languages order by ID desc";
    $listngonngu = pdo_query($sql);
    return $listngonngu;
}
function insert_ngonngu($language, $symbol, $flag)
{
    $sql = "INSERT INTO `languages`(`language`,`symbol`,`flag`) VALUES ('$language','$symbol','$flag')";
    pdo_execute($sql);
}
function delete_ngonngu($ID)
{
    $sql = "DELETE FROM `languages` WHERE ID=" . $ID;
    pdo_execute($sql);
}
function loadOne_ngonngu($ID)
{
    $sql = "SELECT * FROM `languages` WHERE ID=" . $ID;
    $kh = pdo_query_one($sql);
    return $kh;
}
function update_ngonngu($ID, $language, $symbol, $flag)
{
    $sql = "UPDATE `languages` SET `language`='" . $language . "',`flag`='" . $flag . "',`symbol`='" . $symbol . "' WHERE ID=" . $ID;
    pdo_execute($sql);
}