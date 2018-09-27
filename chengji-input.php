<?php include "head.php" ;
include "conn.php" ;
	$sql = "select 课程编号,课程名 from kecheng";
	$result = mysqli_query($conn, $sql);
?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生成绩录入</p>
			<form class="sui-form form-horizontal sui-validate" action="cj-save.php" method="post" id="form1">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">	
			      <input type="text" id="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=5|maxlength=10" name="xuehao">
			    </div>
			   
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select name="kcNum" id="kcNum">
			      	<?php 
			      	if (mysqli_num_rows($result)>0) {
			      		while ($row= mysqli_fetch_assoc($result)) {
			      			echo "<option value='{$row['课程编号']}'>{$row['课程名']}</option>";
			      		}
			     	 }else{
			     	 	echo "请先添加课程";
			     	 }
			      	 ?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" id="chengji" class="input-large input-fat"  placeholder="输入成绩" data-rules="required|minlength=1|maxlength=3" name="chengji">
			    </div>
			  </div>
			 				  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>