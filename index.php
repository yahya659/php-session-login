<?php
session_start();

if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
    exit();
}

// التحقق من وجود رسالة (تسجيل الدخول أو تسجيل الخروج)
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = "";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email
    ];

    $_SESSION['message'] = "تم تسجيل الدخول بنجاح!";
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Register / Login</title>
<style>
    body { font-family: Arial; background: linear-gradient(to right, #6a11cb, #2575fc); height:100vh; display:flex; justify-content:center; align-items:center; margin:0;}
    .container { background:white; padding:30px 40px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,0.2); width:350px; text-align:center;}
    h2 { margin-bottom:20px; color:#333; }
    input { width:90%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc; }
    button { width:95%; padding:10px; margin-top:15px; border:none; border-radius:5px; background-color:#2575fc; color:white; font-size:16px; cursor:pointer; }
    button:hover { background-color:#6a11cb; }
    .message { background:#4CAF50; color:white; padding:10px; border-radius:5px; margin-bottom:15px; }
</style>
</head>
<body>
<div class="container">
    <?php if($message != ""): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <h2>تسجيل الدخول / التسجيل</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="الاسم" required><br>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
        <button type="submit">دخول</button>
    </form>
</div>
</body>
</html>
