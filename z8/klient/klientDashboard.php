<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
header('Location: /z8/klient/klientLogin.php'); 
exit();

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
table, th, td {
  border:1px solid black;
}
</style>
    <title>Jackowski</title></head>

  <body>
  Witaj <?php echo $_SESSION ['usersession']?>!
<a href ="klientLogin.php">Wyloguj</a>


<form method="POST" action="addPytanie.php" enctype='multipart/form-data'><br>
Zadaj pytanie:<br>
<input type="text" name="post" maxlength="90" size="50"><br>
<label for="temat">Wybierz temat:</label>
<select name="temat" id="temat">
  <option value="1">Problem z polaczeniem</option>
  <option value="2">nie zgodnosc produktu z reklama</option>
  <option value="3">cos</option>
</select>
<br>
<input type="submit" value="Wyślij"/>
</form>



<?php
include 'dbConn.php';
$user = $_SESSION ['usersession'];
//ini_set('display_errors', 1);
$conn = mysqli_connect( $dbhost, $dbuser, $dbpassword, $dbname);
if (!$conn)
{
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
print "<div class= 'w-25 p-3'><table class='table table-striped table-sm'> <thead ><tr><th>Ostatnie pytania</th><th>Odpowiedz</th><th> Ocena</th></tr> </thead>";
$result = mysqli_query($conn, "Select * from posty, klienci WHERE posty.idk = klienci.idk Order by idr Desc") or die ("DB error: $dbname");
$i = 0;
$idr = array();
while ($row = mysqli_fetch_array ($result))
{
$idrtest = $row[0];
$post = $row[5];
$odp = $row[6];
$user = $row[9];
$ocena = $row[7];
if($user == $_SESSION ['usersession']){
    
    echo " <tbody><tr><th>$post</th><th>$odp</th>";

    if($ocena == NULL && $odp == !NULL){
       
        $idr[] = $idrtest;
    
        print "<th><form method='POST' action='ocena.php'>
        <input type='hidden' id='zagID' name='zagID' value='$idr[$i]'/>
        <select name='ocena' id='ocena'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
      </select>
      <input type='submit' value='Oceń'>
      <form></th></tr>";
  
    $i++;
    }
   
    else 
    {
        print "<th>$ocena</th>";
    }
  
    }
}
print "</div>";
mysqli_close($conn);

?>

<script>
     $('#test1').on('change', function(event) {
       alert("This is the value selected in solutions: " + $(this).val());
  });
    function ocena()
    {
alert(<?php echo $idr ?>);
    }
    </script>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>

