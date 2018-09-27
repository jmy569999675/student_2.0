<?php 
include "conn.php";
$action = empty($_REQUEST["action"])?"null":$_REQUEST["action"];
$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功",
);
switch ($action) {
	case 'student':
		$sql = "select id,学号,姓名,性别,出生日期,电话 from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$studentlist = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$studentlist[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"] = $studentlist;
		}else{
			$responseArr["code"]=207;
			$responseArr["msg"]="暂无记录";
		}
		die(json_encode($responseArr));
		break;
	case 'kecheng':
		$sql = "select 课程编号,课程名,时间 from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$kechenglist = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$kechenglist[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"] = $kechenglist;
		}else{
			$responseArr["code"]=207;
			$responseArr["msg"]="暂无记录";
		}
		die(json_encode($responseArr));	
	break;
	case 'xinwen':
		$sql = "select id,标题,肩题,图片,发布时间,内容 from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$newslist = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$newslist[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"] = $newslist;
		}else{
			$responseArr["code"]=207;
			$responseArr["msg"]="暂无记录";
		}
		die(json_encode($responseArr));	
	break;

}
?>