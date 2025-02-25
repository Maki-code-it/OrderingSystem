<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Define menu items with their prices and images
$menu_items = [
    'tapsilog' => ['price' => 99, 'image' => 'tapsilog.jpg', 'name' => 'Tapsilog'],
    'longsilog' => ['price' => 99, 'image' => 'longsilog.jpg', 'name' => 'Longsilog'],
    'tosilog' => ['price' => 99, 'image' => 'tosilog.jpg', 'name' => 'Tosilog'],
    'hotsilog' => ['price' => 99, 'image' => 'hotsilog.jpg', 'name' => 'Hotsilog'],
    'pineapple_juice' => ['price' => 39, 'image' => 'pinya.jpg', 'name' => 'Pineapple Juice'],
    'blue_lemonade' => ['price' => 39, 'image' => 'bluelemonade.jpg', 'name' => 'Blue Lemonade'],
    'gulaman' => ['price' => 39, 'image' => 'gulaman.jpg', 'name' => 'Gulaman'],
    'avocado_juice' => ['price' => 39, 'image' => 'avocado.jpg', 'name' => 'Avocado Juice'],
    'kangkong' => ['price' => 69, 'image' => 'kangkong.jpg', 'name' => 'Kangkong'],
    'tofu' => ['price' => 69, 'image' => 'tofu.jpg', 'name' => 'Tofu'],
    'buchi' => ['price' => 69, 'image' => 'buchi.jpg', 'name' => 'Buchi'],
    'mango_tomato_salad' => ['price' => 69, 'image' => 'mangotomato.jpg', 'name' => 'Mango & Tomato Salad'],
];

// Handle adding/removing items from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_item'])) {
        $item = $_POST['add_item'];
        if (isset($_SESSION['cart'][$item])) {
            $_SESSION['cart'][$item]++;
        } else {
            $_SESSION['cart'][$item] = 1;
        }
    } elseif (isset($_POST['remove_item'])) {
        $item = $_POST['remove_item'];
        if (isset($_SESSION['cart'][$item])) {
            if ($_SESSION['cart'][$item] > 1) {
                $_SESSION['cart'][$item]--;
            } else {
                unset($_SESSION['cart'][$item]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kusina Ni Gah - Menu & Cart</title>
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
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .category {
            margin-bottom: 40px;
            text-align: center;
        }
        .menu-item {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }
        .menu-item img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
        }
        .price {
            display: block;
            margin: 5px 0;
            font-weight: bold;
        }
        .quantity {
            margin: 5px 0;
        }
        .quantity button {
            padding: 5px 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .quantity button:hover {
            background-color: #333;
        }
        .quantity span {
            margin: 0 10px;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
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
            <a href="index.php">Home</a>
            <a href="store.php">Store</a>
            <a href="about.php">About Us</a>
            <a href="cart.php" class="active">🛒</a>
        </div>
    </div>

    <div class="container">
        <div class="category">
            <h2>Silog Meals</h2>
            <?php foreach (['tapsilog', 'longsilog', 'tosilog', 'hotsilog'] as $item): ?>
                <div class="menu-item">
                    <span><?php echo $menu_items[$item]['name']; ?></span><br>
                    <img src="<?php echo $menu_items[$item]['image']; ?>" alt="<?php echo $menu_items[$item]['name']; ?>">
                    <span class="price">₱<?php echo $menu_items[$item]['price']; ?></span>
                    <div class="quantity">
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="remove_item" value="<?php echo $item; ?>">-</button>
                        </form>
                        <span><?php echo isset($_SESSION['cart'][$item]) ? $_SESSION['cart'][$item] : 0; ?></span>
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="add_item" value="<?php echo $item; ?>">+</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="category">
            <h2>Drinks</h2>
            <?php foreach (['pineapple_juice', 'blue_lemonade', 'gulaman', 'avocado_juice'] as $item): ?>
                <div class="menu-item">
                    <span><?php echo $menu_items[$item]['name']; ?></span><br>
                    <img src="<?php echo $menu_items[$item]['image']; ?>" alt="<?php echo $menu_items[$item]['name']; ?>">
                    <span class="price">₱<?php echo $menu_items[$item]['price']; ?></span>
                    <div class="quantity">
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="remove_item" value="<?php echo $item; ?>">-</button>
                        </form>
                        <span><?php echo isset($_SESSION['cart'][$item]) ? $_SESSION['cart'][$item] : 0; ?></span>
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="add_item" value="<?php echo $item; ?>">+</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="category">
            <h2>Sides</h2>
            <?php foreach (['kangkong', 'tofu', 'buchi', 'mango_tomato_salad'] as $item): ?>
                <div class="menu-item">
                    <span><?php echo $menu_items[$item]['name']; ?></span><br>
                    <img src="<?php echo $menu_items[$item]['image']; ?>" alt="<?php echo $menu_items[$item]['name']; ?>">
                    <span class="price">₱<?php echo $menu_items[$item]['price']; ?></span>
                    <div class="quantity">
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="remove_item" value="<?php echo $item; ?>">-</button>
                        </form>
                        <span><?php echo isset($_SESSION['cart'][$item]) ? $_SESSION['cart'][$item] : 0; ?></span>
                        <form method="POST" style="display:inline;">
                            <button type="submit" name="add_item" value="<?php echo $item; ?>">+</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <form method="POST" action="checkout.php">
            <button type="submit" class="button">PROCEED TO CHECKOUT</button>
        </form>
    </div>
</body>
</html>