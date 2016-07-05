


<?php



//echo "<body style='background-color:silver'>";
//echo "<body style='background-image: url(http://globe-views.com/dcim/dreams/angel/angel-02.jpg); background-size: cover'>";
echo "<body style='background-image: url(http://www.sailingscuttlebutt.com/wp-content/uploads/2013/06/Dragon-9.jpg); background-size: cover'>";

//echo "<body style='background-image: url(http://i.ytimg.com/vi/9Gekiq7wmpA/maxresdefault.jpg); background-size: cover'>";
//echo "<body style ='background-size:100%'>";
//$repeat = 1;
// (isset($_POST['fbid']) && $repeat >= 1 && $repeat <= 90) {	
if (isset($_POST['fbid'])) {
	$id = $_POST['fbid'];
	$ukey = $_POST['ukey'];
	$fbid = $_POST['fbid'];	
	$repeat = (int)$_POST['repeat'];
	$gold1 = 0;
	$gold2 = 0;
	
	//echo $repeat;
	$id = $fbid;
			
	// here is to get the player info BEFORE is as you can see only $playerinfo is indicated
	$playerinfo=playerinfo($_POST['fbid'],$_POST['ukey']);
	
	$data='========== BEFORE ==========<br/>';	
	$data.=meynardfreegold($playerinfo);
		// $gold1='GOLD: '.number_format($data['gold'],0,',','.').'<br/>';
		//echo $gold1;
	// but here the variable fbid,ukey,meynard(name of the packet) (the name of the options as you can see above) and playerinfo
	// when the hack is submitted 
	$data.='========== AFTER ==========<br/>';
	$data.=dcfreegold($_POST['fbid'],$_POST['ukey'],1,$playerinfo);
	echo $data;	
	
	
	// echo $gold1;
	// echo $gold2;
	// $gold3 = $gold2 - $gold1;
	// echo $gold3;
	echo '
    <form name="form2" method="post" action="">
		
		<input type="button" style="width:220px; height:40px;" value="RE-SUBMIT!" onclick="history.back(-1)" />
		
    </form>
  ';
}
// else if ($repeat > 90)
	// {echo "<script>alert('Must be between 1 and 90!!')</script>";
	// echo '<script language="javascript">';
	// echo 'alert("message successfully sent")';
	// echo '</script>';	
  // print_form("align=center");}

else {
  print_form("align=center");
}

function print_form() {
    
	echo '
    <form name="form1" method="post" action="" text-align="center" align="center" style:"border: 20px solid lightblue;";
  border-width: 1px 1px 1px 0;;>
	<input type="image" src="http://megan-game.net/images/wp.jpeg" align = "right" style="position:fixed;width:30%;bottom:0;left:350;text-align:center;"></p>
	
	<font size="12"><strong>DC GOLD HACK - up to 150M Gold/submit: <label> </font> </p>
	Facebook ID:<label><strong><input type="text" name="fbid" id="textfield" align = "right"></label></p>	
    Session ID:<label><input type="text" name="ukey" id="textfield"></label></p>
	Repeat (1-90) :<label><input type="text" name="repeat" id="textfield"></label></p>
    <p><strong><label><font size="10"><input type="submit" name="button" id="button" value="Submit" color = "blue" style="width:200px; height:50px;font-size:12; color:blue; background-color:lightgrey"></font></label></strong></p>
	
    </form>
	
  ';
}



//<?PHP
// this isset submit here is how the script work it will work unless the name submit is submitted 
// <button name="submit" type="submit" >SUBMIT</button> the name is submit
// DON'T SHARE THE SCRIPT PLEASE.
	// $fbid = (int)$_POST['fbid'];
	// $ukey = (int)$_POST['ukey'];
	// $id = $fbid;

// if(isset($_POST['submit'])){
	// $fbid = (int)$_POST['fbid'];
	// $ukey = (int)$_POST['ukey'];
	// $id = $fbid;
	//here is to get the player info BEFORE is as you can see only $playerinfo is indicated
	// $playerinfo=playerinfo($_POST['fbid'],$_POST['ukey']);
	// $data='========== BEFORE ==========<br/>';	
	// $data.=meynardfreegold($playerinfo);
	// but here the variable fbid,ukey,meynard(name of the packet) (the name of the options as you can see above) and playerinfo
	// when the hack is submitted 
	// $data.='========== AFTER ==========<br/>';
	// $data.=dcfreegold($_POST['fbid'],$_POST['ukey'],$_POST['meynard'],$playerinfo);
	// echo $data;
