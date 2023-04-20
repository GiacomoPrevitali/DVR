<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <script type='text/javascript' src='script.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Visualizza</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light navabar">
<a href="Home.php">       
    <input type="button"class="btn btn-outline-primary" value="Torna alla pagina principale">  
    </a>
</nav>
        <?php
        session_start();
        if(isset($_SESSION['Nome'])){
            $ip= '127.0.0.1';
            $username='root';
            $password='';
            $database='dvr';

            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
                $sql ='SELECT * FROM documento WHERE Id_Operatore="'.$_SESSION['Id'].'"';
                $result =$connection->query($sql);
                if($result->num_rows>0){
                    $title=true;
                    $i=0;
                    while($row=$result->fetch_assoc()){
                        if($title){
                            echo' <table >
                            <tr class="TitleTable">
                                <th class="thID">Id</th>
                                <th class="thNA">Ragione Sociale</th>
                                <th class="thDA">Data</th>
                                <th>Peso Effettivo</th>
                                <th>Altezza Iniziale</th>
                                <th class="thDV">Distanza Verticale</th>
                                <th class="thDO">Distanza Orizzontale</th>
                                <th class="thAN">Distanza Angolare</th>
                                <th>Presa Carico</th>
                                <th>Peso Massimo</th>
                                <th class="thIS">Indice Sollevamento</th>
                                <th>Frequenza</th>
                                <th>Prezzo</th>
                                <th> PDF</th>
                                <th>Modifica</th>
                                <th>Elimina</th>
                               
                            </tr>';
                            $title=false;
                        }
                        echo '<tr Id="CodDVR">  
                        <td Id="CodID_'.$i.'">'.$row['Id'].'</td>
                        <td>'.$row['Nome'].'</td>
                        <td>'.$row['DataU'].'</td>
                        <td>'.$row['PesoEffettivo'].'</td>
                        <td>'.$row['AltezzaIniziale'].'</td>
                        <td>'.$row['DistanzaVerticale'].'</td>
                        <td>'.$row['DistanzaOrizzontale'].'</td>
                        <td>'.$row['DistanzaAngolare'].'</td>
                        <td>'.$row['PresaCarico'].'</td>
                        <td>'.$row['PesoMax'].'</td>
                        <td>'.$row['IndiceSollevamento'].'</td>
                        <td>'.$row['FrequenzaGesti'].'</td>
                        <td>'.$row['Prezzo'].'</td>
                        <td> Visualizza</td>
                        
                        <td data-id="'.$i.'" onclick=Modifica(this);><a href="Modifica.php"> Modifica</a></td>
                        
                        <td> Elimina</td>
                        </tr>';
                        $i=$i+1;
                        

                    }
                }else{
                    echo '<div class="alert alert-danger my-4">Non sono presenti DVR</div>';
                }
            }else{
                header("Location: index.php?error");
            }
        ?>
    </table>
   
   
</body>
</html>