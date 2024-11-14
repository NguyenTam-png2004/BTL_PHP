<?php

function loadAll_nguphap($kyw="",$ID_language=0){
    $sql="select * from grammars where 1";
    if($kyw!=""){
        $sql.=" and course like '%".$kyw."%'";
    }
    if($ID_language>0){
        $sql.=" and ID_language = '".$ID_language."'";
    }  
    $sql.=" order by ID desc";
    $listkhoahoc=pdo_query($sql);
    return $listkhoahoc;
}
function insert_nguphap($ID_language, $name, $grammar){
    $sql="INSERT INTO `grammars`(`ID_language`,`name`, `grammar`) VALUES ('$ID_language','$name','$grammar')";
    pdo_execute($sql);
}
function update_nguphap($ID, $ID_language, $name, $grammar){
    $sql="UPDATE `grammars` SET `name`='".$name."',`ID_language`='".$ID_language."', `grammar`='".$grammar."' WHERE ID=".$ID;
    pdo_execute($sql);
}
function loadOne_nguphap($ID){
    $sql="SELECT * FROM `grammars` WHERE ID=".$ID;
    $kh=pdo_query_one($sql);
    return $kh;
}
function delete_nguphap($ID)
{
    $sql = "DELETE FROM `grammars` WHERE ID=" . $ID;
    pdo_execute($sql);
}