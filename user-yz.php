<?php
session_start();
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

include "conn.php";

$sql = "select id,password,email,name from user";
$url="";
$result = mysqli_query($conn, $sql);
$array=array();
if (mysqli_num_rows($result)>0) {//判断查询结果有多少条记录.
		// 将查询结果转换成数组,才能显示在页面内上
		while($arr = mysqli_fetch_assoc($result)){
			// 将每条记录转换成数组,放到$array数组中
			$array[]=$arr;
		}
		// 循环数据库中所有的数据,
		for ($i=0; $i <mysqli_num_rows($result) ; $i++) { 
			// 对比用户输入的邮箱数据库中有没有
			if ($array[$i]['email']==$email) {
				// 如果有的话在对比用户输入的密码正确不正确
					$_SESSION['email']=$email;
				if ($array[$i]['password']==$password) {
					$_SESSION['name']=$array[$i]['name'];
					$_SESSION['id']=$array[$i]['id'];
					// 正确的话跳转到学生管理系统
					echo "<h2>登录成功,正在跳转页面!</h2>";
					$url = "index-1.php";
					header("Refresh:100;url={$url}");
				}else{
					echo "密码不正确";
					$url = "login.php";
					header("Refresh:1;url={$url}");
				}
			}
		}
	}else{
		echo "没有记录";
	}
//4、关闭连接，释放资源
mysqli_close($conn );
?>