<?php 
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$userName = $_REQUEST["userName"];
	$answer = $_REQUEST["answer"];
	$tip = $_REQUEST["tip"];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];
	include("conn.php");
	if ($action == "add") {
	
		$str1 = "注册成功";
		$str2 = "注册失败";
		$url = "login.php";
		$sql1 = "insert into user(email,name,password,question,answer)  values('$email','$userName','$password','$tip','$answer')";
	}else if($action == "update"){
		$str1= "登录成功";
		$str2 = "登录失败";
		$url = "chenggong.php";
		$kid = $_REQUEST["kid"];
		$code = $_REQUEST["code"];
		$sql1="select * from user where $email=$kid and $password=$code";
	}else{
		die("请选择操作方法");
	}
	
//执行SQL语句
$result = mysqli_query($conn,$sql1);



// 输出数据
// var_dump($result);
if ($result) {
	echo "ok";
	// 返回页面
	// header("Refresh:1;url={$url}");
}else{
	echo "{$str2}".mysqli_error($conn);
}


//关闭数据连接
mysqli_close($conn);
 ?>