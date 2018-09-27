<?php 
	$banhao = $_POST["banhao"];
	$banzhang = $_POST["banzhang"];
	$jiaoshi = $_POST["jiaoshi"];
	$banzhuren = $_POST["banzhuren"];
	$bjkh = $_POST["bjkh"];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "banji-input.php";
		$sql1 = "insert into banji(班号,班长,教室,班主任,班级口号) values('$banhao','$banzhang','$jiaoshi','$banzhuren','$bjkh')";
	}else if($action == "update"){
		$str1= "数据更新成功";
		$str2 = "数据更新失败";
		$url = "bj-list.php";
		$kid = $_POST["kid"];
		$sql1="update banji set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$bjkh}' where 班号='{$kid}'";
		echo $sql1;
	}else{
		die("请选择操作方法");
	}
	include("conn.php");
//执行SQL语句
$result = mysqli_query($conn,$sql1);



// 输出数据
// var_dump($result);
if ($result) {
	echo "<script>alert('{$str1}')</script>";
	// 返回页面
	header("Refresh:1;url={$url}");
}else{
	echo "{$str2}".mysqli_error($conn);
}


//关闭数据连接
mysqli_close($conn);
 ?>