<?php include ("./inc/header.inc.php"); ?>

<?php 
$submit = @$_POST['submit'];

$vards = ""; //Vārds
$uzvards = ""; //Uzvārds
$lietotajvards = ""; //Lietotājvārds
$epasts1 = ""; //Epasts
$epasts2 = ""; //Atkārtots epasts
$parole1 = ""; //Parole
$parole2 = ""; //Atkārtota parole
$d = ""; //Reģistrēšanās datums

$lietotaj_parb = ""; //Pārbauda vai lietotājvārds eksistē

$vards = strip_tags(@$_POST['vards']);
$uzvards = strip_tags(@$_POST['uzvards']);
$lietotajvards = strip_tags(@$_POST['lietotajvards']);
$epasts1 = strip_tags(@$_POST['epasts1']);
$epasts2 = strip_tags(@$_POST['epasts2']);
$parole1 = strip_tags(@$_POST['parole1']);
$parole2 = strip_tags(@$_POST['parole2']);
$d = date("G-m-d"); //Gads - mēnesis - diena

if ($submit) {
if ($epasts1==$epasts2) {
// Pārbauda vai lietotājs jau eksistē
$lietotaj_parb = mysql_query("SELECT lietotajvards FROM lietotaji WHERE lietotajvards='$lietotajvards'");
$check = mysql_num_rows($lietotaj_parb);
//Pābauda vai epasts eksistē DB
$e_check = mysql_query("SELECT epasts FROM lietotaji WHERE epasts='$epasts1'");
//Count the number of rows returned
$email_check = mysql_num_rows($e_check);
if ($check == 0) {
  if ($email_check == 0) {
//check all of the fields have been filed in
if ($vards && $uzvards && $lietotajvards && $epasts1 && $epasts2 && $parole1 && $parole2) {
// check that passwords match
if ($parole1==$parole2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($lietotajvards)>25||strlen($vards)>25||strlen($uzvards)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($parole1)>30||strlen($parole1)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$parole1 = md5($parole1);
$parole2 = md5($parole2);
$query = mysql_query("INSERT INTO lietotaji VALUES ('','$lietotajvards','$vards','$uzvards','$epasts1','$parole1','$d','0')");
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
 echo "Sorry, but it looks like someone has already used that email!";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
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
	<h1> .</h1>
<?php include ("./inc/footer.inc.php"); ?>