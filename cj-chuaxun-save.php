<?php include("head.php");
	$name = $_POST["name"];
	$kcname = $_POST["kcname"];
	$xhName = $_POST["xuehao"];

	$sql = "SELECT s.姓名,k.课程名,x.成绩 FROM xuanxiu as x LEFT join kecheng as k ON k.课程编号=x.课程编号 left join student as s on x.学号 =s.学号 where s.姓名='{$name}'";
	include("conn.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql);
	//输出数据
	if ($result) {
		echo "<script>alert('数据查询成功')</script>";
	}else{
		echo "数据查询失败".mysqli_error($conn);
	}
	//关闭数据连接
	mysqli_close($conn);
?>
<div class="sui-layout">
		  <div class="sidebar">
		    <?php include("leftmenu.php") ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>姓名</th>
					<th>课程名</th>
					<th>成绩</th>
					<th>操作</th>
				</tr>
				<?php 
					//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result)){
							 // $row1 = $row['性别']==1?'男':'女';
							echo "<tr>
									<td>{$row["姓名"]}</td>
									<td>{$row["课程名"]}</td>
									<td>{$row["成绩"]}</td>
									<td>
										<a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href='#'>修改</a>
										&nbsp;&nbsp;
										<a class='sui-btn btn-small btn-danger' href='#'>删除</a>
									</td>
								</tr>";
							};
						}else{
						echo "没有记录";
					}
					 ?>
			</table>
		  </div>
		</div>		
	<?php include("foot.php") ?>