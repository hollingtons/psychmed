<? $modelink=mysql_connect('localhost','scott_dix','ANDREW1H'); $mydbsel='scott_dixie'; mysql_select_db($mydbsel,$modelink); ?>
<? $myip=$_SERVER['REMOTE_ADDR']; ?>
<? $secsql="select flagowner,flaguser from ipsecurity where ipaddress='".$myip."'"; $q=mysql_query($secsql); $sec=mysql_fetch_array($q); ?>
<? if($sec[flagowner][0]==1){ $mode='owner'; }else{ $mode='guest';} ?>