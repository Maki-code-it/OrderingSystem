<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Kusina Ni Gah</title>  
    <style>  
        * {  
            margin: 0;  
            padding: 0;  
            box-sizing: border-box;  
            font-family: Arial, sans-serif;  
        }  
        body {  
            background-color: #FFD700;  
            text-align: center;  
        }  
        .navbar {  
            background-color: black;  
            padding: 15px;  
            display: flex;  
            justify-content: space-between;  
            align-items: center;  
            color: white;  
        }  
        .navbar a {  
            color: white;  
            text-decoration: none;  
            margin: 0 15px;  
            font-size: 18px;  
            padding: 10px;  
        }  
        .active {  
            background-color: #FFD700;  
            color: black;  
            padding: 10px;  
            border-radius: 5px;  
        }  
        .container {  
            padding: 50px;  
            display: flex;  
            justify-content: center;  
            flex-direction: column;  
        }  
        .menu-left {  
            text-align: left;  
            flex: 1;  
            padding: 10px;  
            display: flex;  
            flex-direction: column;   
            align-items: center;  
        }  
        h1 {  
            margin-bottom: 20px;  
            font-size: 36px;  
            font-weight: bold;   
        }  
        .view-menu {  
            margin-top: 20px;  
            padding: 15px 30px;  
            background-color: black;  
            color: white;  
            text-decoration: none;  
            border-radius: 5px;  
            display: inline-block;  
            font-size: 18px;  
        }  
        .view-menu:hover {  
            background-color: #333;  
        }  
        .cards {  
            display: flex;  
            justify-content: space-between;  
            margin-top: 20px;   
        }  
        .card {  
            margin: 10px;  
            width: 250px;  
            transition: transform 0.3s;  /* Smooth transition */  
        }  
        .card:hover {  
            transform: scale(1.4);  /* Scale up on hover */  
        }  
        .card img {  
            width: 190x;  
            height: 190px;  
            border-radius: 10px 10px 0 0;  
        }  
        .card-content {  
            background-color: white;  
            padding: 15px;  
            border-radius: 10px;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);  
            text-align: center;   
        }  
    </style>  
</head>  
<body>  
    <div class="navbar">  
        <div class="logo">Kusina Ni Gah</div>  
        <div>  
            <a href="index.php">Home</a>  
            <a href="store.php" class="active">Store</a>  
            <a href="about.php">About Us</a>  
            <a href="cart.php">🛒</a>  
        </div>  
    </div>  
    <div class="container">  
        <div class="menu-left">  
            <h1>On the Menu</h1>  
        </div>  
        <div class="cards">  
            <div class="card">  
                <div class="card-content">  
                    <img src="tapsilog2.jpg" alt="Silog Meals">  
                    <h2 class="menu-title">Silog Meals</h2>  
                    <p>Packed with rich flavors and served fresh, our Silog meals are the perfect start to your day!</p>  
                </div>  
            </div>  
            <div class="card">  
                <div class="card-content">  
                    <img src="pinya2.jpg" alt="Drinks">  
                    <h2 class="menu-title">Drinks</h2>  
                    <p>Refresh your meal with our vibrant drinks, expertly crafted to complement every bite.</p>  
                </div>  
            </div>  
            <div class="card">  
                <div class="card-content">  
                    <img src="tofu2.jpg" alt="Sides">  
                    <h2 class="menu-title">Sides</h2>  
                    <p>Savor our selection of classic and innovative side dishes that enhance your meal.</p>  
                </div>  
            </div>  
        </div>  
    </div>  

    <a href="cart.php" class="view-menu">VIEW FULL MENU</a>  
</body>  
</html>