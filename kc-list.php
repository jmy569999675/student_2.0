<?php
include "conn.php";
$sql = "select 课程编号,课程名,时间 from kecheng";
$result = mysqli_query($conn, $sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">课程信息管理</p>
			<table class="sui-table table-primary">
			  <thead>
			    <tr>
			    <th>课程编号</th>
				<th>课程名</th>
				<th>时间</th>
				<th>操作</th>
			    </tr>
			  </thead>
			  <tbody>
<?php
	if( mysqli_num_rows($result)>0 ){
		while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr>
								<td>{$row['课程编号']}</td>
								<td>{$row['课程名']}</td>
								<td>{$row['时间']}</td>
								<td>
									<a class='sui-btn btn-warning' href='kc-update.php?kid={$row["课程编号"]}''>修改</a>
									&nbsp;&nbsp;&nbsp;
									<a class='sui-btn btn-danger' href='kc-del.php?kid={$row["课程编号"]}'>删除</a>
								</td>
							</tr>";
		}

	}else{
		echo "<tr><td>暂无学生记录</td></tr>";
	}
?>
			  </tbody>				

			</table>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>