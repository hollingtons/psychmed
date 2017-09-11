<? /* generic name */ if(!(empty($_POST[chgname]))){
if($_POST[egn]=='000'){$q="INSERT INTO ppgenmed (`mednam`) VALUES ('".$_POST[chgname]."');"; $ex=mysql_query($q);
}else{$q="update ppgenmed set mednam='".$_POST[chgname]."' where keyid='".$_POST[egn]."'"; $ex=mysql_query($q); }} ?>

<? /* trade name */  if(!(empty($_POST[chgtrade])) and !($_POST[egn]=='000')){ 
if($_POST[etn]=='000'){$q="INSERT INTO pptrdnam(`tradename`,fkgenmed) VALUES ('".$_POST[chgtrade]."','".$_POST[egn]."');"; $ex=mysql_query($q);
}else{$q="update pptrdnam set tradename='".$_POST[chgtrade]."' where keyid='".$_POST[etn]."'"; $ex=mysql_query($q); }} ?>

<? /* property */  if(!(empty($_POST[chgprop])) and !(empty($_POST[pkey]))){
if($_POST[props]=='000'){$q="INSERT INTO ppprops(`propdesc`,keynam) VALUES ('".$_POST[chgprop]."','".$_POST[pkey]."');"; $ex=mysql_query($q);
}else{$q="update ppprops set propdesc='".$_POST[chgprop]."' where keyid='".$_POST[props]."'"; $ex=mysql_query($q); }} ?>

<? /* value */  if(!(empty($_POST[updval]))){$q="INSERT INTO ppgenmedprop(`prop`,val,fkgenmed) select keynam, '".$_POST[updval]."','".$_POST[egn]."' from ppprops where keyid='".$_POST[props]."';"; 
$ex=mysql_query($q); $q="update ppgenmedprop set val='".$_POST[updval]."' where fkgenmed='".$_POST[egn]."' and prop=(select keynam from ppprops where keyid='".$_POST[props]."')";
$ex=mysql_query($q); } ?>