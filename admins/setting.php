<!DOCTYPE html>
<html lang="en">
	<head>
		<title>InYourFace</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/icheck/flat/blue.css" />
		<link rel="stylesheet" href="css/select2.css" />		
		<link rel="stylesheet" href="css/unicorn.css" />
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/respond.min.js"></script>
		<![endif]-->
			
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-44987299-1', 'bootstrap-hunter.com');
		  ga('send', 'pageview');

		</script></head>
		
		<?php require 'nav.php'; ?>
		<ul>
			<li><a href="index.php"><i class="fa fa-th"></i> <span>场地管理</span></a></li>
			<li>
				<a href="charts.php"><i class="fa fa-signal"></i> <span>统计分析</span></a>
			</li>
			<li class="active">
				<a href="setting.php"><i class="fa fa-cog"></i> <span>设置</span></a>
			</li>
		</ul>
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>设置</h1>
			</div>
			<div id="breadcrumb">
				<a title="Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
				<a class="current">settings</a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-align-justify"></i>									
								</span>
								<h5>场馆信息设置</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="modifysets.php" method="post" class="form-horizontal">

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">场馆名称</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" placeholder="荔香公园篮球场" readonly />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">地址</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" placeholder="广东省深圳市南山区南光路" disabled />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">场地数量</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">负责人</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">负责人电话</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="password" class="form-control input-sm" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">开放时间段</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
								
											<div class="row">
												<div class="col-md-6"><input type="text" class="form-control" value="8:00-10:00" /></div>
												<div class="col-md-6"><input type="text" class="form-control" value="10:00-12:00" /></div>
											</div>
											<div class="row">
												<div class="col-md-4"><input type="text" class="form-control" value="14:00-16:00" /></div>
												<div class="col-md-4"><input type="text" class="form-control" value="16:00-18:00" /></div>
												<div class="col-md-4"><input type="text" class="form-control" value="18:00-20:00" /></div>
											</div>
											<div class="row">
												<div class="col-md-3"><input type="text" class="form-control" value="20:00-22:00" /></div>
												<div class="col-md-9"><input type="text" class="form-control" value="可增加栏位" /></div>
											</div>
											<div class="row">
												<div class="col-md-4"><input type="text" class="form-control" value="可增加栏位" /></div>
												<div class="col-md-3"><input type="text" class="form-control" value="可增加栏位" /></div>
												<div class="col-md-5"><input type="text" class="form-control" value="可增加栏位" /></div>
											</div>
											<div class="row">
												<div class="col-md-3"><input type="text" class="form-control" value="可增加栏位" /></div>
												<div class="col-md-3"><input type="text" class="form-control" value="可增加栏位" /></div>
												<div class="col-md-3"><input type="text" class="form-control" value="可增加栏位" /></div>
												<div class="col-md-3"><input type="text" class="form-control" value="可增加栏位" /></div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">配套服务</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<label><input type="checkbox" name="checkboxes" checked />饮料食品</label>
											<label><input type="checkbox" name="checkboxes" /> 更衣室</label>
											<label class="disabled"><input type="checkbox" name="checkboxes"/>裁判</label>
											<label class="disabled"><input type="checkbox" name="checkboxes"/>运动器材</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">场馆照片</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="file" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">场馆说明</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<textarea rows="5" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary btn-sm">Save</button> or <input type="reset" class="btn btn-warning btn-sm" value="Cancel">
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>

			
			</div>
		</div>
		<div class="row">
			<div id="footer" class="col-xs-12">
				2015 &copy; InYourFace
			</div>
		</div>
		
            
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-ui.custom.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootstrap-colorpicker.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
            <script src="js/jquery.icheck.min.js"></script>
            <script src="js/select2.min.js"></script>
            
            <script src="js/jquery.nicescroll.min.js"></script>
            <script src="js/unicorn.js"></script>
            <script src="js/unicorn.form_common.js"></script>
	</body>
</html>
