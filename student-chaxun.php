<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	  	
		  </div>
		   <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="student-cx-save.php" method="post">
			  <div class="control-group">
			    <label for="xmName" class="control-label">姓名：</label>
			    <div class="controls">
			       <div class="controls">
			      <input type="text" id="xmName" name="xmName" class="input-large input-fat"  placeholder="输入姓名" >
			    </div>
			  </div>
			  </div>
			  <div class="control-group">
			    <label for="xhName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xhName" name="xhName" class="input-large input-fat" placeholder="输入姓名"  >
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