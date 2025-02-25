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
        }  
        h1 {  
            font-size: 36px;  
            margin-bottom: 20px;  
        }  
        h2 {  
            font-size: 28px;  
            margin-bottom: 20px;  
        }  
        .chefs {  
            display: flex;  
            justify-content: center;  
            margin-bottom: 30px;  
        }  
        .chef-image {  
            width: 150px; 
            height: 150px;
            border-radius: 50%;  
            border: 5px solid goldenrod; 
            margin: 0 15px;  
        }  
        .about {  
            max-width: 600px;  
            margin: 0 auto;  
            font-size: 18px;  
        }  
    </style>  
</head>  
<body>  
    <div class="navbar">  
        <div class="logo">Kusina Ni Gah</div>  
        <div>  
            <a href="index.php">Home</a>  
            <a href="store.php">Store</a>  
            <a href="about.php" class="active">About Us</a>  
            <a href="cart.php">🛒</a>  
        </div>  
    </div>  
    <div class="container">  
        <h1>The Chefs</h1>  
        <div class="chefs">  
            <img src="rojas.png"  class="chef-image">  
            <img src="soriano.png"  class="chef-image">  
        </div>  <br><br>
        <h2>About KNG</h2>  <br>
        <div class="about">  
            <p>Serving delicious Silog meals that combine flavor and comfort. Enjoy our garlic fried rice with your choice of tapa, longganisa, or tocino, topped with a perfect fried egg. Treat yourself to a hearty meal today!</p>  
        </div>  
    </div>  
</body>  
</html>