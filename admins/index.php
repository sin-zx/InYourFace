<?php 
	function changestr($str){
	    $m = substr($str, 0,2);
	    $d = substr($str, 3,2);
	    $y = substr($str, 8,2);
	    return $y.$m.$d;
	}


	if(!isset($_GET['whichday'])){
		$whichday = date('ymd');
	}else{
		$whichday = $_GET['whichday'];
		$whichday = changestr($whichday);  //得到150620的格式
	}
	require 'conn.php';
	$datas = $medoo->select("court_main", array('usingStatus','cname'), array("id" => 20));
	$cname = $datas[0]['cname'];
	$usingtime = $datas[0]['usingStatus'];
	$timearr = json_decode($usingtime);//得到已用时间的数组

 ?>
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
		

		<link rel="stylesheet" href="css/jquery.gritter.css" />
		
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

	</script>
</head>
	
		<?php require 'nav.php'; ?>
		<ul>
			<li class="active"><a href="index.php"><i class="fa fa-th"></i> <span>场地管理</span></a></li>
			<li>
				<a href="charts.php"><i class="fa fa-signal"></i> <span>统计分析</span></a>
			</li>
			<li>
				<a href="setting.php"><i class="fa fa-cog"></i> <span>设置</span></a>
			</li>
		</ul>
		</div>
		
		
		<div id="content">
			<div id="content-header">
				<h1><?php echo $cname; ?></h1>
			</div>
			<div id="breadcrumb">
				<a title="Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
				<a class="current">场地管理</a>
			</div>
			<div class="chat-message well">  
				<span class="input-box input-group">
					<form action="" method="get">
					选择日期：<input id="ui-datepicker" type="text" class="form-control  col-xs-3" id="msg-box" name='whichday' placeholder="点击这里"/>
					<br/><br/><br/>
					<span class="input-group-btn">
				        &nbsp;<button class="btn btn-success btn-small" type="submit">查找</button>
				    </span>
				    </form>
				</span>									                  
		   </div> 
				<div class="row">
					<div class="col-xs-9">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-th"></i>
								</span>
								<h5><?php echo '20'.$whichday; ?></h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>时间段</th>
											<th>可用状态</th>
											<th>操作</th>
										</tr>
									</thead>
									
									<tbody>
										<?php 
										$t = array('8:00-10:00','10:00-12:00','14:00-16:00','16:00-18:00','18:00-20:00','20:00-22:00');
										
										for ($i=0; $i < 6 ; $i++) { 
										?>
											
										<tr>
											<td><?php echo $t[$i]; ?></td>
										<?php 
										$nt = $whichday.($i+1);	//1506221

										if(in_array($nt, $timearr)){  
											$used = 1;
											?>
											<td><a href="#" class="btn btn-danger btn-xs">占用</a></td>
											
										<?php  }else{	
											$used = 0;
											?>
											<td><a class="btn btn-success btn-xs">空闲</a></td>
										<?php  
											}
										?>
											<td><a href="changestatus.php?used=<?php echo $used; ?>&time=<?php echo $nt; ?>" class="btn btn-primary btn-xs">切换状态</a> </td>

										</tr>
										<?php } ?>

									</tbody>
								</table>							
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
            <script src="js/jquery.icheck.min.js"></script>
            <script src="js/select2.min.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
            
            <script src="js/jquery.nicescroll.min.js"></script>
            <script src="js/unicorn.js"></script>
            <script src="js/unicorn.tables.js"></script>
            
            <script src="js/unicorn.jui.js"></script>
	</body>
</html>
