<?php
$kid=empty($_GET["kid"])?"null":$_GET["kid"];
    if ($kid=="null") {
        die("请选择要修改的记录");
    }else{
        include("conn.php");

$sql = "select id,标题,肩题,作者,发布时间,内容,图片 from xinwen where id='{$kid}'";
$result = mysqli_query($conn,$sql);
$sql1="select name from user";
$result1 = mysqli_query($conn,$sql1);

        // 输出数据
        if (mysqli_num_rows($result)>0) {
            // 将查询结果转换成数组
            $row = mysqli_fetch_assoc($result);
            // var_dump($row);
        }else{
            // 
            echo "找不到";
        }

        //关闭数据连接
        mysqli_close($conn);
    }
?>
<?php include "head.php" ?> 
        <div class="sui-layout">
          <div class="sidebar">
<?php include "leftmenu.php" ?>     
          </div>
          <div class="content">
            <p class="sui-text-xxlarge my-padd">新闻修改</p>
            <form action="xinwen-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
    <!--技巧：增加一个隐藏的input,用来区分是新增记录还是修改记录-->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kid" value="<?php echo $row{'id'}; ?>">          
              <div class="control-group">
                <label for="biaoti" class="control-label">标题：</label>
                <div class="controls">
                  <input type="text" id="biaoti" name="biaoti" class="input-large input-fat" placeholder="输入标题" data-rules="required|minlength=1" value="<?php echo $row{'标题'}; ?>">
                </div>
              </div>                
              <div class="control-group">
                <label for="jianti" class="control-label">副标题：</label>
                <div class="controls">
                  <input type="text" id="jianti" name="jianti" class="input-large input-fat" placeholder="输入副标题" value="<?php echo $row{'肩题'}; ?>">
                </div>
              </div>
             
              <div class="control-group">
                <label for="zuozhe" class="control-label">作者：</label>
                <div class="controls">
                  <select id="zuozhe" name="zuozhe" value="<?php echo $row{'作者'}; ?>">
<?php 
    if( mysqli_num_rows($result1)>0 ){
        while ( $row1 = mysqli_fetch_assoc($result1) ) {
            echo "<option value='{$row1['name']}'>{$row1['name']}</option>";
        }
    }else{
        echo "<option value=''>暂无作者信息</option>";
    }
?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label for="pic" class="control-label">图片:</label>
                <div class="controls">
                     <img src="<?php echo $row{'图片'}; ?>" alt="" width='150' height='150'><br>
                     <input type="hidden" name='oldpic' value='<?php echo $row{'图片'}; ?>'>
                     <input type="file" name="file" value="">
                </div>
              </div>  
              <div class="control-group">
                <label for="fabu" class="control-label">发布日期：</label>
                <div class="controls">
                    <input type="text" id="fabu" name="fabu" class="input-fat input-large" placeholder="输入发布日期" data-toggle="datepicker" value="<?php echo $row{'发布时间'}; ?>">
                </div>
              </div>    
                
              <div class="control-group">
                <label for="cont" class="control-label">内容：</label>
                <div>
    <textarea id="editor" style="width:600px;height:300px;" name="cont"><?php echo $row{'内容'}; ?></textarea>
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