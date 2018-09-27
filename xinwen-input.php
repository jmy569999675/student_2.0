<?php
//先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select name,id from user";
$result = mysqli_query($conn, $sql);
$sql2="select * from newscolumn";
$result2=mysqli_query($conn, $sql2);
?>
<?php include "head.php" ?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布</p>
			<form action="xinwen-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
	<!--技巧：增加一个隐藏的input,用来区分是新增记录还是修改记录-->
				<input type="hidden" name="action" value="add">			
			  <div class="control-group">
			    <label for="biaoti" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="biaoti" name="biaoti" class="input-large input-fat" placeholder="输入标题" data-rules="required|minlength=1">
			    </div>
			  </div>				
			  <div class="control-group">
			    <label for="jianti" class="control-label">副标题：</label>
			    <div class="controls">
			      <input type="text" id="jianti" name="jianti" class="input-large input-fat" placeholder="输入副标题">
			    </div>
			  </div>
			  <div class="control-group">
                <label for="zuozhe" class="control-label">作者：</label>
                <div class="controls">
                <input type="hidden" name="sID" value="<?php echo $_SESSION['id']; ?>">
                  <select id="zuozhe" name="zuozhe">
<?php 
    echo "<option value='".$_SESSION['name']."' >".$_SESSION['name']."</option>";
?>
                  </select>
                </div>
              </div>
              <!-- 获取作者id -->
              <input type="hidden" name="userid" <?php 
                $array=array();
        if (mysqli_num_rows($result)>0) {//判断查询结果有多少条记录.
        // 将查询结果转换成数组,才能显示在页面内上
        while($arr = mysqli_fetch_assoc($result)){
            // 将每条记录转换成数组,放到$array数组中
            $array[]=$arr;
        }
        // 循环数据库中所有的数据,
        for ($i=0; $i <mysqli_num_rows($result) ; $i++) { 
            if ($array[$i]['name']==$_SESSION['name']) {
                echo "value='".$array[$i]['id']."'";
            }
        }
    }else{
        echo "没有记录";
    }
                
               ?>>
              <div class="control-group">
			    <label for="columnid" class="control-label">栏目：</label>
			    <div class="controls">
               
			      <select id="columnid" name="columnid">
<?php 

	if( mysqli_num_rows($result2)>0 ){
		while ( $row2 = mysqli_fetch_assoc($result2) ) {
			echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
		}
	}else{
		echo "<option value=''>暂无栏目信息</option>";
	}
?>
			      </select>
			    </div>
			  </div>
              <div class="control-group">
                <label for="pic" class="control-label">上传照片：</label>
                <div class="controls">
                    <input type="file" id="file" name="file" class="input-fat input-large">
                </div>
              </div>
			  <div class="control-group">
			  	<label for="fabu" class="control-label">发布日期：</label>
			  	<div class="controls">
			  		<input type="text" id="fabu" name="fabu" class="input-fat input-large" placeholder="输入发布日期" data-toggle="datepicker">
			  	</div>
			  </div>	
			 	
			  <div class="control-group">
			  	<label for="cont" class="control-label">内容：</label>
			  	<div>
    <textarea id="editor" style="width:600px;height:300px;" name="cont"></textarea>
</div>


			  </div>				  		  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="发布" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script src="http://g.alicdn.com/sj/sui-editor/0.0.2/sui-editor.config.js"></script>
<script src="http://g.alicdn.com/sj/sui-editor/0.0.2/editor/js/sui-editor.js"></script>