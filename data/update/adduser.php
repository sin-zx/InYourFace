<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>录入用户信息</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.js"></script>
</head>
<body>
	
<form class="basic-grey" action="handleuser.php" method="post">
		<label>
			<span>用户名：</span>
			<input name="name" type="text" class="input" palceholder="" size="30">
		</label>
		
	      <label>
	          <span>&nbsp;</span>
	          <span>&nbsp;</span>
	          <input type="submit" class="button" value="提交" />
	          <input type="reset" class="button" name="Submit2" value="重置" > 
	      </label>
</form>

<script type="text/javascript">
    //实例化编辑器
    //var um = UM.getEditor('myEditor');
</script>
</body>
</html>