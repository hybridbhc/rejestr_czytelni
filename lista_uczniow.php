<?php

   $polaczenie=mysql_connect("localhost","root","") or die(mysql_error());
   mysql_query("SET NAMES 'latin2'");
   mysql_select_db("rejestr",$polaczenie) or die (mysql_error());

   $n=mysql_num_rows(mysql_query("SELECT * FROM czytelnik",$polaczenie));
   //echo"$n";
   for($i=1;$i<=$n;$i++){
   $uczen=mysql_query("SELECT imie,nazwisko,klasa,haslo
                       FROM czytelnik
                       WHERE id_czytelnika=$i Order by nazwisko",$polaczenie);
   $dane_listy=mysql_fetch_row($uczen);
   echo"<center><b>$dane_listy[0] $dane_listy[1]</b> $dane_listy[2]<form action=\"$PHP_SELF\" method=\"post\">
                          <input type=\"password\" name=\"pass\"/>
                          <input type=\"hidden\" name=\"im\" value=\"$dane_listy[0]\" />
                          <input type=\"hidden\" name=\"nazw\" value=\"$dane_listy[1]\" />
                          <input type=\"hidden\" name=\"klas\" value=\"$dane_listy[2]\" />
                          <input type=\"hidden\" name=\"hasl\" value=\"$dane_listy[3]\" />
                          <input type=\"submit\" value=\"Wpisz si�\"/></form></center>";}

   $wywo�anie_danych=mysql_query("Select imie,nazwisko,klasa
                                  From czytelnik
                                  Where imie='$_POST[im]' AND nazwisko='$_POST[nazw]' AND klasa='$_POST[klas]'
                                  AND haslo='$_POST[hasl]'",$polaczenie)
                                  or die ("Has�o jest nieprawid�owe <br> <a href=\"index.html\">
                                  Wpisz has�o jeszcze raz!!</a>");

   $dane=mysql_fetch_row($wywo�anie_danych);
   echo"<center>$dane[0] $dane[1] $dane[2]</center>";

   if(!$dane){echo"Przykro mi has�o jest nieprawid�owe";exit();}
   mysql_query("Insert Into wizyta(imie_czyt,nazwisko_czyt,klasa_czyt,data,godzina,nr_stanowiska)
      Values('$dane[0]','$dane[1]','$dane[2]',now(),now(),'1')") or die (mysql_error());

?>

