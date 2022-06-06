<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


   
    <title>Jackowksi</title></head>
  <body>


  <BODY>
    <?php 
    session_start();
    ?>
<div class="alert alert-danger" role="alert">
Taki użytkownik już istnieje
</div>
<div class="d-flex align-items-center justify-content-center" style="height: 500px">
<form method="post" action="addKlient.php">
Formularz rejestracji <br>
 Login:<input type="text" name="user" maxlength="20" size="20"><br>
 Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
 Powtórz hasło:<input type="password" name="passagain" maxlength="20" size="20"><br>
 <input type="submit" value="Zarejestruj"/>
</form>
</div>
</BODY>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>


