
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">课程信息管理</p>
			<table class="sui-table table-primary">
			  <thead>
			    <tr>
			    <th>课程编号</th>
				<th>课程名</th>
				<th>时间</th>
				<th>操作</th>
			    </tr>
			  </thead>
			  <tbody id="kclist">

			  </tbody>				

			</table>
			<div class="test sui-pagination pagination-large">
  <ul>
    <li class="prev disabled"><a href="#">«上一页</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="dotted"><span>...</span></li>
    <li class="next"><a href="#">下一页»</a></li>
  </ul>
  <div><span>共10页&nbsp;</span><span>
      到
      <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
      页</span></div>
</div>	
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
				"action":"kecheng",
			},
			beforeSend:function(XMLHttpRequest){
				// 发送前调用此函数.一般在此编写检测代码或者loading
				$("#kclist").html("<tr><td>正在查询,请稍后...</td></tr>");
			},
			
			success	: function(data,textStatus){
				// 请求成功后调用此函数
				if (data.code==200) {
				$("#kclist :first-child").remove();
					att(data);
					console.log(data);
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
			var $td="<td><a class='sui-btn btn-samll btn-warning' href='kc-update.php?kid="+ data.data[i]["课程编号"] +"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='kc-del.php?kid="+ data.data[i]["课程编号"] +"'>删除</a></td>";
			
			$trs.append($td);
			$("#kclist").append($trs);
		}
	}
	//渲染分页条
$('.test').pagination({
	pageSize:6,//每页显示条数
	itemsCount:50,//获取记录总条数
	styleClass: ['pagination-large'],  //默认的css样式
	showCtrl: false,	//是否展示总页数和跳转控制器，默认为false
	onSelect: function (num) {
		console.log( num ); //打开控制台观察
	}        
});

</script>