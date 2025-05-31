
<?php
require_once 'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $conn->real_escape_string($_POST['username']);
    $rating = intval($_POST['rating']);
    $comment = $conn->real_escape_string($_POST['comment']);
    
   
    if (empty($username) || empty($comment) || $rating < 1 || $rating > 5) {
        echo "البيانات غير صالحة. الرجاء المحاولة مرة أخرى.";
        exit;
    }
    

    $sql = "INSERT INTO reviews (username, rating, comment) VALUES ('$username', $rating, '$comment')";
    
    if ($conn->query($sql) === TRUE) {
      
        header("Location: index2.php");
        exit;
    } else {
        echo "حدث خطأ: " . $conn->error;
    }
    
    $conn->close();
} else {
    
    header("Location: index2.php");
    exit;
}
?>

