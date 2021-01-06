<?php
//Lấy danh sách tài khoản khách hàng
function getAllUser()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}