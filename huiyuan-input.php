<?php
include "conn.php";
$sql = "select * from user";
$result = mysqli_query($conn, $sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">会员信息管理</p>
			<table class="sui-table table-primary">
			  <thead>
			    <tr>
			      <th>序号</th>
			      <th>email</th>
			      <th>姓名</th>
			      <th>密码提示问题</th>
			      <!-- <th>答案</th> -->
			      <th>操作</th>
			    </tr>
			  </thead>
			  <tbody>

<?php
	if( mysqli_num_rows($result)>0 ){
		$i = 1;		
		while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr>";
			echo "<td>{$i}</td>";
			echo "<td>{$row['email']}</td>";
			echo "<td>{$row['name']}</td>";
			echo "<td>{$row['question']}</td>";	
			echo "<td><a class='sui-btn btn-samll btn-warning' href='huiyuan-update.php?sid={$row['id']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='huiyuan-del.php?sid={$row['id']}'>删除</a></td>";
			echo "<tr>";
			$i++;
		}

	}else{
		echo "<tr><td>暂无会员记录</td></tr>";
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