<? $link=mysql_connect('localhost','scott_pp','andrew'); $mydbsel='scott_psypharm'; mysql_select_db($mydbsel,$link); ?>
<? $gensql="select keyid,mednam,trdid,tradename,sdlval,cccval,dddval,mmmval,keynam,propdesc,propid,xval,xprop,xkey FROM
            (select keyid,mednam,trdid,tradename,sdlval,cccval,dddval,mmmval,keynam,propdesc,propid from
             (select keyid,mednam,trdid,tradename,ifnull(sdlval,'No') sdlval,cccval,dddval,mmmval from(
select keyid,mednam,trdid,tradename from(SELECT keyid,mednam from ppgenmed)a 
              left join(SELECT fkgenmed,keyid trdid,tradename FROM `pptrdnam`)b on a.keyid=b.fkgenmed where mednam not like '@%'
union
select keyid,tradename mednam,trdid,tradename from(SELECT keyid,mednam from ppgenmed)i 
              left join(SELECT fkgenmed,keyid trdid,tradename FROM `pptrdnam`)j on i.keyid=j.fkgenmed where mednam like '@%')k
              left join(SELECT val sdlval,fkgenmed FROM `ppgenmedprop` where prop in ('schedule'))c on k.keyid=c.fkgenmed
              left join(SELECT val cccval,fkgenmed FROM `ppgenmedprop` where prop in ('comm'))l on k.keyid=l.fkgenmed
              left join(SELECT val dddval,fkgenmed FROM `ppgenmedprop` where prop in ('dose'))m on k.keyid=m.fkgenmed
              left join(SELECT val mmmval,fkgenmed FROM `ppgenmedprop` where prop in ('max'))n on k.keyid=n.fkgenmed)d,
             (select keynam,propdesc,keyid propid from ppprops where keynam not in ('schedule','comm','dose','max'))e)f
            left join(select val xval,prop xprop,fkgenmed,keyid xkey from ppgenmedprop where prop not in ('schedule','comm','dose','max'))g
             on (g.fkgenmed=f.keyid and g.xprop=f.keynam)";

   if($_POST[sortbutton]=='usa'){$gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop='cost')h on h.fk=f.keyid where h.fk is not null order by mednam,keynam";}
   if($_POST[sortbutton]=='wip'){$gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop='cost')h on h.fk=f.keyid where h.fk is null order by mednam,keynam";}
   if($_POST[sortbutton]=='edd'){$gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop='cost')h on h.fk=f.keyid  
                                           left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop in('max'))i on i.fk=f.keyid
                                           left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop in('dose'))j on j.fk=f.keyid where h.fk is not null and (i.fk is null or j.fk is null)order by mednam,keynam"; }
   if($_POST[sortbutton]=='eds'){$gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop='cost')h on h.fk=f.keyid  
                                           left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val is not null and prop='class')i on i.fk=f.keyid where h.fk is not null and i.fk is null order by mednam,keynam";}
   if(!(empty($_POST[sortbutton])) and !($_POST[sortbutton]=='all') and !($_POST[sortbutton]=='prm') and !($_POST[sortbutton]=='act') and !($_POST[sortbutton]=='usa')
                                   and !($_POST[sortbutton]=='wip') and !($_POST[sortbutton]=='edd') and !($_POST[sortbutton]=='eds')
     ){$gensql.=" left join(select distinct fkgenmed fk,val from ppgenmedprop 
        where val is not null and prop='".$_POST[sortbutton]."')h on h.fk=f.keyid where h.fk is not null order by h.val,mednam,keynam"; }
   if($_POST[sortbutton]=='all'){$gensql.="order by mednam,keynam"; }
   if($_POST[sortbutton]=='prm'){$gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val in('prim','best'))h on h.fk=f.keyid where h.fk is not null order by mednam,keynam";}
   if($_POST[sortbutton]=='act' or empty($_POST[sortbutton])){
      $gensql.=" left join(select distinct fkgenmed fk from ppgenmedprop 
                                where val in('sec','prim','best'))h on h.fk=f.keyid where h.fk is not null order by mednam,keynam";}
   $qgen=mysql_query($gensql); ?>
<? $prpsql="SELECT keyid,keynam,propdesc FROM `ppprops` order by keynam"; $qprop=mysql_query($prpsql); ?>
