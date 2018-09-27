<?php
/* creater db168@ 2018-09-04*/

//接收student-input.php提交过来的信息
$biaoti = $_REQUEST['biaoti'];
$jianti = $_REQUEST['jianti'];
$zuozhe = $_REQUEST['zuozhe'];
$fabu = $_REQUEST['fabu'];
$cont = $_REQUEST['cont'];

$action = empty($_POST["action"])?"add":$_POST["action"];
if (empty($_FILES["file"])) {
	$filename = $_REQUEST["oldpic"];
}else{
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	||($_FILES["file"]["type"]=="vadeo/mp4")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 10241000)){
	if ($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		// include "random.php";
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
$userid = $_REQUEST['userid'];
$columnid = $_REQUEST['columnid'];
$str = "数据插入成功！";
$str2 = "数据插入失败！";
$url = "xinwen-input.php";
$sql = "insert into xinwen(标题,肩题,图片,作者,发布时间,创建时间,内容,userid,columnid) values('$biaoti','$jianti','$filename','$zuozhe','$fabu','".time()."','$cont','$userid','$columnid')";
}else if ($action=="update") {
	$str = "数据更新成功！";
$str2 = "数据更新失败！";
$kid = $_REQUEST['kid'];
$url = "xinwen-guanli.php";

/*上传的文件名字还有错误,获取不到filenanme,SQL语句报错未定义的filename'*/

$sql = "update xinwen set 标题='{$biaoti}',肩题='{$jianti}',发布时间='{$fabu}',内容='{$cont}',图片='{$filename}' where id='{$kid}'";
}
include "conn.php";
	$result = mysqli_query($conn, $sql);
	if($result){
		//echo "数据插入成功！";
		echo "<h2>{$str}</h2>";
		//页面指定2秒后跳转
		// header("Refresh:1;url={$url}");
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