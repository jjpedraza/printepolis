<?php require("../backend/config.php"); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="../lib/estilo.css?d=<?php echo rand();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../lib/jquery-3.6.0.min.js"></script>

    <!-- TOAST -->
    <link rel="stylesheet" href="../lib/jquery.toast.min.css">
    <script type="text/javascript" src="../lib/jquery.toast.min.js"></script>

    

    <title>Printepolis Administracion - Login</title>
</head>
<body>
<audio id="AudioBoop" style="display:none;">
    <source src="../audios/boop.mp3">
</audio>

<audio id="AudioBoop2" style="display:none;">
    <source src="../audios/mensaje.wav">
</audio>

<audio id="AudioError" style="display:none;">
    <source src="../audios/error.mp3">
</audio>

<audio id="AudioSuccess" style="display:none;">
    <source src="../audios/success.mp3">
</audio>

<div id='DivLogin' >

    
    <h1 class="h3 mb-3 fw-normal">Login:</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="IdAdmin" placeholder="Usuario">
      <label for="floatingInput">Usuario:</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
  <br>
    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <button id="BtnLogin" class="w-100 btn btn-lg btn-primary" type="submit" onclick="LoginCheck();">Entrar</button>
  
  

</div>

<div id='R' style='display:none;'></div>
<script>
function LoginCheck(){
    IdAdmin= $('#IdAdmin').val();
    Password=$('#Password').val();
    $.ajax({
      url: "../backend/admin_logincheck.php",
      type: "post",   
      data: {IdAdmin:IdAdmin, Password:Password},
      success: function(data){
       $('#R').html(data+"\n");
      //  $("#preloader").css({'display':'none'});
      }
   });
}
</script>
</body>
</html>