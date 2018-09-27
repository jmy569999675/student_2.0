<?php include ("head-1.php") ?>

	<div class="sui-container">
		<form action="user-wangji-save.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">用户邮箱:</label>
				<div class="controls">
					<input type="text" id="email" class="input-info" placeholder="输入邮箱" name="email" data-rules="required|email">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">密码提示问题:</label>
				<div class="controls">
					<select name="tip" id="tip">
						<option value="1">你的小学在哪里上？</option>
						<option value="2">你的最好朋友的姓名？</option>
						<option value="3">你的最有纪念意义的日期？</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">答案:</label>
				<div class="controls">
					<input type="text" id="answer" class="input-info" placeholder="输入答案" name="answer">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">验证码:</label>
				<div class="controls">
					<input type="text" id="" class="input-info" placeholder="输入验证码" name="">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="submit" id="tijiao" class="sui-btn btn-xlarge btn-primary" name="tijiao" value="登录">
				</div>
			</div>
			

		</form>
	</div>
<?php include "foot.php" ?>
<script>
$("#email").on("blur",function(){
	console.log("ok")
	var username="";
	document.cookie="username="+$("#email").val();
	username=getCookie("username");
	console.log(document.cookie);
	console.log(username);
})
	
function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
</script>