<?php
include('Mysqsl.php');

//login php

if (isset($data['email']) && isset($data['password'])) {

    $email = $connect_mysql->real_escape_string($data['email']);
    $password = $connect_mysql->real_escape_string($data['password']);

    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
    $result = $connect_mysql->query($query);

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Login successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Login failed"]);
    }
}
?>