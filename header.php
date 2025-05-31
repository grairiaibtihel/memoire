<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border-bottom: 2px solid #ccc;
        }

        .admin-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .admin-header nav {
            display: flex;
            gap: 15px;
        }

        .admin-header nav a {
            text-decoration: none;
            color: #FF94A8;
            font-weight: bold;
            transition: color 0.3s ease;
            font-size: 18px; 
            display: flex;
            align-items: center;
        }

        .admin-header nav a i {
            margin-right: 5px;
            font-size: 20px; 
        }

        .admin-header nav a:hover {
            color:rgb(255, 132, 154);
        }
    </style>
</head>
<body>

<header>


    <div class="admin-header">
        <h1>Panneau d'administration</h1>
        <nav>
            <a href="page1.php"><i class="fas fa-home"></i> </a>
        </nav>
    </div>
</header>

</body>
</html>