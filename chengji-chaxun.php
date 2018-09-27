<?php include "head.php" ;
include "conn.php";
$sql = "select 课程名 from kecheng";
$result = mysqli_query($conn, $sql);
?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩查询</p>
			<form class="sui-form form-horizontal sui-validate" action="cj-chuaxun-save.php" method="post" id="form1">
			<div class="control-group">
			    <label for="inputEmail" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="name" class="input-large input-fat"  placeholder="输入成绩" data-rules="required|minlength=1" name="name">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">	
			      <input type="text" id="xuehao" class="input-large input-fat" placeholder="输入学号"  name="xuehao">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">	
			      <select name="kcname" id="">
			      	<?php 
			      		if( mysqli_num_rows($result)>0 ){
		while ( $row = mysqli_fetch_assoc($result) ) {
			echo "<option value='{$row['课程名']}'>{$row['课程名']}</option>";
		}
	}else{
		echo "<option value=''>暂无班级信息</option>";
	}
			      	 ?>
			      </select>
			    </div>
			  </div>
			  
			 				  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>