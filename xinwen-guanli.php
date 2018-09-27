<?php
include "conn.php";
$sql = "select id,标题,发布时间 from xinwen";
$result = mysqli_query($conn, $sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">新闻管理</p>
			<table class="sui-table table-primary">
			  <thead>
			    <tr>
			    <th>id</th>
				<th>标题</th>
				<th>发布时间</th>
				<th>操作</th>
			    </tr>
			  </thead>
			  <tbody>
<?php
	if( mysqli_num_rows($result)>0 ){
		while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr>
								<td>{$row['id']}</td>
								<td>{$row['标题']}</td>
								<td>{$row['发布时间']}</td>
								<td>
									<a class='sui-btn btn-warning' href='xinwen-update.php?kid={$row["id"]}''>修改</a>
									&nbsp;&nbsp;&nbsp;
									<a class='sui-btn btn-danger' href='xinwen-del.php?kid={$row["id"]}'>删除</a>
								</td>
							</tr>";
		}

	}else{
		echo "<tr><td>暂无记录</td></tr>";
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