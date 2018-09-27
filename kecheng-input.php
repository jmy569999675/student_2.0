<?php include "head.php" ?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>		  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程录入</p>
			<form class="sui-form form-horizontal sui-validate" action="kc-save.php" method="post">
			  <div class="control-group">
			    <label for="kcName" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" id="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10" name="kcName">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcTime" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" class="input-large input-fat" name="kcTime" data-toggle="datepicker" placeholder="输入课程时间">
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