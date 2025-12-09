<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #11998e, #38ef7d);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }
    .container {
        background: white;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        width: 400px;
        text-align: center;
    }
    h2 {
        margin-bottom: 15px;
        color: #333;
    }
    p {
        color: #555;
    }
    .message {
        background: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #f44336;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    a:hover {
        background: #d32f2f;
    }
</style>
</head>
<body>
<div class="container">
    <?php if($message != ""): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <h2>مرحبًا، <?php echo $user['name']; ?>!</h2>
    <p>البريد الإلكتروني: <?php echo $user['email']; ?></p>
    <a href="logout.php">تسجيل الخروج</a>
</div>
</body>
</html>
