<div class="content row-fluid">
	<h1 class="title"><?php echo $title ?></h1>
	<div class="main">
		<h3>方案文档下载: <a href="<?php echo base_url('data/files/'.$no.'/'.$filename) ?>"><?php echo $title ?></a></h3>
		<br>
		<h3>作品编号: <?php echo $no ?> </h3>
		<h3>已有票数：<?php echo $poll ?>	</h3>
		<br> 
		<h1>方案简介：</h1>
		<p class="intro"><?php echo $intro ?></p>
		<br><br>
		<h1>图文详情：</h1>
		<div class="img"><img src="<?php echo base_url('data/files/'.$no.'/'.$imgname) ?>" alt="图文详情" class="img-responsive img-rounded"></div>
		<br><br>
	</div>
</div>
</body>
</html>