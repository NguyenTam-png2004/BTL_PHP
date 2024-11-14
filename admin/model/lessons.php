<?php

function loadAll_lessons($kyw="",$ID_language=0){
    $sql="select * from lessons where 1";
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