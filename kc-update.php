<?php 
	$kid=empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
	if ($kid=="null") {
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		//执行SQL语句
		$sql = "select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
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
				<p class="sui-text-xxlarge">课程修改</p>
				<form action="kc-save.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
					<div class="control-group">
						<label for="inputEmail" class="control-label">课程名：</label>
						<div class="controls">
							<!-- 增加一个隐藏的input,用来区分是新增数据还是修改数据 -->
							<input type="hidden" name="action" value="update">
							<!-- 增加一个隐藏的input,保存课程标号 -->
							<input type="hidden" name="kid" value="<?php echo $row{'课程编号'}; ?>">
							<input type="text" id="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10" name="kcName" value="<?php echo $row{'课程名'}; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="inputEmail" class="control-label">课程时间：</label>
						<div class="controls">
							<input type="text" id="kcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程时间" name="kcTime" method="post" value="<?php echo $row{'时间'}; ?>">
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