<?php
include "conn.php";
$sql = "select ID,课程编号,学号,成绩 from xuanxiu";
$result = mysqli_query($conn, $sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
				<p class="sui-text-xxlarge">成绩列表</p>
				<table class="sui-table table-primary">
					<tr>
						<th>id</th>
						<th>课程编号</th>
						<th>学号</th>
						<th>成绩</th>
						<th>操作</th>
					</tr>
					<?php 
					// 输出数据
					if (mysqli_num_rows($result)>0) {
						// $i=1;
						while ($row= mysqli_fetch_assoc($result)) {

							echo "<tr>
							<td>{$row['ID']}</td>
								<td>{$row['课程编号']}</td>
								<td>{$row['学号']}</td>
								<td>{$row['成绩']}</td>
								<td>
									<a class='sui-btn btn-warning' href='cj-update.php?kid={$row["ID"]}&code={$row["学号"]}'>修改</a>
									&nbsp;&nbsp;&nbsp;
									<a class='sui-btn btn-danger' href='cj-del.php?kid={$row["ID"]}&code={$row["学号"]}'>删除</a>
								</td>
							</tr>";
						// $i++;
						}
						echo "</table>";
					}else{
						echo "没有记录";
					} ?>
				</table>

			</div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>