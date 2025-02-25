<?php
session_start();

// Redirect to cart if no items are in the cart
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}

// Define menu items with their prices
$menu_items = [
    'tapsilog' => ['price' => 99, 'name' => 'Tapsilog'],
    'longsilog' => ['price' => 99, 'name' => 'Longsilog'],
    'tosilog' => ['price' => 99, 'name' => 'Tosilog'],
    'hotsilog' => ['price' => 99, 'name' => 'Hotsilog'],
    'pineapple_juice' => ['price' => 39, 'name' => 'Pineapple Juice'],
    'blue_lemonade' => ['price' => 39, 'name' => 'Blue Lemonade'],
    'gulaman' => ['price' => 39, 'name' => 'Gulaman'],
    'avocado_juice' => ['price' => 39, 'name' => 'Avocado Juice'],
    'kangkong' => ['price' => 69, 'name' => 'Kangkong'],
    'tofu' => ['price' => 69, 'name' => 'Tofu'],
    'buchi' => ['price' => 69, 'name' => 'Buchi'],
    'mango_tomato_salad' => ['price' => 69, 'name' => 'Mango & Tomato Salad'],
];

// Handle adding/removing items from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_item'])) {
        $item = $_POST['add_item'];
        if (isset($_SESSION['cart'][$item])) {
            $_SESSION['cart'][$item]++;
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

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item => $quantity) {
    $total_price += $menu_items[$item]['price'] * $quantity;
}

// Handle payment submission
$change = null;
$error = null;
if (isset($_POST['amount_paid'])) {
    $amount_paid = (float)$_POST['amount_paid'];
    if ($amount_paid >= $total_price) {
        $change = $amount_paid - $total_price;
    } else {
        $error = "Insufficient payment. Please pay at least ₱" . number_format($total_price, 2) . ".";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kusina Ni Gah - Checkout</title>
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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #333;
            color: white;
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
            background-color: #555;
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
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #333;
        }
        .payment-form {
            margin-top: 20px;
        }
        .payment-form label {
            font-size: 18px;
            margin-right: 10px;
        }
        .payment-form input {
            padding: 5px;
            font-size: 16px;
            width: 150px;
            margin-right: 10px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .change {
            color: green;
            margin-top: 10px;
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
            <a href="about.php">About Us</a>
            <a href="cart.php" class="active">🛒</a>
        </div>
    </div>

    <div class="container">
        <h2>Checkout</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $item => $quantity): ?>
                    <tr>
                        <td><?php echo $menu_items[$item]['name']; ?></td>
                        <td class="quantity">
                            <form method="POST" style="display:inline;">
                                <button type="submit" name="remove_item" value="<?php echo $item; ?>">-</button>
                            </form>
                            <span><?php echo $quantity; ?></span>
                            <form method="POST" style="display:inline;">
                                <button type="submit" name="add_item" value="<?php echo $item; ?>">+</button>
                            </form>
                        </td>
                        <td>₱<?php echo $menu_items[$item]['price']; ?></td>
                        <td>₱<?php echo $menu_items[$item]['price'] * $quantity; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total Price</strong></td>
                    <td><strong>₱<?php echo number_format($total_price, 2); ?></strong></td>
                </tr>
            </table>

            <form method="POST" class="payment-form">
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" id="amount_paid" name="amount_paid" step="0.01" min="0" required>
                <button type="submit" class="button">Calculate Change</button>
            </form>

            <?php if (isset($change)): ?>
                <p class="change"><strong>Change:</strong> ₱<?php echo number_format($change, 2); ?></p>
            <?php elseif (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>