<?php
session_start();
require_once 'connect.php';


$id_token = $_POST['credential'];


$url = 'https://oauth2.googleapis.com/tokeninfo?id_token=' . $id_token;
$response = file_get_contents($url);
$data = json_decode($response);

if(isset($data->email)) {
    
    $email = $data->email;
    $checkEmail = $conn->prepare("SELECT id, firstName, lastName FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();
    
    if($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
    } else {
        
        $firstName = $data->given_name ?? 'User';
        $lastName = $data->family_name ?? '';
        $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email) VALUES (?, ?, ?)");
        $insertQuery->bind_param("sss", $firstName, $lastName, $email);
        $insertQuery->execute();
        
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
    }
    
    header("Location: bienvenue.php");
    exit();
} else {
    die("ERR Google");
}
?>