<?php include "head.php" 
/*include "conn.php";
$sql = "select name from user";
$result = mysqli_query($conn, $sql);*/
?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
		  	
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script>
	$(function(){
		$.ajax({
			url	: "api.php",
			type : "POST",
			dataType : "json",
			data:{
				"action":"xinwen",
			},
			beforeSend:function(XMLHttpRequest){
				// 发送前调用此函数.一般在此编写检测代码或者loading
				// $("#studentlist").html("<tr><td>正在查询,请稍后...</td></tr>");
			},
			
			success	: function(data,textStatus){
				// 请求成功后调用此函数
				// $("#studentlist :first-child").remove();
				
				// console.log(data.data);
				if (data.code==200) {
					att(data);
					
				}
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				// 请求失败后调用此函数
				console.log("错误的原因:"+errorThrown);
			}
		});
	})
	function att(data){
		console.log();
		for (var i = 0; i < data.data.length; i++) {
			var $bt="<div class='title'><h2>"+data.data[i]["标题"]+"</h2></div>";
			var $pic="<a href='news.php?path="+ data.data[i]["id"] +"'><img class='pic' src="+data.data[i]["图片"] +" width='100' height='100'></a>";
			var $time="<div class='time'><span>发布时间</span>:"+data.data[i]["发布时间"]+"</div>";
			var $cont="<div class='cont'><span>内容:</span>"+data.data[i]["内容"]+"</div>";
			var $d="<div class='block'>"+ $bt+$pic+$time+$cont +"</div>"
			$(".content").append($d);
		}
	}
</script>