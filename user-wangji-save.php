<?php
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
$email = $_REQUEST['email'];
$tip = $_REQUEST['tip'];
$answer = $_REQUEST['answer'];

include "conn.php";

$str = "登录成功！";
$str2 = "登录失败！";
$url = "login.php";
$sql = "SELECT `email`, `question`, `answer` FROM `user`";
$result = mysqli_query($conn, $sql);
$array=array();
if (mysqli_num_rows($result)>0) {//判断查询结果有多少条记录.
		// 将查询结果转换成数组,才能显示在页面内上
		while($arr = mysqli_fetch_assoc($result)){
			// 将每条记录转换成数组,放到$array数组中
			$array[]=$arr;
		}
		// var_dump($array);
	// 循环数据库中所有的数据,
		for ($i=0; $i <mysqli_num_rows($result) ; $i++) { 
			// 对比用户输入的邮箱数据库中有没有
			if ($array[$i]['email']==$email) {
				var_dump($array[$i]['email']);
				// 如果有的话在对比用户输入的密码正确不正确
				if ($array[$i]['question']==$tip) {
					// 正确的话跳转到学生管理系统
					if ($array[$i]['answer']==$answer) {
						$url = "index-1.php";
						// echo "全部正确";
					header("Refresh:1;url={$url}");
					}else{
						echo "密码不正确";
						$url = "user-wangji.php";
						header("Refresh:1;url={$url}");
					}
				}
			}
		}
	}else{
		echo "没有记录";
	}
	/*if($result){
		//echo "数据插入成功！";
		echo "<script>alert({$str});</script>";
		//页面指定2秒后跳转
		header("Refresh:1;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}*/

//4、关闭连接，释放资源
mysqli_close($conn );

?>