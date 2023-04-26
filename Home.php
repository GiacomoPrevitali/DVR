<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!--<script src="jquery-3.6.4.min.js"></script>-->
        <script type='text/javascript' src='script.js'></script>
        
        <link rel="stylesheet" href="style.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


        <title>Home</title>
    </head>
    <body>

        <nav class="navbar navbar bg-dark">
            <?php
                session_start();
                    if(isset($_SESSION['Nome'])){
                        echo '<h3 class="Name"> Ciao, '. $_SESSION['Nome'].' '.$_SESSION['Cognome'].'</h3>';
                   
                    }else{
                        header("Location: index.php?error");
                    }
            ?>
            <button type="button" class=" btn btn-outline-success BtnAccount" data-bs-toggle="modal" data-bs-target="#exampleModal">Account</button>
        </nav>


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
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>

            <br>
            <a href="new.html">
                <button type="button" class="btn btn-primary BtnCh">Compila un nuovo DVR</button>
            </a>
            <br>
            <a href="view.html">
                <button type="button" class="btn btn-warning BtnCh" id="view">Visualizza</button>
            </a>
            <br>
            <a href="logout.php">
                <button type="button" class="btn btn-danger BtnCh">Logout</button>
            </a><br>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>