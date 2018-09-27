<?php
include "conn.php";
$sql = "select 班号,班长,教室,班主任,班级口号 from banji";
$result = mysqli_query($conn, $sql);

function news($pageNum = 1, $pageSize){
	global $conn;
    $array = array();
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from banji limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);
    while ($obj = mysqli_fetch_assoc($r)) {
        $array[] = $obj;
    }
    return $array;
}

function allNews(){
	global $conn;
	$sql2 = "select count(*) as allnum from banji"; //可以显示出总页数
	$r = mysqli_query($conn, $sql2);
	$obj = mysqli_fetch_assoc($r);
	return $obj["allnum"];
}

$allNum = allNews(); //总记录数
$pageSize = 5; //约定每页显示几条信息
$pageNum = empty($_REQUEST["pageNum"])?1:$_REQUEST["pageNum"];//默认从1开始
$endPage = ceil($allNum/$pageSize); //总页数
$array = news($pageNum,$pageSize); //根据页码得到分页记录
// var_dump( $array);

?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">班级信息管理</p>
			<table class="sui-table table-primary">
			  <thead>
			    <tr>
			    <th>班号</th>
						<th>班长</th>
						<th>教室</th>
						<th>班主任</th>
						<th>班级口号</th>
						<th>操作</th>
			    </tr>
			  </thead>
			  <tbody>
<?php
	if( mysqli_num_rows($result)>0 ){
		while( $array = mysqli_fetch_assoc($result) ){
			echo "<tr>
								<td>{$array['班号']}</td>
								<td>{$array['班长']}</td>
								<td>{$array['教室']}</td>
								<td>{$array['班主任']}</td>
								<td>{$array['班级口号']}</td>
								<td>
									<a class='sui-btn btn-warning' href='bj-update.php?kid={$array["班号"]}''>修改</a>
									&nbsp;&nbsp;&nbsp;
									<a class='sui-btn btn-danger' href='bj-del.php?kid={$array["班号"]}'>删除</a>
								</td>
							</tr>";
		}

	}else{
		echo "<tr><td>没有记录</td></tr>";
	}
?>
			  </tbody>				

			</table>
			总计：<?php echo $allNum; ?>条记录
<a href="?pageNum=1">首页</a>
<a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
<?php
$pageAmount = ceil($allNum / $pageSize);
for($i = 1 ; $i <= $pageAmount ; $i++){
	echo "<a href=?pageNum={$i}>{$i}</a>&nbsp";
}
?>			    
<a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
<a href="?pageNum=<?php echo $endPage?>">尾页</a>

		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>