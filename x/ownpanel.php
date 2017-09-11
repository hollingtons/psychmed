<? $qgen=mysql_query($gensql); ?>generic name
<select name="egn"><option value="000">empty</option>
<? $prevmed='empty'; ?>
<? while($row = mysql_fetch_assoc($qgen)){if(!($prevmed==$row[mednam])){ ?>
   <option value='<? echo $row[keyid]; ?>' <? if($_POST[egn]==$row[keyid]){ ?> selected='selected' <? } ?> ><? echo $row[mednam]; ?></option>
<? $prevmed=$row[mednam];}}  ?>
</select> new generic name <textarea rows="1" cols="40" name="chgname"></textarea><br>

<? $qgen=mysql_query($gensql); ?>trade name
<select name="etn"><option value="000">empty</option>
<? $prevmed='empty'; ?>
<? while($row = mysql_fetch_assoc($qgen)){ ?>
<?  if(!(empty($row[tradename])) and !($prevmed==$row[mednam])){ echo "<option value='".$row[trdid]."'>".$row[tradename]."</option>"; $prevmed=$row[mednam];}}  ?>
</select> new trade name <textarea rows="1" cols="40" name="chgtrade"></textarea><br>

<? $qprop=mysql_query($prpsql); ?>property
<select name="props"><option value="000">empty</option>
<? while($row = mysql_fetch_assoc($qprop)){ ?>
   <option value='<? echo $row[keyid]; ?>' <? if($_POST[props]==$row[keyid]){ ?> selected='selected' <? } ?> ><? echo $row[propdesc]; ?></option>
<? } ?>
</select> update property <textarea rows="1" cols="40" name="chgprop"></textarea> newkey <textarea rows="1" cols="10" name="pkey"></textarea><br>

value <textarea rows="1" cols="40" name="updval"></textarea>
 . . . 
<button name="sortbutton" value="wip" type="submit" formmethod="post">edit cost</button> . . .
<button name="sortbutton" value="eds" type="submit" formmethod="post">edit class</button> . . .
<button name="sortbutton" value="edd" type="submit" formmethod="post">edit dose</button>
