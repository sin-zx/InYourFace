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
	<body data-color="grey" class="flat"><div id="wrapper">
		<!-- 头部 -->
		<div id="header">
			<h1><a href="./index.html">InYourFace</a></h1>		
			<a id="menu-trigger" href="#"><i class="fa fa-align-justify"></i></a>
		</div>
		
		<div id="user-nav">
            <ul class="btn-group">
                <li class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="fa fa-envelope"></i> <span class="text">消息</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu messages-menu">
                        <li class="title"><i class="fa fa-envelope-alt"></i>Messages<a class="title-btn" href="#" title="Write new message"><i class="fa fa-share"></i></a></li>
                        <li class="message-item">
                        	<a href="#">
	                            <img alt="User Icon" src="img/demo/av1.jpg" />
	                            <div class="message-content">
	                            	<span class="message-time">
		                                2 days ago
		                            </span>
	                                <span class="message-sender">
	                                    验证成功
	                                </span>
	                                <span class="message">
	                                    您的场馆信息已通过审核，可以开始使用
	                                </span>
	                            </div>
                        	</a>
                        </li>
                        <li class="message-item">
							<a href="#">
	                            <img alt="User Icon" src="img/demo/av1.jpg" />
	                            <div class="message-content">
	                            	<span class="message-time">
		                                3 days ago
		                            </span>
	                                <span class="message-sender">
	                                    完善信息通知
	                                </span>
	                                <span class="message">
	                                    您的信息不完整，请及时完善，方便我们为您提供更多服务
	                                </span>
	                            </div>
                        	</a>
                        </li>
                        <li class="message-item">
							<a href="#">
	                            <img alt="User Icon" src="img/demo/av1.jpg" />
	                            <div class="message-content">
	                            	<span class="message-time">
		                                3 mins ago
		                            </span>
	                                <span class="message-sender">
	                                    Nunc Cenenatis
	                                </span>
	                                <span class="message">
	                                    Hi, can you meet me at the office tomorrow morning?
	                                </span>
	                            </div>
                        	</a>
                        </li>
                    </ul>
                </li>
                <li class="btn"><a title="" href="#"><i class="fa fa-cog"></i> <span class="text">设置</span></a></li>
                <li class="btn"><a title="" href="login.html"><i class="fa fa-share"></i> <span class="text">注销</span></a></li>
            </ul>
        </div>
       
       <div id="switcher">
            <div id="switcher-inner">
                <h3>Theme Options</h3>
                <h4>Colors</h4>
                <p id="color-style">
                    <a data-color="orange" title="Orange" class="button-square orange-switcher" href="#"></a>
                    <a data-color="turquoise" title="Turquoise" class="button-square turquoise-switcher" href="#"></a>
                    <a data-color="blue" title="Blue" class="button-square blue-switcher" href="#"></a>
                    <a data-color="green" title="Green" class="button-square green-switcher" href="#"></a>
                    <a data-color="red" title="Red" class="button-square red-switcher" href="#"></a>
                    <a data-color="purple" title="Purple" class="button-square purple-switcher" href="#"></a>
                    <a href="#" data-color="grey" title="Grey" class="button-square grey-switcher"></a>
                </p>
                <h4 class="visible-lg">Layout Type</h4>
                <p id="layout-type">
                	<a data-option="flat" class="button" href="#">Flat</a>
                    <a data-option="old" class="button" href="#">Old</a>                    
                </p>
            </div>
            <div id="switcher-button">
                <i class="fa fa-cogs"></i>
            </div>
        </div>
            
		<div id="sidebar">
			<div id="search">
				<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
			</div>
			<ul>
				<li><a href="tables.html"><i class="fa fa-th"></i> <span>场地管理</span></a></li>
				<li class="active">
					<a href="charts.html"><i class="fa fa-signal"></i> <span>统计分析</span></a>
				</li>
				<li>
					<a href="setting.html"><i class="fa fa-cog"></i> <span>设置</span></a>
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
										<h4>36094</h4>
										<span>Total Visits</span>
									</li>
									<li>										
										<h4>1433</h4>
										<span>Users Registered</span>
									</li>
									<li>										
										<h4>8650</h4>
										<span>Completed Orders</span>
									</li>
									<li>										
										<h4>29</h4>
										<span>Pending Orders</span>
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
								<h5>Browsers</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Browser</th>
											<th>Visits</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Chrome</td>
											<td>8775</td>
										</tr>
										<tr>
											<td>Firefox</td>
											<td>5692</td>
										</tr>
										<tr>
											<td>Internet Explorer</td>
											<td>4030</td>
										</tr>
										<tr>
											<td>Opera</td>
											<td>1674</td>
										</tr>
										<tr>
											<td>Safari</td>
											<td>1166</td>
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
								<h5>Refferers</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Site</th>
											<th>Visits</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="#">http://google.com</a></td>
											<td>12679</td>
										</tr>
										<tr>
											<td><a href="#">http://bing.com</a></td>
											<td>11444</td>
										</tr>
										<tr>
											<td><a href="#">http://yahoo.com</a></td>
											<td>8595</td>
										</tr>
										<tr>
											<td><a href="#">http://www.something.com</a></td>
											<td>4445</td>
										</tr>
										<tr>
											<td><a href="#">http://else.com</a></td>
											<td>2094</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-lg-4">
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
					</div>
				</div>
		</div>
		<div class="row">
			<div id="footer" class="col-xs-12">
				2012 - 2013 &copy; Unicorn Admin. Brought to you by <a href="https://wrapbootstrap.com/user/diablo9983">diablo9983</a>
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
