<?php
session_start();

// تعيين رسالة تسجيل الخروج
$_SESSION['message'] = "تم تسجيل الخروج بنجاح!";

// حذف بيانات المستخدم
unset($_SESSION['user']); 

header("Location: index.php");
exit();
?>
