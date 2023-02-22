<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type='text/javascript' src='script.js'></script>
    <link rel="stylesheet" href="style.css" />
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
 <h1 class="title"> D.V.R.</h1>
</nav>
    
    <?php
    session_start();
    if(isset($_SESSION['Nome'])){
    echo "Ciao, ". $_SESSION['Nome']." ".$_SESSION['Cognome'];
    }else{
    header("Location: index.php");
}
    ?><br>
    <a href="new.php">
    <button type="button" class="btn btn-outline-primary">Compila un nuovo DVR</button>
    </a>
    <br>
    <a href="view.php">
    <button type="button" class="btn btn-outline-warning">Visualizza</button>
    </a>
    
   
</body>
</html>