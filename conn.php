<?php $conn = mysqli_connect("localhost","root","");
if($conn){
	// echo "连接数据库成功";
}else{
	// echo "连接失败！";
}
//2、选择要操作的数据库
mysqli_select_db($conn, "student_dbs_v2.0");
//设置读取数据库的编码，不然有可能显示乱码
mysqli_query($conn, "set names utf8");

?>