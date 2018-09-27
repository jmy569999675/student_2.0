<?php 
echo "<h2>退出成功</h2>";
session_start();
unset($_SESSION['email'] );
header("Refresh:1;url=login.php");
 ?>