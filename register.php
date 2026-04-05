<?php
include('Mysqsl.php');



if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    $check_user = $connect_mysql->prepare("select email from login where email = ?");
    $check_user->bind_param("s", $email);
    $check_user->execute();
    $result = $check_user->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "exists", "message" => "Email already exists"]);
    } else {
        $stmt = $connect_mysql->prepare("insert into login(email, password) values(?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Registration successful"]);
        }
        $stmt->close();
    }

    $check_user->close();


}
?>