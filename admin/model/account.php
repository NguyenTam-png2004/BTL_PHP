<?php
// chưa các function để truy vấn đến cơ sở dữ liệu
function insert_account($username, $email , $password, $avatar, $experience, $role)
{
    $sql = "INSERT INTO `users`(`username`,`email`,`password`,`avatar`,`experience`,`role`) VALUES ('$username','$email','$password','$avatar','$experience','$role')";
    pdo_execute($sql);
}
function delete_account($ID)
{
    $sql = "DELETE FROM `users` WHERE ID=" . $ID;
    pdo_execute($sql);
}
function loadAll_account()
{
    $sql = "SELECT * FROM `users` ORDER BY `ID` DESC";
    // $sql .= " order by ID desc";
    $listaccount = pdo_query($sql);
    return $listaccount;
}

function loadOne_account($ID)
{
    $sql = "SELECT * FROM `users` WHERE ID=" . $ID;
    $ac = pdo_query_one($sql);
    return $ac;
}

function update_account($ID, $username, $email , $password, $avatar, $experience, $role)
{
    $sql = "UPDATE `users` SET `username`='" . $username . "',`email`='" . $email . "',`password`='" . $password . "',`avatar`='" . $avatar . "',`experience`='" . $experience . "',`role`='" . $role . "' WHERE ID=" . $ID;
    pdo_execute($sql);
}