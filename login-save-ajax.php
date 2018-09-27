<?php
session_start();
include "conn.php";
//接收student-input.php提交过来的信息
// 邮箱
		$email = empty($_REQUEST['email']) ? "null":strtolower($_REQUEST['email']);
	    // 密码
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];

$responseArr=array(
 	"code" => 200,
 	"msg" => "登录成功"
 );
$sql = "select id,email,name,password,question,answer from user where email='{$email}'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {//判断查询结果有多少条记录.
	$arr = mysqli_fetch_assoc($result);	
		if ($arr['password']==$password) {
			$_SESSION['email']=$email;
			$_SESSION['name']=$arr["name"];
			$_SESSION['id']=$arr['id'];
			$responseArr["code"] = 200;
			$responseArr["msg"] = "登录成功";
		}else{
			// echo "密码错误";
			$responseArr["code"] = 20001;
			$responseArr["msg"] = "密码错误";
		}
	}else{
		$responseArr["code"] = 20004;
		$responseArr["msg"] = "邮箱不正确";
	}
			echo json_encode($responseArr);
//4、关闭连接，释放资源
mysqli_close($conn );
/*
 *$responseArr=array(
 *	"code" => 200,
 *	"msg" => "登录成功"
 *);
 *首先根据用户提交的邮箱查询,如果至少一条记录,则邮箱正确,否则邮箱不正确
 *$sql="select id,password,email,name from user where email='{$email}";
 *$result=($conn,$sql);
 *if (mysqli_num_rows($result)>0) {
 *	//提示邮箱正确
 *$arr=mysqli_fetch_assoc($result);
 *	if ($password==$arr["password"]) {
 *		//密码正确
 *		
 *	}else{
 *		//邮箱正确密码不正确
 *		$responseArr["code"] = 20001;
 *		$responseArr["msg"] = "密码错误"
 *	}
 *}else{
 *	//邮箱不存在
 *		$responseArr["code"] = 20004;
 *		$responseArr["msg"] = "邮箱不存在"
 *}
 *print_r($responseArr);
 *如果邮箱正确,在判断用户提交的密码和上一步查询到密码是否相等,相等则密码正确,否则密码不正确
 *
*/
?>