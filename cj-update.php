<?php include "head.php" ?>	
<?php 
	$kid=empty($_GET["kid"])?"null":$_GET["kid"];
	if ($kid=="null") {
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		//执行SQL语句
		$sql = "select ID,课程编号,学号,成绩 from xuanxiu";
		$result = mysqli_query($conn,$sql);

		// 输出数据
		if (mysqli_num_rows($result)>0) {
			// 将查询结果转换成数组
			$row = mysqli_fetch_assoc($result);
		}else{
			// 
			echo "找不到";
		}

		//关闭数据连接
		mysqli_close($conn);
	}
 ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	
			</div>
		<!-- 右边 -->
			<div class="content">
				<p class="sui-text-xxlarge">成绩信息修改</p>
				<form action="cj-save.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
					<div class="control-group">
						<label for="inputEmail" class="control-label">学号:</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程标号 -->
							<input type="hidden" name="kid" value="<?php echo $row{'ID'}; ?>">
							<input type="text" id="xuehao" class="input-large input-fat" placeholder="输入学号" name="xuehao" value="<?php echo $row{'学号'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">课程编号:</label>
						<div class="controls">
							<select name="kcNum" id="kcNum">
								<?php 
			      	if (mysqli_num_rows($result)>0) {
			      		while ($row= mysqli_fetch_assoc($result)) {
			      			echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
			      		}
			     	 }else{
			     	 	echo "请先添加课程";
			     	 }
			      	 ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">成绩:</label>
						<div class="controls">
							<input type="text" id="chengji" class="input-large input-fat" placeholder="输入成绩" name="chengji" value="<?php echo $row{'成绩'}; ?>">
						</div>
					</div>
					
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include "foot.php" ?>