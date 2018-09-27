<?php
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
$snum = $_REQUEST['snum'];
$sName = $_REQUEST['sName'];
$bjNumber = $_REQUEST['bjNumber'];
$sBrithday = $_REQUEST['sBrithday'];
$sSex = $_REQUEST['sSex'];
$sPhone = $_REQUEST['sPhone'];
$action = $_REQUEST['action']; //add 新增记录 update 修改记录

include "conn.php";
if (empty($_FILES["file"])) {
	// 如果没有上传,是空则获取老的图片
	$filename =$_REQUEST['oldpic'];
}else{
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
||($_FILES["file"]["type"]=="vadeo/mp4")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10241000)){
	if ($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		$newName=$_FILES["file"]["name"];
		$filename = "upload/".date('YmdHis').".".getExt($newName);
		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
	}
	}else {
		echo "无效文件，文件格式或大小超出范围";
}
}
if( $action == "add"){
	// $id = $_REQUEST['id'];
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "student-input.php";
	$sql = "insert into student(班号,学号,姓名,照片,性别,出生日期,电话) value('{$bjNumber}','{$snum}','{$sName}','{$filename}',{$sSex},'{$sBrithday}','{$sPhone}')";	
}else if($action == "update"){
	//修改记录
	$str = "数据修改成功！";
	$str2 = "数据修改失败！";
	$url = "student-list-ajax.php";
	$sql = "update student set 班号='{$bjNumber}',学号='{$snum}',姓名='{$sName}',性别={$sSex},出生日期='{$sBrithday}',电话='{$sPhone}',照片='{$filename}' where 学号='{$snum}'";
}else{
	die("请选择操作方法"); //die() 输出提示语并终止下面的代码执行。
}
	$result = mysqli_query($conn, $sql);
	if($result){
		//echo "数据插入成功！";
		echo "<h2>{$str}</h2>";
		//页面指定2秒后跳转
		header("Refresh:3;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}

//4、关闭连接，释放资源
mysqli_close($conn );
function getExt($url) { 
	$path=parse_url($url); 
	$str=explode('.',$path['path']); 
	return $str[1]; 
} 
?>