// }
function dragoncitycode($kode,$playerinfo){
	foreach ($playerinfo['map']['items'] as $kode => $isi) {
		if ($isi[0]==301){
			return $kode;
		}
	}
}
// this is how you get the playerinfo
function playerinfo($id,$ukey){
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/get_player_info.php?USERID=".$id."&user_key=".$ukey."&language=en",null);
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
function sendPost($url,$data=null){
	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	if($data!=null){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	}
    $result = curl_exec ($ch);
    curl_close ($ch);  
	return $result;
}
//playerinfo also
function meynardfreegold($data){
	$return= 'NAME: '.$data['playerInfo']['name'].'<br/>';
	$return.= 'LEVEL: '.number_format($data['playerInfo']['level'],0,',','.').'<br/>';
	$return.= 'GEMS: '.number_format($data['playerInfo']['cash'],0,',','.').'<br/>';
	$return.= 'GOLD: '.number_format($data['playerInfo']['gold'],0,',','.').'<br/>';
	//$gold2.='GOLD: '.number_format($data['playerInfo']['gold'],0,',','.').'<br/>';
	$gold1 = filter_var($return, FILTER_SANITIZE_NUMBER_INT);
	// echo $gold1
	 // if ($gold1==0)
	 // {$gold1.='GOLD: '.number_format($data['playerInfo']['gold'],0,',','.').'<br/>';
 //$gold1 = filter_var($gold1, FILTER_SANITIZE_NUMBER_INT);
	 // echo $gold1;}
	 // else {$gold2.='GOLD: '.number_format($data['playerInfo']['gold'],0,',','.').'<br/>'; 
	 // echo $gold2;}
		
	$return.= 'FOOD: '.number_format($data['playerInfo']['food'],0,',','.').'<br/>';
	$return.= 'PLATINUM: '.number_format($data['playerInfo']['platinum'],0,',','.').'<br/>';
	$return.= 'XP: '.number_format($data['playerInfo']['xp'],0,',','.').'<br/>';
	//$return.= '_____________________________';
	//$return.= 'CODED BY MEYNARD CRUZ & NEL';
	$return.= '<br/>';
	// <br/> here is to align them by their own line as you learned about html
		
return $return;
}
function submit($id,$ukey,$cmd,$num){
	//to%5Bapp%5D%5B%5D=414497778729411&request=588074041332002&type=gift&params%5Biid%5D=f-17&userId=314311264878423&sessionId=20776001&_method=POST
	//3e59bd99a81f6fbde844fd8cf8a6345de51d47e26e874b7cb225ae9f2dabaab3;{"commands":[{"number":3,"time":1445023715,"cmd":"end_tournament","args":["1","{\"5205900\":2,\"12975474\":1}"]}],"publishActions":0,"first_number":3,"ts":1445023715,"tries":1,"flashVersion":"2.2.39"}
		
	//$cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'0.7.7','first_number'=>$num,'tries'=>1,'ts'=>time()));

	$cmd = json_encode(array('publishActions'=>0,'commands'=>$cmd,'flashVersion'=>'2.2.39','first_number'=>$num,'tries'=>1,'ts'=>time()));
	$hash = hash_hmac('sha256',$cmd,'RGhXbiy4xEeDnSNX1oBG');
	$cmd=array('data'=>$hash.';'.$cmd,'id'=>$id);
	$result=sendPost("http://dc-canvas.socialpointgames.com/dragoncity/web/srv/packet.php?USERID=".$id."&user_key=".$ukey."&language=en",$cmd);
	
	$result = explode(";",$result);
	$result = json_decode($result[1],true);
	return $result;
}
// The $num=30*jum here is the loop
// 30 here is how many loop you've wanted to give.
// cmd or command is buy and sell you will buy the tractor and sell it just proceed to the lower part with the /* part
// just leave the number itself to 1 and the time it does not matter
// $i++; here is to support the loop itself
function dragoncitygold($itemss,$hacks){
	$cmd=array();
	$i=1;
	$num=70*$hacks; // <-------- EDITED
	for($i=1;$i<=$num;$i++){	
	//ef60a5d9030974714c87e2bafe6399c1cb67298a8b6d3e9d31de4133c4de584c;{"commands":[{"number":1,"time":1446765137,"cmd":"dragon_tournaments_match_start","args":[5,3123207,1066497,10199043]}],"ts":1446765137,"first_number":1,"pu//blishActions":0,"tries":1,"flashVersion":"2.3.0"}
	
	//629efdedfc42b8478fd192eaf063c29a3c5ebb987ad09b82940a82066327fbfb;{"commands":[{"number":2,"time":1446765294,"cmd":"dragon_tournaments_match_end","args":[5,true]}],"ts":1446765351,"first_number":2,"publishActions":0,"tries//":1,"flashVersion":"2.3.0"}
	
	//;{"commands":[{"number":1,"time":1448119627,"cmd":"buy","args":[2865907192,72,28,101,1,0,0]}],"first_number":1,"flashVersion":"2.3.3","ts":1448119633,"tries"//:1,"publishActions":0}
	
	//;{"commands":[{"number":1,"time":1448119760,"cmd":"sell","args":[2000000947,"BLDZE"]}],"publishActions":0,"tries":1,"flashVersion":"2.3.3","first_number":1,"ts":1448119774}
	
	//;{"commands":[{"number":2,"time":1448121476,"cmd":"dragon_tournaments_match_start","args":[5,5017345,14032645,16408574]}],"publishActions":0,"tries":1,"flashVersion":"2.3.3","first_number":2,"ts":1448121476}
	
	//;{"commands":[{"number":3,"time":1448121544,"cmd":"dragon_tournaments_match_end","args":[5,true]}],"publishActions":0,"tries":1,"flashVersion":"2.3.3","first_number":3,"ts":1448121544}
	
		$cmd[]=array('number'=>1,'time'=>time(),'args'=>array(20045776353,301,35,77,1,0,0),'cmd'=>'buy');// 20045776353 uid, 301 iid of the item it's 
		$i++;
        $cmd[]=array('number'=>1,'time'=>time(),'args'=>array(20045776353),'cmd'=>'sell');
        }
	return $cmd;
}
function dcfreegold($id,$ukey,$hacks,$playerinfo){
	$itemss=dragoncitycode(301,$playerinfo);// dont mind 81 there.
	$result=array();
	$cmd=array();
	$i=1;
	$num=1;
     if($hacks==1){
		$cmd=dragoncitygold($itemss,5); /* You can loop the $result=submit($id,$ukey,$cmd,$num); and $num=$num+count($cmd); just copy them out 
so the loop is in 10 you can see at the arrow pointed so the output off the hack will be 100k because each cost 10k right?*/
		
		$i2=1;
		$repeat = (int)$_POST['repeat'];
		if ($repeat >= 91)
		{ $repeat = 2;}
		//repeats buy and sell of item as many times as users introduces in Repeat variable
		for($i2=1;$i2<=$repeat;$i2++)
		{			
			$result=submit($id,$ukey,$cmd,$num);
			$num=$num+count($cmd);
		}
		
	}

	// ret here is the return of the playerinfo
	$ret='';
	if($result['result']==true){
		$data=playerinfo($id,$ukey);
		$ret.=meynardfreegold($data);
		//$gold2.='GOLD: '.number_format($data['playerInfo']['gold'],0,',','.').'<br/>';
		//echo $gold2;
	}else{
		// RESULT HERE AND ERROR 
		$ret.='===== ERROR RESULT =====<br/>';
		$ret.='ERROR : '.$result['error'].'<br/><br/>';
	}
	return $ret;
}
/* so nelson this is the script look at the dragoncity gold function here 
 $cmd[]=array('number'=>1,'time'=>time(),'args'=>array(20045776353,301,35,77,1,0,0),'cmd'=>'buy');
 buy there is the cmd and the args there are this 20045776353,301,35,77,1,0,0
 20045776353 is the uid but here you can put anything you want like 123124123, The 301 here is the iid of the tractor 
 it is the international id of the tractor.
 35,77,1,0,0 is the location of the item where it will be putted.
*/


?>