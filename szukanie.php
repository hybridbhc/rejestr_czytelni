<html>
<head>
<meta http-equiv="content-language" content="pl">
<title></title>
</head>

<body>
<form method="POST" >
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
	


</body>
</html>
<?php

   $polaczenie=mysql_connect("localhost","root","technol") or die(mysql_error());
   mysql_query("SET NAMES 'latin2'");
   mysql_select_db("rejestr",$polaczenie) or die (mysql_error());

   $n=mysql_fetch_row(mysql_query("SELECT MAX(id_czytelnika) FROM czytelnik",$polaczenie)) or die(mysql_error());
   $m=mysql_fetch_row(mysql_query(("SELECT MIN(id_czytelnika) FROM czytelnik"),$polaczenie))or die(mysql_error());




$uczen=mysql_query("SELECT imie,nazwisko,klasa,haslo,id_czytelnika
                    FROM czytelnik
                    Where klasa='$_POST[klasa_lista]'
                    ORDER BY nazwisko ASC",$polaczenie) or die (mysql_error());

$u=mysql_fetch_row($uczen) or die (mysql_error());
echo"$u[0]";


?>
