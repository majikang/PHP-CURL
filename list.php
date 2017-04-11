<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>公积金查询系统</title>
<style>
#user_list li{position:relative;left:0;top:0;height:auto;}
#user_list li div.info{width:580px; margin:5px;}
div.info table{border-collapse: collapse;}
div.info table,div.info td{border:1px solid #ccc;}
</style>
<script type="text/javascript" src="jquery1.7.js"></script>
</head>
<body><?php
$info=array(
	"职工姓名"=>"222222222222222222",
	"职工账号"=>"222222222222222222"
);
?>
<ul id="user_list"><?php
foreach($info as $k=>$v){
	echo "<li><a href=\"javascript:void(0);\" data=\"$v\">$k</a></li>";
}
?></ul>
<script type="text/javascript">
jQuery(function($){
	var links=$("#user_list a");
	links.toggle(function(){
		var _this=$(this),html=_this.data("info");
		if(!html){
			$.get("getpost.php?_="+(+new Date())+"&id="+_this.attr("data"),function(txt){
				txt='<div class="info">'+txt+'</div>';
				_this.data("info",txt);
				var result=$(txt);
				result.appendTo(_this.parent());
				result.show("slow");
			});
		}else{
			_this.next().show("slow");
			
		}
	
	},
	function(){
		$(this).next().hide("slow");
		
	}
	
	);
	
});
</script>
</body>
</html>
