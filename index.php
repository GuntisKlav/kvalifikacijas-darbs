<?php include ("./inc/header.inc.php"); ?>
 
<?php 
$submit = @$_POST['submit'];

$vards = ""; //Vārds
$uzvards = ""; //Uzvārds
$lietotajvards = ""; //Lietotājvārds
$epasts1 = ""; //Epasts
$epasts2 = ""; //Atkārtots epasts
$parole1 = ""; //Parole
$prole2 = ""; //Atkārtota parole
$datums = ""; //Reģistrēšanās datums

$lietotaj_parb = ""; //Pārbauda vai lietotājvārds eksistē

$vards = strip_tags(@$_POST['vards']);
$uzvards = strip_tags(@$_POST['uzvards']);
$lietotajvards = strip_tags(@$_POST['lietotajvards']);
$epasts1 = strip_tags(@$_POST['epasts1']);
$epasts2 = strip_tags(@$_POST['epasts2']);
$parole1 = strip_tags(@$_POST['parole1']);
$parole2 = strip_tags(@$_POST['parole2']);
$d = date("G-m-d"); //Gads - mēnesis - diena

if($submit){
	if ($epasts1 == $epasts2) {
		//Pārbauda vai lietotājs jau eksistē
		$lietotaj_parb = mysql_query("SELECT lietotajvards FROM lietotaji WHERE lietotajvards = '$lietotajvards'");

		//Izskaita rindas kur lietotājvārds = $lietotajvards
		$rindu_parbaude = mysql_num_rows($lietotaj_parb);
		if ($rindu_parbaude == 0) {
//Pārbauda, vai visi lauki ir aizpildīti
			if ($vards&&$uzvards&&$lietotajvards&&$epasts1&&$epasts2&&$parole1&$parole2) {
				//Pārbauda, vai paroles sakrīt
				if($parole1 == $parole2){
if (strlen($lietotajvards)>25||strlen($vards)>25||strlen($uzvards>25)) {
	echo "Maksimālais simbolu skaits vārdam, uzvārdam un lietotājvārdam ir 25 simboi!";
}
else
{
if (strlen($parole1)>30||strlen($parole1)<5) {
	echo "Parolei jābūt garakai par 5 simboliem un mazākai nekā 30 simboli!";
}
else
{
$parole1 = md5($parole1);
	$parole2 = md5($parole2);
	$query = mysql_query("INSERT INTO lietotaji VALUES('', '$lietotajvards', '$vards', '$uzvards', $epasts1, '$parole1', '$datums', '0')");
	die("<h2>Laipni lūgts Mountain Maniacs</h2> Ielogojies savā kontā, lai sāktu...");
}
}
}
else{
echo "Paroles nesakrīt!";
}		
}

else{
echo "Lūdzu aizpildi visus laukus!";
}		
}

else{
echo "Šāds lietotājvārds jau pasāv!";
}
}

else{
echo "Epasti nesakrīt!";
}
}






?>
	<div id="register">
	<form action="#" method="POST">
		<input type="text" name="vards" placeholder=" Vārds"><br>
		<input type="text" name="uzvards" placeholder=" Uzvārds"><br>
		<input type="text" name="lietotajvards" placeholder=" Lietotājvārds"><br>
		<input type="email" name="epasts1" placeholder=" TavsEpasts@gmail.com"><br>
		<input type="email" name="epasts2" placeholder=" Atkārtots E-pasts"><br>
		<input type="password" name="parole1" placeholder=" Parole"><br>
		<input type="password" name="parole2" placeholder=" Atkārtota parole"><br>
		<input type="submit" name="submit" placeholder="Reģistrēties">
	</form>	
	</div>
	</div>
<?php include ("./inc/footer.inc.php"); ?>