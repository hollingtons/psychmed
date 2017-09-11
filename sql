SELECT mednam generic,tradename,class,schedule,cost,startdose,max,
       depres,insom,panic,bipol,schizo,ADHD,PTSD,OCD,pain,comm FROM
 (select mednam,keyid pk FROM `ppgenmed`)a 
 inner join(select fkgenmed fk,val cost from ppgenmedprop where prop='cost')e on a.pk=e.fk
 left join(select fkgenmed fk,tradename from pptrdnam)b on a.pk=b.fk
 left join(select fkgenmed fk,val class from ppgenmedprop where prop='class')c on a.pk=c.fk
 left join(select fkgenmed fk,val schedule from ppgenmedprop where prop='schedule')d on a.pk=d.fk
 left join(select fkgenmed fk,val comm from ppgenmedprop where prop='comm')f on a.pk=f.fk
 left join(select fkgenmed fk,val depres from ppgenmedprop where prop='depres')g on a.pk=g.fk
 left join(select fkgenmed fk,val insom from ppgenmedprop where prop='insom')h on a.pk=h.fk
 left join(select fkgenmed fk,val startdose from ppgenmedprop where prop='dose')i on a.pk=i.fk
 left join(select fkgenmed fk,val max from ppgenmedprop where prop='max')j on a.pk=j.fk
 left join(select fkgenmed fk,val panic from ppgenmedprop where prop='panic')k on a.pk=k.fk
 left join(select fkgenmed fk,val bipol from ppgenmedprop where prop='bipol')l on a.pk=l.fk
 left join(select fkgenmed fk,val schizo from ppgenmedprop where prop='schizo')m on a.pk=m.fk
 left join(select fkgenmed fk,val ADHD from ppgenmedprop where prop='ADHD')n on a.pk=n.fk
 left join(select fkgenmed fk,val PTSD from ppgenmedprop where prop='PTSD')o on a.pk=o.fk
 left join(select fkgenmed fk,val OCD from ppgenmedprop where prop='OCD')p on a.pk=p.fk
 left join(select fkgenmed fk,val pain from ppgenmedprop where prop='pain')q on a.pk=q.fk
order by mednam