<?php session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息录入</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">	
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/sui-editor/0.0.2/editor/css/sui-editor.css">	
	<style>
		.text-right{
			text-align: right;
		}
		.text-right #t{
			color: red;
			font-size: 18px;
		}
		.block{
			width: 270px;
    	float: left;
    	margin-right: 30px;
    	display: inline;
    	transition: all 500ms ease-out;
    	padding-bottom: 20px;
    	border:3px solid red;
    	text-align: center;
    	height: 300px;
   		overflow: hidden;
		}
		#editor{font-size: 18px;font-family:"Times New Roman",Georgia,Serif;padding-top: 5px;line-height: 25px; font-weight: 800;}
	</style>
</head>
<body>
	<div class="sui-container">
		<div class="my-head">北京网络职业学院学生管理系统 V2.0</div>
		<div class="text-right">欢迎<span id="t"><?php
		
		if (empty($_SESSION['email'])) {
			echo "<h2>账户失效请重新登录!</h2>";
			header("Refresh:2;url=login.php");
			die();
		}else{
			echo $_SESSION['email'];
		}	
		
		 ?></span>登录成功&nbsp;&nbsp;&nbsp;<a href="login-out.php">退出</a>
		
		</div>