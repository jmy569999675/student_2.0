<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">学生信息管理</p>
			<table class="sui-table table-primary" >
			  <thead>
			    <tr>
			      <th>序号</th>
			      <th>学号</th>
			      <th>姓名</th>
			      <th>性别</th>
			      <th>生日</th>
			      <th>电话</th>		
			      <th>操作</th>
			    </tr>
			  </thead>
			  <tbody id="studentlist">
<?php
	
?>
			  </tbody>				

			</table>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script id="template1" type="text/html" >
	
</script>

<script>
	$(function(){
		$.ajax({
			url	: "api.php",
			type : "POST",
			dataType : "json",
			data:{
				"action":"student",
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
					// 声明一个变量
					/*var arr = data.data;
					var html = template('template1',{"arr":arr});
					$("#studentlist").html(html);*/
				}
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				// 请求失败后调用此函数
				console.log("错误的原因:"+errorThrown);
			}
		});
	})
	function att(data){
		for (var i = 0; i < data.data.length; i++) {
			var $trs=$("<tr></tr>");
			for(j in data.data[i]){
				var $tds="<td>"+data.data[i][j]+"</td>";
				$trs.append($tds);
			}
			var $td="<td><a class='sui-btn btn-samll btn-warning' href='student-update.php?sid="+ data.data[i]['id'] +"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='student-del.php?sid="+ data.data[i]['id'] +"'>删除</a></td>";
			$trs.append($td);
			$("#studentlist").append($trs);
		}
	}
</script>