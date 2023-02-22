<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                    echo '<h3 class="Name"> Ciao, '. $_SESSION['Nome'].' '.$_SESSION['Cognome'].'</h3>';
                }else{
                    header("Location: index.php?error");
                }
        ?>
        <br>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php 
                            echo    '<p>Nome: '.$_SESSION['Nome'].'</p>
                                    <p>Cognome: '.$_SESSION['Cognome'].'</p>
                                    <p>Username: '.$_SESSION['Username'].'</p>'
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Account</button>
            <a href="new.php">
                <button type="button" class="btn btn-outline-primary">Compila un nuovo DVR</button>
            </a>
            <br>
            <a href="view.php">
                <button type="button" class="btn btn-outline-warning">Visualizza</button>
            </a>
            <br>
            <a href="logout.php">
                <button type="button" class="btn btn-outline-danger">Logout</button>
            </a>

    </body>
</html>