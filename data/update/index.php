<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>录入场馆信息</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.js"></script>
</head>
<body>
	
<form class="basic-grey" action="handle.php" method="post">
		<label>
			<span>*场馆名称：</span>
			<input name="cname" type="text" class="input" palceholder="" size="30">
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
	       	</select>
      	</label>
      	<br>
	    <label>
	        <span>*具体地址：</span>
	        <input name="addr" type="text">
	    </label>
	    <label>
	        <span>场地数量：</span>
	        <input name="amount" type="text" value='10'>
	    </label>
		<label>
	        <span>简介：</span>
	        <textarea name="intro" id="" cols="30" rows="10"></textarea>
	        

	        <!--编辑器在这里-->
	        <!-- <div style="float:right"><script id="myEditor" name="intro" type="text/plain" style="width:600px;height:230px;"></script></div> -->
      	</label>
      	<label>
	        <span>负责人：</span>
	        <input name="manager" type="text">
	    </label>
	    <label>
	        <span>*联系电话：</span>
	        <input name="tel" type="text">
	    </label>
      	<div style="clear:both"></div>
      	<br/><br/>

      	
			
	        <br/>
	        <br/>
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