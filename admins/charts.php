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
			<li class="active">
				<a href="charts.php"><i class="fa fa-signal"></i> <span>统计分析</span></a>
			</li>
			<li>
				<a href="setting.php"><i class="fa fa-cog"></i> <span>设置</span></a>
			</li>
		</ul>
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>统计分析</h1>
			</div>
			<div id="breadcrumb">
				<a title="Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
				<a class="current">analysis</a>
			</div>
			
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box widget-plain">
							<div class="widget-content center">
								<ul class="stats-plain">
									<li>										
										<h4>3641</h4>
										<span>总使用场次</span>
									</li>
									<li>										
										<h4>123</h4>
										<span>每日客流量</span>
									</li>
									<li>										
										<h4>250</h4>
										<span>会员</span>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-bar-chart-o"></i>
								</span>
								<h5>Line chart</h5>
							</div>
							<div class="widget-content">
								<div class="chart"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-bar-chart-o"></i>
								</span>
								<h5>Bar chart</h5>
							</div>
							<div class="widget-content">
								<div class="bars"></div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-bar-chart-o"></i>
								</span>
								<h5>Pie chart</h5>
							</div>
							<div class="widget-content">
								<div class="pie"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-lg-4">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-eye"></i>
								</span>
								<h5>会员分布</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>地区</th>
											<th>人数</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>南山区</td>
											<td>75</td>
										</tr>
										<tr>
											<td>福田区</td>
											<td>42</td>
										</tr>
										<tr>
											<td>罗湖区</td>
											<td>30</td>
										</tr>
										<tr>
											<td>盐田区</td>
											<td>14</td>
										</tr>
										<tr>
											<td>市外</td>
											<td>26</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-lg-4">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-arrow-right"></i>
								</span>
								<h5>季度人流量</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>季度</th>
											<th>流量</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>第一季度</td>
											<td>233</td>
										</tr>
										<tr>
											<td>第二季度</td>
											<td>313</td>
										</tr>
										<tr>
											<td>第三季度</td>
											<td>122</td>
										</tr>
										<tr>
											<td>第四季度</td>
											<td>无</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-12 col-lg-4">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-file"></i>
								</span>
								<h5>Most Visited Pages</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Page</th>
											<th>Visits</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="#">Shopping cart</a></td>
											<td>9440</td>
										</tr>
										<tr>
											<td><a href="#">Blog</a></td>
											<td>6974</td>
										</tr>
										<tr>
											<td><a href="#">jQuery UI tips</a></td>
											<td>5377</td>
										</tr>
										<tr>
											<td><a href="#">100+ Free Icon Sets</a></td>
											<td>4990</td>
										</tr>
										<tr>
											<td><a href="#">How to use a Google Web Tools</a></td>
											<td>4834</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div> -->
				</div>
		</div>
		<div class="row">
			<div id="footer" class="col-xs-12">
				2015 &copy; InYourFace
			</div>
		</div>
		
            <script src="js/excanvas.min.js"></script>
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-ui.custom.js"></script>
            <script src="js/bootstrap.min.js"></script>
            
            <script src="js/jquery.nicescroll.min.js"></script>
            <script src="js/jquery.flot.min.js"></script>
            <script src="js/jquery.flot.pie.min.js"></script>
            <script src="js/jquery.flot.resize.min.js"></script>
            <script src="js/unicorn.js"></script>
            <script src="js/unicorn.charts.js"></script>
	</body>
</html>
