<?php 
$sid = empty($_REQUEST['sid'])?"null":$_REQUEST['sid'];
if($sid == null ){
	echo "<script>alert('请指定要删除的记录！')</script>";
	header("Refresh:1;url=kc-list-ajax.php");
}else{
	include "conn.php";
	$result = mysqli_query($conn,"delete from kecheng where 课程编号='{$sid}'");
	if($result){
		echo "数据删除成功!";
		// Refresh:暂停时间
		header("Refresh:1;url=kc-list-ajax.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//关闭数据连接
	mysqli_close($conn);
}
 ?>