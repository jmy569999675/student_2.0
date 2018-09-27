<?php
//先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select 班号 from banji";
$result = mysqli_query($conn, $sql);

//先读取该学号对应的学生信息
$sid = $_REQUEST['sid'];
echo $sid;
$sql2 = "select * from student where id={$sid}";
$result2 = mysqli_query($conn, $sql2);
if( mysqli_num_rows($result2)>0 ){
	//因为确认只有一条记录，因此可不用while循环	，直接转成数组存放到$row变量中
	$row = mysqli_fetch_assoc($result2);
}else{
	echo "找不到该学生信息.";
}


?>
<?php include "head.php" ?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息修改</p>
			<form action="student-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
				<!--技巧：增加一个隐藏的input,用来区分是新增记录还是修改记录-->
				<input type="hidden" name="action" value="update">
				<!-- 增加一个隐藏的input，用来保存id,执行修改操作时根据id修改记录-->
				<input type="hidden" name="sid" value="<?php echo $row['id']; ?>">
			  <div class="control-group">
			    <label for="snum" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="snum" name="snum" value="<?php echo $row['学号']; ?>" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>				
			  <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sName" name="sName"  value="<?php echo $row['姓名']; ?>" class="input-large input-fat" placeholder="输入学生名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
                <label for="pic" class="control-label">照片:</label>
                <div class="controls">
                     <img src="<?php echo $row{'照片'}; ?>" alt="" width='150' height='150' id='pic'><br>
						<input type="hidden" value="<?php echo $row{'照片'}; ?>" name='oldpic'>
                     <input type="file" name="file" value="">
                </div>
              </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">班号：</label>
			    <div class="controls">
			      <select id="bjNumber" name="bjNumber">

<?php 
	if( mysqli_num_rows($result)>0 ){
		while ( $banji = mysqli_fetch_assoc($result) ) {
			//判断$row[班号]和 $banji[班号]相等，就被选中
			if( $banji['班号'] == $row['班号'] ){
				echo "<option selected='selected' value='{$banji['班号']}'>{$banji['班号']}</option>";		
			}else{
			echo "<option value='{$banji['班号']}'>{$banji['班号']}</option>";				
			}
		}
	}else{
		echo "<option value=''>暂无班级信息</option>";
	}
?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="sBrithday" class="control-label">出生日期：</label>
			  	<div class="controls">
			  		<input type="text" id="sBrithday" name="sBrithday"  value="<?php echo $row['出生日期']; ?>" class="input-fat input-large" placeholder="输入出生日期" data-toggle="datepicker">
			  	</div>
			  </div>	
			  <div class="control-group">
			  	<label for="sSex" class="control-label">性别</label>
			  	<div class="controls">
			      <label class="radio-pretty inline <?php echo $row['性别']==1?"checked":""; ?>">
				    <input type="radio" value="1" checked="<?php echo $row['性别']==1?"checked":""; ?>" name="sSex"><span>男</span>
				  </label>
				  <label class="radio-pretty inline <?php echo $row['性别']==0?"checked":""; ?>">
				    <input type="radio" value="0" name="sSex" checked="<?php echo $row['性别']==1?"checked":""; ?>"><span>女</span>
				  </label>
			  	</div>
			  </div>	
			  <div class="control-group">
			  	<label for="sPhone" class="control-label">联系电话：</label>
			  	<div class="controls">
			  		<input type="text" id="sPhone" name="sPhone"   value="<?php echo $row['电话']; ?>" class="input-fat input-large" placeholder="输入电话" data-rules="mobile" >
			  	</div>
			  </div>				  		  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script>

</script>