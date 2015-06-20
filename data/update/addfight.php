<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>录入约战信息</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.js"></script>
</head>
<body>
	
<form class="basic-grey" action="handlefight.php" method="post">
		<label>
			<span>*用户名：</span>
			<input name="name" type="text" class="input" palceholder="" size="30">
		</label>
		  <br/>
		  <label>
			<span>*场馆名：</span>
			<input name="cnames" type="text" class="input" palceholder="" size="30">
		</label>
		  <br/>
		  <label>
			<span>*时间（格式如1506201）：</span>
			<input name="choseTime" type="text" class="input" palceholder="" size="30">
		</label>
		  <br/>
		 <label>
	        <span>*所属区:</span>
	       	<select name="district">
	       		<option value="440304">福田区</option>
	       		<option value="440303">罗湖区</option>
	       		<option value="440305">南山区</option>
	       		<option value="440308">盐田区</option>
	       		<option value="440306">宝安区</option>
	       		<option value="440307">龙岗区</option>
	       		<option value="440103">（广州）荔湾区</option>
	       		<option value="440105">（广州）海珠区</option>
	       		<option value="440106">（广州）天河区</option>
	       	</select>
      	</label>
      	<br>
      	<label>
	        <span>赛制:</span>
	       	<select name="rule">
	       		<option value="1">5人赛</option>
	       		<option value="2">3人赛</option>
	       	</select>
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