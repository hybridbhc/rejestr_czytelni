 <?php
$polaczenie=mysql_connect("localhost","root","technol") or die (mysql_error());
mysql_query("SET NAMES 'latin2'");
mysql_select_db("rejestr",$polaczenie) or die (mysql_error());

$wynik=("select nazwisko,imie
         from czytelnik
         where imie='$_POST[imie]' AND nazwisko='$_POST[nazwisko]'");
$szukana=mysql_query($wynik,$polaczenie) or die(mysql_error());
$szuk=mysql_num_rows($szukana);

if($szuk<>0){echo"<center>Ucze� ten ju� jest zarejestrowany!</center>";exit();}

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

echo"<center><h1>Zarejestrowano u�ytkownika:</h1> <br><br /><br /><br /><br /><br /><br /><br /><br />
<b style=\"color : #ff0000\">Przepisz lub zapami�taj poni�sze informacje, b�d� niezb�dne do nast�pnego logowania!!</b><br /><br /><br />
Imi�: <b>$szuk1[1]</b><br>
Nazwisko: &nbsp<b>$szuk1[2]</b><br>
Klasa: &nbsp<b>$szuk1[3]</b><br>
Has�o: &nbsp<b>$szuk1[4]</b><br><br />";
echo"<a href=\"index.php\">Wpisz si� na list�...</a></center>";
}
else{echo"<center>Czytelnik nie zosta� dodany do listy. <a href=\"index.php\">Spr�buj jeszcze raz</a>, albo zawo�aj bibliotekarza!!</center>";
exit();
}

?>
