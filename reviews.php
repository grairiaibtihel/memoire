
<?php
require_once 'database.php';


$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    while($row = $result->fetch_assoc()) {
        echo '<div class="review-item">';
        echo '<div class="review-header">';
        echo '<h3>' . htmlspecialchars($row["username"]) . '</h3>';
        echo '<div class="review-date">' . date('d/m/Y', strtotime($row["created_at"])) . '</div>';
        echo '</div>';
        
        echo '<div class="rating-display">';
       
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $row["rating"]) {
                echo '<i class="fas fa-star filled"></i>';
            } else {
                echo '<i class="fas fa-star"></i>';
            }
        }
        echo '</div>';
        
        echo '<div class="review-comment">';
        echo '<p>' . nl2br(htmlspecialchars($row["comment"])) . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="no-reviews">Pas encore de commentaires — ajoutez le vôtre !</p>';
}

$conn->close();
?>

