<?php session_start();

 ?>
<?php include ("head-1.php") ?>
	<div class="sui-container">
		<form action="user-yz.php" class="sui-form form-horizontal sui-validate" id="form1" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">用户邮箱:</label>
				<div class="controls">
					<input type="text" id="email" class="input-info" placeholder="输入邮箱" name="email" data-rules="required|email">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">密码:</label>
				<div class="controls">
					<input type="password" id="password" class="input-info" placeholder="输入密码" name="password">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">验证码:</label>
				<div class="controls">
					<input type="text" id="yzm" class="input-info" placeholder="输入验证码" name="yzm" >
					<span id='rdm'><?php include 'random.php';
						$aa(4);
					?></span>
					<span id="tips"></span>
					<script>
			    // 转成大写字母
			    	yzm.onblur = function(){
			    		var str= yzm.value;
			    		yzm.value = str.toUpperCase();
			    	}
			    </script>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="submit" id="tijiao" class="sui-btn btn-xlarge btn-primary" name="tijiao" value="提交" disabled="">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<a href="user-wangji.php" class="sui-btn btn-xlarge btn-primary">忘记密码</a>
				</div>
			</div>
			<div class="al"></div>
		</form>
	</div>
<?php include "foot.php" ?>
<script>
$("input[name=yzm]").on("blur",function(){
	// console.log($("#rdm").html());
	if ($(this).val()==$("#rdm").html()) {
		// $("#tips").html("验证码正确");
		$("#tijiao").removeAttr("disabled");
	}else if($(this).val()!=$("#rdm").html()){
		$("#tijiao").attr("disabled",true);
		$("#tips").html("验证码不正确!");
	}
})

function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
$("#tijiao").on('click',function(){
	// 使用$.ajax方法
	$.ajax({
		url	: "login-save-ajax.php",
		type : "POST",
		data : $("#form1").serialize(),
		dataType : "json",
		/*beforeSend	: function(XMLHttpRequest){
			// 发送前调用此函数.一般在此编写检测代码或者loading
		},
		complete : function(XMLHttpRequest,textStatus){
			// 请求完成后调用此函数(请求成功或失败都调用)
		},*/
		success	: function(data,textStatus){
			// 请求成功后调用此函数
			if (data.code==200) {
				console.log(data);
				$('.al').css("display","block").html(data.msg);
				setTimeout(function(){
					window.location.href = "index-1.php";
				},2000)
				
			}
			if (data.code==20001) {
				// 提示密码错误
				$('.al').css("display","block").html(data.msg);
				$("#password").select().focus();
				
			}
			if (data.code==20004) {
				// 提示邮箱填写错误
				$('.al').css("display","block").html(data.msg);
				$("#email").select().focus();
			}
		},
		error	: function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("错误的原因:"+errorThrown);
		}
	});
	return false;
})
</script>