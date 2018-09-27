<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="bj-save.php" method="post">
			  <div class="control-group">
			    <label for="banhao" class="control-label">班号：</label>
			    <div class="controls">
			    	<input type="hidden" name="">
			      <input type="text" id="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=5|maxlength=6" name="banhao">
			      <script>
			    // 转成大写字母
			    	banhao.onblur = function(){
			    		var str= banhao.value;
			    		banhao.value = str.toUpperCase();
			    	}
			    </script>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhang" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" id="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10" name="banzhang">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" id="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10" name="jiaoshi">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" id="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=1|maxlength=10" name="banzhuren">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjkh" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" id="bjkh" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=30" name="bjkh">
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
<script>
	// 第一种方法
	// document.cookie="uname=jmy;expires=Thu,22 Aug 2018 00:00:00 GMT";
	// 第二种方法cookie失效时间
	/*var days = 30;
	daysTime = 30*24*60*60*1000;//转换为毫秒
	var exp = new Date();
	exp.setTime(exp.getTime()+daysTime);//设置为30天后失效

	document.cookie = "uname=jmy;expires="+exp.toGMTString();

	var password = "123456";
	document.cookie="password="+password;*/
</script>