
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <header>
    <div class="admin-header">
          <nav>
            <a href="page1.php"><i class="fas fa-home"></i> </a>
       
        </nav>
          <h1>Évaluations</h1>
    </div>
</header>
    <div class="container">
     

        <main class="review-container" >
           
            <section class="review-form">
                <h2>Ajoutez votre Évaluation </h2>
                <form id="reviewForm" action="submit_review.php" method="POST">
                    <div class="form-group">
                        <label for="username">Nom :</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Note :</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" required>
                            <label for="star5" title="5 étoiles"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star4" title="4 étoiles"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3" title="3 étoiles"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star2" title="2 étoiles"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star1" title="1 étoile"><i class="fas fa-star"></i></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="comment">Commentaire :</label>
                        <textarea id="comment" name="comment" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">Envoyer l’évaluation</button>
                </form>
            </section>
            

       
            <section class="reviews-display">
                <h2>Avis des utilisateurs</h2>
                <div id="reviewsList">
                    <?php include 'reviews.php'; ?>
                </div>
            </section>
        </main>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>