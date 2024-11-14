<?php
//hàm tạo chuỗi ký tự ngẫu nhiên
function randomString($str, $len) {
    $strLen = strlen($str); 
    $result = '';
    
    for ($i = 0; $i < $len; $i++) {
        $randomIndex = rand(0, $strLen - 1); 
        $result .= $str[$randomIndex];
    }
    return $result;
}

function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}

?>
