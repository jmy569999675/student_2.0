<?php 
include("conn.php");
//执行SQL语句
$sql = "delete from xuanxiu where ID='{$_REQUEST['kid']}'";
$result = mysqli_query($conn,$sql);
if ($result) {
	echo "<h2>删除成功</h2>";
	// Refresh:暂停时间
	header("Refresh:1;url=cj-list.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}

//关闭数据连接
mysqli_close($conn)
 ?>
