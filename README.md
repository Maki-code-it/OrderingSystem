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
        .image-container {  
            position: relative;  
            display: inline-block;  
        }  
        .image-container img {  
            width: 850px; 
         
			border-radius: 100px; 
        }  
        .button {  
            position: absolute;  
            bottom: 20px;  
            left: 50%;  
            transform: translateX(-50%);  
            padding: 15px 10px;  
            background-color: black;  
            color: white;  
            text-decoration: none;  
            border-radius: 5px;  
        }  
        .button:hover {  
            background-color: #333;  
        }  
    </style>  
</head>  
<body>  
    <div class="navbar">  
        <div class="logo">Kusina Ni Gah</div>  
        <div>  
            <a href="index.php" class="active">Home</a>  
            <a href="store.php">Store</a>  
            <a href="about.php">About Us</a>  
            <a href="cart.php">🛒</a>  
        </div>  
    </div>  
    <div class="container">  
        <h1>BEST SILOGS IN TOWN</h1>  
        <p>DELICIOUS SILOGS FOR EVERY MOOD</p>  
		<br><br>
        <div class="image-container">  
            <img src="SilogsBG.png"alt="Delicious Silogs">  
            <a href="store.php" class="button">ORDER NOW</a> 
        </div>  
    </div>  
</body>  
</html>
