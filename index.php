<html>
<head>
<meta http-equiv="content-language" content="pl">
<title></title>
</head>

<body style="background-color:#F4F4F4">
<div style="background-color:blue;margin:0px;"><center style="font-family : EFN Meduse White; font-size:50px;color:white;">Rejestr odwiedzin Czytelni Multimedialnej</center></div><hr style="color:#FF8040;margin-top:0px;margin-bottom:20px;">





<div style="margin-top:0px;margin-right:0px;float:left;color : blue; font-family : Corbel; font-size : 17px; "><div style="text-color:blue;width:600px;">Wyszukaj swoje nazwisko na li¶cie i wpisz swoje has³o obok:</div><br />




<?php    //Wizyta

   $polaczenie=mysql_connect("localhost","root","technol") or die(mysql_error());
   mysql_query("SET NAMES 'latin2'");
   mysql_select_db("rejestr",$polaczenie) or die (mysql_error());

   $n=mysql_fetch_row(mysql_query("SELECT MAX(id_czytelnika) FROM czytelnik",$polaczenie)) or die(mysql_error());
   $m=mysql_fetch_row(mysql_query(("SELECT MIN(id_czytelnika) FROM czytelnik"),$polaczenie))or die(mysql_error());
   if($_POST[klasa_lista]!=''){
   $uczen=mysql_query("SELECT imie,nazwisko,klasa,haslo,id_czytelnika
                       FROM czytelnik
                       WHERE klasa='$_POST[klasa_lista]'
                       ORDER BY nazwisko ASC",$polaczenie) or die (mysql_error());}
   else{
   $uczen=mysql_query("SELECT imie,nazwisko,klasa,haslo,id_czytelnika
                       FROM czytelnik
                       ORDER BY nazwisko ASC",$polaczenie) or die (mysql_error());}



   while($dane_listy=mysql_fetch_array($uczen)){//Wyswietla liste zarejestrowanych

      if(empty($_POST[pass]))//Wyswietla komunikat
         {echo"<div style=\"width:200px;padding:0px;text-align:center;\">
         <fieldset style=\"width:200px;height:30px;padding:0px;border-color:white;border-width:3px;border-style:double;\"><legend style=\"font-size:auto;margin:0px;\"><b>$dane_listy[0] $dane_listy[1]</b> $dane_listy[2]</legend><form action=\"$PHP_SELF\" method=\"post\">
         <div style=\"text-align:center;width:auto;font-size:12px;color:#FF8040;margin:0px\">Wpisz swoje has³o</div>
         <input type=\"password\" name=\"pass\" maxlength=\"10\" size=\"10\" style=\"font-size:16px;color:#FF8040;background-color:white;border-width:1px;border-style:solid;border-color:#F27900;\"/>
         <input type=\"hidden\" name=\"im\" value=\"$dane_listy[0]\" />
         <input type=\"hidden\" name=\"nazw\" value=\"$dane_listy[1]\" />
         <input type=\"hidden\" name=\"klas\" value=\"$dane_listy[2]\" />
         <input type=\"hidden\" name=\"id\" value=\"$dane_listy[4]\" />
         <input type=\"submit\" value=\"Wpisz siê\" style=\"cursor:hand;font-size:16px;color:white;background-color:#FF8040;border:0px;margin:0px\"/>
         </form></fieldset></div>";
          }
      elseif(($_POST[pass]!=$dane_listy[3]))
         {echo"<div style=\"width:200px;padding:0px;text-align:center;\">
         <fieldset style=\"width:200px;height:30px;padding:0px;border-color:white;border-width:3px;border-style:double;\"><b>$dane_listy[0] $dane_listy[1]</b> $dane_listy[2]</legend><form action=\"$PHP_SELF\" method=\"post\">
         <div style=\"text-align:center;width:auto;font-size:12px;color:red;margin:0px\">Has³o jest nieprawid³owe</div>
         <input type=\"password\" name=\"pass\" maxlength=\"10\" size=\"10\" style=\"font-size:16px;color:#FF8040;background-color:white;border-width:1px;border-style:solid;border-color:red;\"/>
         <input type=\"hidden\" name=\"im\" value=\"$dane_listy[0]\" />
         <input type=\"hidden\" name=\"nazw\" value=\"$dane_listy[1]\" />
         <input type=\"hidden\" name=\"klas\" value=\"$dane_listy[2]\" />
         <input type=\"hidden\" name=\"id\" value=\"$dane_listy[4]\" />
         <input type=\"submit\" value=\"Wpisz siê\" style=\"cursor:hand;font-size:16px;color:white;background-color:#FF8040;border:0px;margin:0px\"/>
         </form></fieldset></div>";
         }
      elseif(($_POST[pass]=$dane_listy[3]))
         {echo"<div style=\"width:200px;padding:0px;text-align:center;\">
         <fieldset style=\"width:200px;height:30px;padding:0px;border-color:white;border-width:3px;border-style:double;color:green;\"><b>$dane_listy[0] $dane_listy[1]</b> $dane_listy[2]</legend>
         <div style=\"text-align:center;width:auto;font-size:18px;color:green;margin:0px\">Zosta³e¶ wpisany na listê</div>
         </fieldset></div>";

         mysql_query("Insert Into wizyta(imie_czyt,nazwisko_czyt,klasa_czyt,data,godzina,nr_stanowiska)
                       Values('$dane_listy[0]','$dane_listy[1]','$dane_listy[2]',now(),now(),'1')")
                       or die (mysql_error());
         }
      };



?>
</div>


<div style="width:260px;margin-top:20px;margin-right:0px;float:right;color : blue; font-family : Corbel; font-size : 17px; "><b>Szybsze wyszukiwanie:</b><br><hr />Wybierz, z której klasy jeste¶..
<form method="POST" onsubmit="if(this.klasa_lista.value==''){alert('Wybierz klasê!!'); return false}">
   <select name="klasa_lista">
		<option value="" selected="selected" disabled="disabled">Z której klasy?</option>
            <option value="4a">4a</option>
		<option value="4b">4b</option>
		<option value="4c">4c</option>
		<option value="4d">4d</option>
	      <option value="5a">5a</option>
		<option value="5b">5b</option>
		<option value="5c">5c</option>
		<option value="5d">5d</option>
		<option value="6a">6a</option>
		<option value="6b">6b</option>
		<option value="6c">6c</option>
		<option value="6d">6d</option>
		<option value="6e">6e</option>
   </select>
   <input type="submit" value="Poka¿"/>
</form>

<div style="margin-top:20px;margin-bottom:0px;"><div style="color:red;font-size:30px;margin-top:0px;">Nie ma Ciê na li¶cie?</div><b>Zarejestruj siê!<hr></b>
<form method=post action="rejestracja_ucz.php" onsubmit="if(this.imie.value=='')
      {alert('Brak imienia. Wype³nij wszystkie pola!!');return false} if(this.nazwisko.value=='')
      {alert('Brak nazwiska. Wype³nij wszystkie pola!!'); return false} if(this.haslo.value=='')
      {alert('Brak has³a. Wype³nij wszystkie pola!!'); return false} if(this.haslo2.value=='')
      {alert('Potwierdzenia has³a. Wype³nij wszystkie pola!!'); return false} if(this.haslo.value != this.haslo2.value)
      {alert('?le powtórzone has³o!!'); return false}
      if(this.klasa.value==''){alert('Wybierz klase. Wype³nij wszystkie pola!!'); return false}"
      onreset="if(!confirm('Jeste? pewny ¿e chcesz wyczy?ciæ formularz?')) return false" >

  Imiê czytelnika<br><input type="text" name="imie" size="20" maxlength="20" style="text-transform:capitalize;"/><br />
  Nazwisko czytelnika<br><input type="text" name="nazwisko" size="35" maxlength="35" style="text-transform:capitalize;"/><br />
  Has³o do konta<br><input type="password" name="haslo" size="10" maxlength="10"/><br />
  Potwierdzenie has³a<br><input type="password" name="haslo2" size="10" maxlength="10"/><br />
  Klasa<br />
  <select name="klasa">
		<option value="" selected="selected" disabled="disabled">Z której klasy?</option>
            <option value="4a">4a</option>
		<option value="4b">4b</option>
		<option value="4c">4c</option>
		<option value="4d">4d</option>
	      <option value="5a">5a</option>
		<option value="5b">5b</option>
		<option value="5c">5c</option>
		<option value="5d">5d</option>
		<option value="6a">6a</option>
		<option value="6b">6b</option>
		<option value="6c">6c</option>
		<option value="6d">6d</option>
		<option value="6e">6e</option>
	</select>

  <div><input style="float:left" type="submit" value="Zapisz" /></div>
<div><input style="float:right;margin-right:0px" type="reset" value="Wyczy¶æ" /><br></div>
  </form></div>

 <?php   //REJESTRACJA
if(!empty ($_POST[imie])&&($_POST[nazwisko])&&($_POST[haslo])&&($_POST[haslo2])){
$polaczenie=mysql_connect("localhost","root","technol") or die (mysql_error());
mysql_query("SET NAMES 'latin2'");
mysql_select_db("rejestr",$polaczenie) or die (mysql_error());

$wynik=("select nazwisko,imie
         from czytelnik
         where imie='$_POST[imie]' AND nazwisko='$_POST[nazwisko]'");
$szukana=mysql_query($wynik,$polaczenie) or die(mysql_error());
$szuk=mysql_num_rows($szukana);

if($szuk<>0){echo"<center>Uczeñ ten ju¿ jest zarejestrowany!</center>";exit();}

   $imie=ucwords($_POST[imie]);
   $nazwisko=ucwords($_POST[nazwisko]);
   $dodaj_czytelnika="INSERT INTO czytelnik(imie,nazwisko,klasa,haslo)
   VALUES ('$imie','$nazwisko','$_POST[klasa]','$_POST[haslo]')";
   $dodano=mysql_query($dodaj_czytelnika,$polaczenie) or die (mysql_error());


//printf("Last inserted record has id %d\n", mysql_insert_id());
$id_czytelnika=mysql_insert_id();
if($dodano){
$wyn=("SELECT * FROM czytelnik
WHERE id_czytelnika=$id_czytelnika");
$wynik1=mysql_query($wyn,$polaczenie) or die(mysql_error());
$szuk1=mysql_fetch_row($wynik1);

echo"<center><h1>Zarejestrowano u¿ytkownika:</h1> <br><br /><br /><br /><br /><br /><br /><br /><br />
<b text-color=\"red\">Przepisz lub zapamiêtaj poni¿sze informacje, bêd± niezbêdne do nastêpnego logowania!!</b><br /><br /><br />
Imiê: <b>$szuk1[1]</b><br>
Nazwisko: &nbsp<b>$szuk1[2]</b><br>
Klasa: &nbsp<b>$szuk1[3]</b><br>
Has³o: &nbsp<b>$szuk1[4]</b><br><br />";
echo"<a href=\"index.php\">Wpisz siê na listê...</a></center>";
}
else{echo"<center>Czytelnik nie zosta³ dodany do listy. <a href=\"index.php\">Spróbuj jeszcze raz</a>, albo zawo³aj bibliotekarza!!</center>";
exit();
} }
else{exit();}

?>


</div>

</body>
</html>
