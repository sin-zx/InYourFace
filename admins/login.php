<!DOCTYPE html>
<html lang="en">
    <head>
        <title>InYourFace</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/unicorn-login.css" />
    		<script type="text/javascript" src="js/respond.min.js"></script>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-44987299-1', 'bootstrap-hunter.com');
		  ga('send', 'pageview');

		</script></head>    <body>
        <div id="container">
            <div id="logo">
                <img src="img/logo.png" alt="" />
            </div>
            <div id="user">
                <div class="avatar">
                    <div class="inner"></div>
                    <img src="img/demo/av1_1.jpg" />
                </div>
                <div class="text">
                    <h4>登陆成功，<span class="user_name"></span></h4>
                </div>
            </div>
            <div id="loginbox">            
                <form id="loginform" action="index.php">
    				<p>欢迎来到场地管理系统</p>
                    <div class="input-group input-sm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" type="text" id="username" placeholder="Username" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" id="password" placeholder="Password" />
                    </div>
                    <div class="form-actions clearfix">
                        <div class="pull-left">
                            <a href="#registerform" class="flip-link to-register blue">申请入驻</a>
                        </div>
                        <div class="pull-right">
                            <a href="#recoverform" class="flip-link to-recover grey">忘记密码？</a>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary btn-default" value="Login" />
                    </div>

                </form>
                <form id="recoverform" action="sendmail.php" method="post">
    				<p>输入您注册时使用的邮箱，我们将会发送一封邮件到您邮箱进行验证</p>
    				<div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input class="form-control" type="text" placeholder="E-mail address" />
                    </div>
                    <div class="form-actions clearfix">
                        <div class="pull-left">
                            <a href="#loginform" class="grey flip-link to-login">点此登陆</a>
                        </div>
                        <div class="pull-right">
                            <a href="#registerform" class="blue flip-link to-register">申请入驻</a>
                        </div>
                        <input type="submit" class="btn btn-block btn-inverse" value="Recover" />
                    </div>
                </form>
                <form id="registerform" action="modifysets.php" method="post">
                    <p>场地注册</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" type="text" placeholder="用户名" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" placeholder="密码" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" placeholder="确认密码" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input class="form-control" type="text" placeholder="注册邮箱" />
                    </div>
                    <!-- <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span><input class="form-control" type="password" placeholder="场馆名称" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span><input class="form-control" type="password" placeholder="场馆地址" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span><input class="form-control" type="password" placeholder="联系电话" />
                    </div> -->
                    <div class="form-actions clearfix">
                        <div class="pull-left">
                            <a href="#loginform" class="grey flip-link to-login">点此登陆</a>
                        </div>
                        
                        <input type="submit" class="btn btn-block btn-success" value="提交申请" />
                    </div>
                </form>
            </div>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/jquery-ui.custom.min.js"></script>
        <script src="js/unicorn.login.js"></script> 
    </body>
</html>
