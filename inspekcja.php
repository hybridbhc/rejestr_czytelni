<?php
   $polaczenie=mysql_connect("localhost","root","technol") or die(mysql_error());
   mysql_query("SET NAMES 'latin2'");
   mysql_select_db("rejestr",$polaczenie) or die (mysql_error());
   $liczba_czytelnikow=mysql_query("Select Min(id_wizyty),Max(id_wizyty),Count(id_wizyty)
                         From wiyzta
                         Where data='2011-11-17'",$polaczenie)or die (mysql_error());
   $szuka_wizyt=mysql_fetch_row($liczba_czytelnikow);
   $pierwsza_wizyta=($szuka_wizyt[0]);
   $ostatnia_wizyta=($szuka_wizyt[1]);
   echo"$ostatnia_wizyta";

   for($i=$pierwsza_wizyta;$i<=$ostatnia_wizyta;i++){
   $odwiedziny=mysql_query("Select nazwisko_czyt, imie_czyt,klasa_czyt,godzina,data
                            From wizyta
                            Where (Select Timediff('now()',godzina)
                            From wizyta)<='00:20:00' Where id_wizyty=$i",$polaczenie) or die(mysql_error());
   $odwiedzajacy=mysql_fetch_row($odwiedziny);
   echo"$odwiedzajacy[3]";}

   

?>

