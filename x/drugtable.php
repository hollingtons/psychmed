<table class="fixed_headers">
<thead><tr><th>generic<div>generic</div></th><th>trade<div>trade</div></th>
<? while($row=mysql_fetch_assoc($qprop)){
  if(!($row[keynam]=='schedule') and !($row[keynam]=='comm') and !($row[keynam]=='max') and !($row[keynam]=='dose')){?>
   <th><div><button formmethod="post" name="sortbutton" value="<? echo $row[keynam]; ?>" type="submit"><? echo $row[keynam]; ?></button></div></th><?}}?>
</tr></thead>
<tbody>
<? $prevmed='empty'; $bgcolorct=1; ?>
<? while($row = mysql_fetch_assoc($qgen)){ ?>
<?  if($prevmed==$row[mednam]){}else{ $bgcolorct=$bgcolorct+1; ?>
       </tr><tr  <? if(!($row[sdlval]=='No')){ ?> bgcolor="LIGHTYELLOW" <? }elseif($bgcolorct % 2 == 0){ ?> bgcolor="GREY" <? }else{ ?> bgcolor="DARKGREY" <? } ?>>
        <td>
 <button 
             OnClick=alert("<? echo $row[mednam]; ?>\n<? echo $row[tradename]; ?>\nschedule\u0020<? echo $row[sdlval]; ?>\nstarting\u0020dose\u0020<? echo $row[dddval]; ?>\nmax\u0020dose\u0020<? echo $row[mmmval]; ?>\n<? echo $row[cccval]; ?>"); 
            ><? echo $row[mednam]; ?></button></td><td><? echo $row[tradename];  ?>


</td>
<?  } ?>
<?  echo '<td>'.$row[xval].'</td>'; ?>
<? $prevmed=$row[mednam]; ?>
<? }  ?>
</tr>
</tbody>
</table>