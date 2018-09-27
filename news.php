<?php 
	include "conn.php";
	$path=empty($_REQUEST["path"])?"null":$_REQUEST["path"];
	$sql = "select * from xinwen where id={$path}";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)>0) {
			// 将查询结果转换成数组
			$row = mysqli_fetch_assoc($result);
			// var_dump($row);
		}else{
			// 
			echo "找不到";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $row["标题"]; ?></title>
	<style>
	.head{width: 100%;height: 200px;background-color: blue;}
	.head .inner{width: 1200px;height: 100%;position: relative;margin: 0 auto; font-size: 30px;text-align: center;}
	ul{
		list-style: none;
		margin: 0 auto;
		overflow: hidden;
	}
	.inner{padding-top: 50px;}
	.nav li{
		float: left;
		margin: 20px;

	}
	.news-content{border:1px solid red;text-align: center;width: 100%;}
	</style>
</head>
<body>
	<div class="head">
		<div class="inner">北京网络职业学院</div>
		<div class="nav">
			<ul>
				<li><a href="index-1.php">首页</a></li>
				<li><a href="#">学院概况</a></li>
				<li><a href="#">师资队伍</a></li>
				<li><a href="#">专业设置</a></li>
				<li><a href="#">招生就业</a></li>
				<li><a href="#">北网新闻</a></li>
				<li><a href="#">走进北网</a></li>
				<li><a href="#">联系我们</a></li>
			</ul>
		</div>
		<div class="lanmu"><h2>
			<?php 
			if ($row["columnid"]==1) {
				echo "北网新闻";
			}else if($row["columnid"]==2){
				echo "学生动态";
			} 
			?>
			</h2>
		</div>
		<hr>
		<!-- 内容 -->
	<div class="tit">
	<!-- 标题 -->
		<h3>
		<?php 
			echo $row["标题"];
		?>
		</h3>
	</div>
<!-- 时间 -->
<div class="tiem">
	<?php 
			echo $row["发布时间"];
		?>
</div>
<br>
<br>
<!-- 内容区域 -->
<div class="news-content">
&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
	echo $row["内容"];
?>
<br>
<img src="
		<?php 
		echo $row["图片"];
		?>
	" alt="" >
</div>
<!-- 图片 -->
<div>
	
</div>
	</div>
</body>
</html>