<?php include("head.php") ?>
<?php 
	$student = $_POST["xmName"];
	$xuehao = $_POST["xhName"];
$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$trs1 = "查询成功";
		// $trs2 = "数据更新成功";
		$sql1 = "select*from student where 姓名='{$student}' or 学号='{$xuehao}'";
	}
	include("conn.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	//输出数据
	if ($result) {
		echo "<script>alert('数据查询成功')</script>";
	}else{
		echo "数据更新失败".mysqli_error($conn);
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
					<th>学号</th>
					<th>班号</th>
					<th>姓名</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>电话号码</th>
					<th>操作</th>
				</tr>
				<?php 
					//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result)){
							 $row1 = $row['性别']==1?'男':'女';
							echo "<tr>
									<td>{$row["学号"]}</td>
									<td>{$row["班号"]}</td>
									<td>{$row["姓名"]}</td>
									<td>{$row1}</td>
									<td>{$row["出生日期"]}</td>
									<td>{$row["电话"]}</td>
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
</body>
</html>
	<?php include("foot.php") ?>