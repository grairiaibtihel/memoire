<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EssorElle</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    body {
        margin: 0;
        padding: 0;
        background: white;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        position: relative;
        padding-bottom: 300px;
        font-family: Arial, sans-serif;
    }
   

   
    .navbar {
        display: flex;
        align-items: center;
        padding: 15px 5%;
        background-color: white;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
    }

    .logo {
        color: #FC929E;
        font-size: 2rem;
        font-weight: bold;
        text-decoration: none;
        margin-right: auto;
        white-space: nowrap;
    }


    .search-container {
        display: flex;
        align-items: center;
        width: 45%; 
        min-width: 350px; 
        max-width: 650px; 
        margin: 0 auto;
        position: relative;
    }

    .search-bar {
        width: 500px;
        padding: 12px 60px 12px 20px; 
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s;
        height: 46px;
        background-color: #f5f5f5;
        color: #666;
        margin-left: -85px;
    }

    .search-bar:focus {
        border-color:rgb(241, 143, 154);
        background-color: white;
        box-shadow: 0 0 0 2px transparent;
    }

    .search-button {
        position: absolute;
        right: 100px;
        top: 0;
        height: 100%;
        width: 60px;
        background-color: #FC929E;
        border: none;
        border-radius: 0 50px 50px 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

   .search-button:hover {
        background-color: #e87a8a;
    }
    
    .search-icon {
        width: 24px;
        height: 24px;
        fill: white;
    }

    .nav-icons {
        display: flex;
        gap: 20px;
        margin-left: auto;
    }

    .nav-icon {
        color: #333;
        font-size: 24px;
        transition: color 0.3s;
    }

    .nav-icon:hover {
        color: #FC929E;
    }

    
    .container {
        position: relative;
        margin: 50px auto;
        width: 1000px;
        height: 450px;
        border-radius: 15px;
        background: #f5f5f5;
        box-shadow: 0 30px 50px #dbdbdb;
        overflow: hidden;
    }

    .slide {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .slide .item {
        width: 200px;
        height: 300px;
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        border-radius: 20px;
        box-shadow: 0 30px 50px #E7BCDE;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        transition: 0.5s;
    }

    .slide .item:nth-child(1),
    .slide .item:nth-child(2) {
        top: 0;
        left: 0;
        transform: translate(0, 0);
        width: 100%;
        height: 100%;
        border-radius: 15px;
    }

    .slide .item:nth-child(2) .content {
        display: block;
    }

    .slide .item:nth-child(3) {
        left: 50%;
    }

    .slide .item:nth-child(4) {
        left: calc(50% + 220px);
    }

    .slide .item:nth-child(5) {
        left: calc(50% + 440px);
    }

    .slide .item:nth-child(n + 6) {
        left: calc(50% + 440px);
        overflow: hidden;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        color: #fff;
        transform: translate(0, -50%);
        font-family: system-ui;
        display: none;
    }

    .content .name {
        font-size: 40px;
        text-transform: uppercase;
        font-weight: bold;
        opacity: 0;
        animation: animate 1s ease-in-out 1 forwards;
    }

    .content .description {
        margin-top: 10px;
        margin-bottom: 20px;
        opacity: 0;
        animation: animate 1s ease-in-out 0.3s 1 forwards;
    }

    .content button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        opacity: 0;
        animation: animate 1s ease-in-out 0.6s 1 forwards;
    }

    @keyframes animate {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }
        to {
            opacity: 1;
            transform: translate(0);
            filter: blur(0);
        }
    }

    .button {
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 20px;
        display: flex;
        justify-content: center;
        gap: 20px;
        z-index: 10;
    }

    .button button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        background: white;
        color: #FC929E;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s;
    }

    .button button:hover {
        background: #FC929E;
        color: white;
    }

   
    .evaluation-section {
        text-align: center;
        padding: 60px 20px;
       /* background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);*/
       background: white;
        margin: 40px 0;
    }

    .evaluation-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 15px;
        font-weight: 300;
    }

    .evaluation-subtitle {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .evaluation-button {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        background: linear-gradient(45deg, #FC929E, #ff6b7a);
        color: white;
        padding: 18px 40px;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(252, 146, 158, 0.3);
        position: relative;
        overflow: hidden;
    }

    .evaluation-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(252, 146, 158, 0.4);
        background: linear-gradient(45deg, #ff6b7a, #FC929E);
    }

    .evaluation-button:active {
        transform: translateY(-1px);
    }

    .evaluation-button i {
        font-size: 1.3rem;
        transition: transform 0.3s ease;
    }

    .evaluation-button:hover i {
        transform: scale(1.1);
    }

    .evaluation-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .evaluation-button:hover::before {
        left: 100%;
    }
    
    footer {
        background-color: #F0E6EF;
        color: rgb(255, 255, 255);
        padding: 20px 10%;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    footer .column {
        margin: 10px;
    }

    footer .column h3 {
        color: #FC929E;
        margin-bottom: 10px;
        font-size: 18px;
        position: relative;
    }

    footer .column h3::after {
        content: '';
        display: block;
        width: 50px;
        height: 2px;
        background: #FC929E;
        margin-top: 5px;
    }

    footer .column ul {
        list-style: none;
    }

    footer .column ul li {
        margin: 8px 0;
    }

    footer .column ul li a {
        text-decoration: none;
        color: black;
        font-size: 14px;
        transition: color 0.3s;
    }

    footer .column ul li a:hover {
        color: #FC929E;
    }

    footer .social-icons {
        display: flex;
        gap: 10px;
    }

    footer .social-icons a {
        width: 40px;
        height: 40px;
        background-color:white;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: background-color 0.3s;
    }

    footer .social-icons a:hover {
        background-color: #FC929E;
    }

    .menu {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 250px;
        background-color: white;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        transition: left 0.3s ease;
        z-index: 1000;
    }

    .menu.active {
        left: 0;
    }

    .menu-header {
        background-color: rgb(255, 0, 157);
        color: white;
        padding: 15px;
        font-size: 1.2rem;
    }

    .menu a {
        padding: 15px 20px;
        text-decoration: none;
        color: black;
        font-size: 1rem;
        border-bottom: 1px solid gray;
    }

    .menu a:hover {
        background-color: gainsboro;
    }

    .menu a:last-child {
        border-bottom: none;
    }

    .close-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 1.5rem;
        cursor: pointer;
        color: #333;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }

    .overlay.active {
        display: block;
    }

    .content {
        padding: 20px;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 3rem;
        padding: 4rem 2rem;
        text-align: center;
        background: linear-gradient(135deg, #fef9ff 0%, #fff5f8 100%);
        position: relative;
        overflow: hidden;
    }

    .features::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23FC929E" opacity="0.03"/><circle cx="75" cy="75" r="1" fill="%23FC929E" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        pointer-events: none;
    }

    .feature-card {
        padding: 2.5rem 1.5rem;
        background: white;
        border-radius: 25px;
        box-shadow: 0 10px 40px rgba(252, 146, 158, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(252, 146, 158, 0.1);
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FC929E, #ff6b7a, #FC929E);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .feature-card:hover::before {
        transform: translateX(0);
    }

    .feature-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 60px rgba(252, 146, 158, 0.25);
        border-color: rgba(252, 146, 158, 0.3);
    }

    .feature-card .image-container {
        position: relative;
        display: inline-block;
        margin-bottom: 2rem;
    }

    .feature-card img {
        width: 100px;
        height: 100px;
        border-radius: 20px;
        object-fit: cover;
        transition: all 0.4s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 3px solid white;
    }

    .feature-card:hover img {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 15px 35px rgba(252, 146, 158, 0.3);
    }

    .feature-card .image-container::after {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 2px solid #FC929E;
        border-radius: 25px;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.4s ease;
    }

    .feature-card:hover .image-container::after {
        opacity: 0.3;
        transform: scale(1);
    }

    .feature-card h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: #333;
        font-weight: 600;
        position: relative;
        transition: all 0.3s ease;
    }

    .feature-card:hover h3 {
        color: #FC929E;
        transform: translateY(-3px);
    }

    .feature-card p {
        font-size: 1rem;
        color: #666;
        line-height: 1.6;
        transition: all 0.3s ease;
        margin: 0;
    }

    .feature-card:hover p {
        color: #555;
    }

  
    .feature-card::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
        opacity: 0;
    }

    .feature-card:hover::after {
        opacity: 1;
        transform: rotate(45deg) translate(50%, 50%);
    }

   
    @media (max-width: 1200px) {
        .features {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .features {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 3rem 1rem;
        }
        
        .feature-card {
            padding: 2rem 1rem;
        }
        
        .feature-card img {
            width: 80px;
            height: 80px;
        }
        
        .feature-card h3 {
            font-size: 1.1rem;
        }
        
        .feature-card p {
            font-size: 0.9rem;
        }
    }

    .admin-header {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 10px 20px;
    }

    .eval-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

   
    @media (max-width: 768px) {
        .evaluation-title {
            font-size: 2rem;
        }
        
        .evaluation-subtitle {
            font-size: 1rem;
        }
        
        .evaluation-button {
            padding: 15px 30px;
            font-size: 1rem;
        }
        
        .evaluation-section {
            padding: 40px 15px;
        }
    }

    </style>
</head>
<body>
    <br>

    <nav class="navbar">
        <a href="#" class="logo">EntreElles</a>
       
        <div class="search-container">
            <form action="search_results.php" method="get">
                <input type="search" name="q" class="search-bar" placeholder="Recherche" required>
                <button type="submit" class="search-button">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="white" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                </button>
            </form>
        </div>
       
        <a href="index.php">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0yMCAyMXYtMmE0IDQgMCAwIDAtNC00SDhhNCA0IDAgMCAwLTQgNHYyIj48L3BhdGg+PGNpcmNsZSBjeD0iMTIiIGN5PSI3IiByPSI0Ij48L2NpcmNsZT48L3N2Zz4=" 
                alt="Profile" class="nav-icon">
            </a>
    </nav>

    

<div class="container">
    <div class="slide">
        <div class="item" style="background-image: url('imgs/img4.jpg');">
            <div class="content">
                <div class="name">Mode et tradition</div>
                <div class="description">Des création simples et élégantes:vtements confortables et broderies raffinées</div>
                <button onclick="window.location.href='voir4.php'">Découvrez</button>
            </div>
        </div>

        <div class="item" style="background-image: url('imgs/img1.jpg');">
            <div class="content">
                <div class="name">créations artisanales</div>
                <div class="description">Cdes créations artisanales uniques:accessoires élégants,décorations raffinées et boujies parfumées.</div>
                <button onclick="window.location.href='voirr.php'">Découvrez</button>
            </div>
        </div>

        <div class="item" style="background-image: url('imgs/img3.jpg');">
            <div class="content">
                <div class="name">Délices et Fraicheur</div>
                <div class="description">Savourez des douceurs faites maison et des boissons rafraichissantes préparées avec soin.</div>
                <button onclick="window.location.href='voir5.php'">Découvrez</button>
            </div>
        </div>

        <div class="item" style="background-image: url('imgs/img2.jpg');">
            <div class="content">
                <div class="name">beauté</div>
                <div class="description">Ici,découvrez un monde de beauté où vous trouvez tout pour vous sublimer:maquillage,soins naturels et parfums.</div>
                <button  onclick="window.location.href='voir3.php'">Découvrez</button>
            </div>
        </div>
    </div>

    <div class="button">
        <button class="prev"><i class="fas fa-arrow-left"></i></button>
        <button class="next"><i class="fas fa-arrow-right"></i></button>
    </div>
</div>

<br><br>
<br>
<br><br>
<br><br>
<br>
<br><br>



<div class="features">
    <div class="feature-card">
        <div class="image-container">
            <img src="/imgs/img6.jpg" alt="Artisanat">
        </div>
        <h3>Artisanat & Accessoires</h3>
        <p>Découvrez notre collection de pièces artisanales faites main, uniques et élégantes, pour sublimer votre quotidien</p>
    </div>

    <div class="feature-card">
        <div class="image-container">
            <img src="/imgs/img7.jpg" alt="Couture">
        </div>
        <h3>Couture & Broderie</h3>
        <p>Des créations raffinées alliant broderie traditionnelle et couture moderne, conçues avec soin et passion</p>
    </div>

    <div class="feature-card">
        <div class="image-container">
            <img src="/imgs/img8.jpg" alt="Produits naturels">
        </div>
        <h3>Produits Naturels</h3>
        <p>Des savons artisanaux et soins naturels, 100 % faits maison, pour une routine bien-être saine et respectueuse</p>
    </div>

    <div class="feature-card">
        <div class="image-container">
            <img src="/imgs/img9.jpg" alt="Cuisine">
        </div>
        <h3>Gâteaux & Cuisine</h3>
        <p>Un monde de saveurs avec des recettes traditionnelles et modernes, préparées avec amour et gourmandise</p>
    </div>
</div>


<div class="evaluation-section">
    <h2 class="evaluation-title">Votre avis compte</h2>
    <p class="evaluation-subtitle">
        Aidez-nous à améliorer notre service en partageant votre expérience. 
        Votre évaluation nous permet d'offrir une meilleure qualité à tous nos clients.
    </p>
    <a href="index2.php" class="evaluation-button">
        <i class="fas fa-star"></i>
        Évaluer notre service
    </a>
</div>

<footer>
    <div class="column">
        <h3>À propos de nous</h3>
        <ul>
            <li><a href="A_propos_de.php">De nous</a></li>
            <li><a href="conditions.php">Nos services</a></li>
            <li><a href="politique.php">Politique</a></li>
        </ul>
    </div>
    <div class="column">
        <h3>Aide & Conditions</h3>
        <ul>
            <li><a href="index.php">FAQ</a></li>
            <li><a href="Expédition.php">Expédition</a></li>
            <li><a href="page1.php">Retours</a></li>
        </ul>
    </div>
    <div class="column">
        <h3>Boutique en ligne</h3>
        <ul>
            <li><a href="voir4.php">Mode et tradition</a></li>
            <li><a href="voirr.php">créations artisanales</a></li>
            <li><a href="voir5.php">Délices et Fraicheur</a></li>
            <li><a href="voir3.php">beauté</a></li>
        </ul>
    </div>
</footer>

<script>
    let next = document.querySelector('.next');
    let prev = document.querySelector('.prev');

    next.addEventListener('click', function() {
        let items = document.querySelectorAll('.item');
        document.querySelector('.slide').appendChild(items[0]);
    });

    prev.addEventListener('click', function() {
        let items = document.querySelectorAll('.item');
        document.querySelector('.slide').prepend(items[items.length - 1]);
    });

    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');
    const overlay = document.querySelector('.overlay');
    const closeBtn = document.querySelector('.close-btn');

   
    if(menuToggle) {
        menuToggle.addEventListener('click', () => {
            menu.classList.add('active');
            overlay.classList.add('active'); 
        });
    }

    
    if(closeBtn) {
        closeBtn.addEventListener('click', () => {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });
    }
    
    
    if(overlay) {
        overlay.addEventListener('click', () => {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });
    }
</script>

</body>
</html>