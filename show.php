<?php
include('Mysqsl.php');


$show = $connect_mysql->query("SELECT * FROM login ");

if ($show->num_rows > 0) {
    echo json_encode(
        array(
            'success' => true,
            'data' => $show->fetch_all(MYSQLI_ASSOC)
        )
    );
}


?>