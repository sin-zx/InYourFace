<?php 
		//分页参数设置
		$page=isset($_GET['page'])?$_GET['page']:1; //从零开始
		$imgnums = 30;    //每页显示的图片数		    
		$i=322;			//总的图片数
		$pagenum=@ceil($i / $imgnums);	//页数
?>
		
		<!--跳转到指定页-->
	    <div class="jumpmenu">
	    	<p>
			文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#
			</p>
			<br>
			<form action="" method="get">
			<span>第</span> 
			<select name="page" id="jumpMenu"> 
			<?php for($k=1;$k<=$pagenum;$k++){
				if($k!=$page){
			?>
					<option value="<?php echo $k ?>"><?php echo $k ?></option>
			<?php }else{ ?>	
					<option value="<?php echo $page ?>" selected><?php echo $page ?></option> 
			<?php } } ?>
			</select>
			<span>页</span> 
			<button type="submit" class="btn btn-sm btn-info">跳转</button>
			&nbsp;<span>当前第 <?php echo $page ?> 页</span>
			</form> 
		</div>
		<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<div class="btn-group">
		  <button type="button" class="btn btn-default">教学研究</button>
		  <a href="<?php echo site_url('/ry') ?>"><button type="button" class="btn btn-default">荔园文化</button></a>
		  <button type="button" class="btn btn-default">校园服务</button>
		  <button type="button" class="btn btn-default">基础设施</button>
		  <button type="button" class="btn btn-default">制度建设</button>
		</div>

	<div class="border"></div>
	<!--内容列表-->
	<div class="row-fluid list">
		    <?php
		    for($j=$imgnums*($page-1); $j<($imgnums*$page)&&$j<$i; ++$j){
		    	?>
		        <div class="item">
					<a href="detail.php?id="><img alt="缩略图" src="<?php echo base_url('data/img/01.jpg') ?>" class="img-thumbnail" width="324" height="296"/></a> <br>
					<!--<a href="vote-handle.php?id="><button class="btn" type="button" id="mybtn">点此投票</button></a>-->
					
					<h4>< <?php echo $j+1 ?> >这是标题</h4>
					<p>&nbsp;票数：<?php echo $j*100 ?></p>
					<a href="" onclick="firm();return false;"><button class="btn btn-danger" type="button" id="mybtn">点此投票</button></a>
				</div>
			<?php
		    }
		    echo "<br>";
		    ?>
	</div>
	<script type="text/javascript">
	function wait(){
		alert("投票尚未开始，请等待活动通知！");
		//alert("投票已结束，感谢您的参与");
	}
	function firm(){
    		if(confirm("点击确定后无法更改，确认投给该方案？")){
        		//location.href="vote-handle.php?id=2";
        		wait();
     		}
	}
	</script>