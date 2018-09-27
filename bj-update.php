<?php 
	$kid=empty($_GET["kid"])?"null":$_GET["kid"];
	if ($kid=="null") {
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		//执行SQL语句
		$sql = "select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$kid}'";
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
<?php include "head.php" ?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	
			</div>
		<!-- 右边 -->
			<div class="content">
				<p class="sui-text-xxlarge">班级信息修改</p>
				<form action="bj-save.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
					<div class="control-group">
						<label for="inputEmail" class="control-label">班号:</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程标号 -->
							<input type="hidden" name="kid" value="<?php echo $row{'班号'}; ?>">
							<input type="text" id="banhao" class="input-large input-fat" placeholder="输入班号" name="banhao" value="<?php echo $row{'班号'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">班长:</label>
						<div class="controls">
							<input type="text" id="banzhang" class="input-large input-fat" placeholder="输入班号" name="banzhang" value="<?php echo $row{'班长'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">教室:</label>
						<div class="controls">
							<input type="text" id="jiaoshi" class="input-large input-fat" placeholder="输入教室" name="jiaoshi" value="<?php echo $row{'教室'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">班主任:</label>
						<div class="controls">
							<input type="text" id="banzhuren" class="input-large input-fat" placeholder="输入号班主任" name="banzhuren" value="<?php echo $row{'班主任'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">班级口号:</label>
						<div class="controls">
							<input type="text" value="<?php echo $row['班级口号'] ?>" id="bjkh" name="bjkh" class="input-large input-fat" placeholder="输入班级口号">
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label"></label>
						<div class="controls">
							<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
<?php include "foot.php" ?>