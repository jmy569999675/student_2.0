<?php include ("head-1.php") ?>
		
	<div class="sui-container">
		<form action="user-save.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">用户邮箱:</label>
				<div class="controls">
					<input type="text" id="email" class="input-info" placeholder="输入邮箱" name="email" data-rules="required|email"><span id="tips"></span>
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">用户名:</label>
				<div class="controls">
					<input type="text" id="userName" class="input-info" placeholder="" name="userName">
				</div>
				
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">密码:</label>
				<div class="controls">
					<input type="password" id="password" class="input-info" placeholder="输入密码" name="password">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">重复密码:</label>
				<div class="controls">
					<input type="password" id="repassword" class="input-info" placeholder="重新输入密码" name="repassword" data-rules="required|match=password">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">验证码:</label>
				<div class="controls">
					<input type="text" id="yzm" class="input-info" placeholder="输入验证码" name="yzm">
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
				<div class="controls">
					<input type="submit" id="tijiao" class="sui-btn btn-xlarge btn-primary" placeholder="" name="tijiao" value="提交">
				</div>
			</div>
		</form>
	</div>
			<div class="al">注册成功</div>

<?php include "foot.php" ?>
<script>
	$("input[name=email]").on("blur",function(){
		$.get(
			"user-save1.php",
		{"email":$(this).val()},
		function(data){
			console.log(data);
			if (data=="ok") {
				$("#tips").html('可以注册');
			}else if(data=="error"){
				$("#tips").html('邮箱重复')
			}
		},
			"text"
		)
	}).on("focus",function(){
		$("#tips").html("");
	})
	$("#tijiao").on('click',function(){
		$.ajax({
		url			: "user-save.php",
		type 		: "POST",
		data 		: $("#form1").serialize(),
		dataType	: "text",
		beforeSend	: function(XMLHttpRequest){
			// 发送前调用此函数.一般在此编写检测代码或者loading
		},
		complete	: function(XMLHttpRequest,textStatus){
			// 请求完成后调用此函数(请求成功或失败都调用)
		},
		success		: function(data,textStatus){
			// 请求成功后调用此函数
			console.log(data);
			if (data=="ok") {
				$(".al").css("display","block")
				var t=setTimeout(function(){
					window.location.href = "login.php";
				},2000)
					
			}
		},
		error		: function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("错误的原因:"+errorThrown);
		}
	});
		return false;
	})
</script>