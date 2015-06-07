	    <div class="jumpmenu">
	    	<h3>你的剩余投票次数为：<span type="color:#008080"><?php echo 3-$times ?></span> </h3>
	    	<p>
			文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#文字说明#
			</p>
			<br>
		<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<div class="btn-group">
		  <a href="<?php echo site_url('/ry/1') ?>"><button type="button" class="btn btn-default <?php echo $n1='' ?>">教学研究(1-32)</button></a>

		  <a href="<?php echo site_url('/ry/2') ?>"><button type="button" class="btn btn-default <?php echo $n2='' ?>">荔园文化(33-50)</button></a>

		  <a href="<?php echo site_url('/ry/3') ?>"><button type="button" class="btn btn-default <?php echo $n3='' ?>">校园服务(51-68)</button></a>

		  <a href="<?php echo site_url('/ry/4') ?>"><button type="button" class="btn btn-default <?php echo $n4='' ?>">基础设施(69-84)</button></a>

		  <a href="<?php echo site_url('/ry/5') ?>"><button type="button" class="btn btn-default <?php echo $n5='' ?>">制度建设(85-93)</button></a>

		</div>
	<div class="border"></div>
	<!--内容列表-->
	<div class="row-fluid list">
		    <?php
		   foreach ($items as $item) {
		   
		    ?>
		        <div class="item">
					<a href="<?php echo site_url('ry/detail/').$no ?>"><img alt="缩略图" src="<?php echo base_url('data/img/01.jpg') ?>" class="img-thumbnail" width="324" height="296"/></a> <br>
					<!--<a href="vote-handle.php?id="><button class="btn" type="button" id="mybtn">点此投票</button></a>-->
					
					<a href="<?php echo site_url('ry/detail/').$no ?>"><h4>< <?php echo $item['no'] ?> ><?php echo $item['title']?></h4></a>
					<p>&nbsp;票数：<?php echo $item['poll'] ?></p>
					<!--<a href="" onclick="confirm();return false;"><button class="btn btn-danger" type="button" id="mybtn">点此投票</button></a>-->
					<a href="<?php echo site_url('ry/vote/').$no.'/'.$xuehao ?>"><button class="btn btn-danger" type="button" id="mybtn">点此投票</button></a>
				</div>
			<?php
		    }
		    ?>
			<br>
	</div>

	<script type="text/javascript">
	function wait(){
		alert("投票尚未开始，请等待活动通知！");
		//alert("投票已结束，感谢您的参与");
	}
	function confirm(){
    		if(confirm("点击确定后无法更改，确认投给该方案？")){
        		//location.href="vote-handle.php?id=2";
        		wait();
     		}
	}
	</script>