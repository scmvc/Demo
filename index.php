<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>线路选择</title>
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
		div{
			width: 230px;
			height: 42px;
			float: left;
			text-align: center;
			line-height: 42px;
			border: 1px solid black;
			margin-top: 10px;
			margin-left: 10px;
		}
		#content{
			width: 726px;
			height: 162px;
			position: absolute;
			top: 50%;
			left: 50%;
			border: 0px;
			margin-top: -81px;
			margin-left: -363px;
		}
	</style>
</head>
<body>
	<div id="content">
		<div id="0">线路1  </div>
		<div id="1">线路2  </div>
		<div id="2">线路3  </div>
		<div id="3">线路4  </div>
		<div id="4">线路5  </div>
		<div id="5">线路6  </div>
		<div id="6">线路7  </div>
		<div id="7">线路8  </div>
		<div id="8">线路9  </div>
	</div>
</body>
<script type="text/javascript">
	var ipArray = new Array();
	ipArray[0] = new Array();
	ipArray[0][0] = "103.48.4.98";
	ipArray[0][1] = 100000;
	ipArray[1] = new Array();
	ipArray[1][0] = "103.48.4.99";
	ipArray[1][1] = 100000;
	ipArray[2] = new Array();
	ipArray[2][0] = "103.48.4.100";
	ipArray[2][1] = 100000;
	ipArray[3] = new Array();
	ipArray[3][0] = "103.82.213.86";
	ipArray[3][1] = 100000;
	ipArray[4] = new Array();
	ipArray[4][0] = "103.82.213.87";
	ipArray[4][1] = 100000;
	ipArray[5] = new Array();
	ipArray[5][0] = "103.82.213.88";
	ipArray[5][1] = 100000;
	ipArray[6] = new Array();
	ipArray[6][0] = "103.233.97.104";
	ipArray[6][1] = 100000;
	ipArray[7] = new Array();
	ipArray[7][0] = "103.233.97.105";
	ipArray[7][1] = 100000;
	ipArray[8] = new Array();
	ipArray[8][0] = "103.233.97.106";
	ipArray[8][1] = 100000;
	<?php 
		$ipArray[] = "103.48.4.98";
		$ipArray[] = "103.48.4.99";
		$ipArray[] = "103.48.4.100";
		$ipArray[] = "103.82.213.86";
		$ipArray[] = "103.82.213.87";
		$ipArray[] = "103.82.213.88";
		$ipArray[] = "103.233.97.104";
		$ipArray[] = "103.233.97.105";
		$ipArray[] = "103.233.97.106";
		foreach ($ipArray as $key => $value) {
	 ?>
		$.getJSON("ping.php?ip=<?=$value?>&id=<?=$key?>",function(res){
			$("#"+res["id"]).append(res["ping"]+"ms");
			ipArray[res["id"]][1] = res["ping"];
		})
		<?php
	}
		?>
function loadTarget(){
	var ms = new Array();
	ms[0] = "";
	ms[1] = 10000;
	var flag = false;
	for (var i = 0; i < ipArray.length; i++) {
		if(ipArray[i][1]!=100000){
			flag = true;
		}else{
			flag = false;
		}
	}
	if(flag == true){
		for (var j = 0; j < ipArray.length; j++) {
			if(ms[1]>ipArray[j][1]){
				ms[0] = ipArray[j][0];
				ms[1] = ipArray[j][1];
			}
		}
		window.location.href="http://"+ms[0];
	}
}
window.setInterval("loadTarget()",1000);
</script>
</html>