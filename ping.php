<?php 
$ip = $_GET["ip"];
$id = $_GET["id"];
	if (PATH_SEPARATOR==':')
	{
	    exec("ping $ip -c 4",$info);  
	    if (count($info) < 9)  
	    {  
	    	echo json_encode(array("id"=>$id,"ping"=>10000));
	    }  
	    //获取ping的时间  
	    $str = $info[count($info)-1];  
	    echo json_encode(array("id"=>$id,"ping"=>round(substr($str, strpos($str,'/',strpos($str,'='))+1 , 4))));
	}  
	else //windows
	{
	    exec("ping $ip -n 4",$info);
	    if (count($info) < 10)  
	    {
	    	echo json_encode(array("id"=>$id,"ping"=>10000));
	    }
	    //获取ping的时间  
	    $str = $info[count($info)-1];
	    echo json_encode(array("id"=>$id,"ping"=>substr($str,  strripos($str,'=')+1)));
	}
?>