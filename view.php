<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Visualizza</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!--<script src="jquery-3.6.4.min.js"></script>-->
        <script type='text/javascript' src='script.js'></script>
</head>
<body>
    <div class="container">
        <div class="content">
        <h1>Content 1</h1>
        </div>
    </div>
    <!--<script>
        $(document).ready(function(){
            console.log("JQ is ready");
            $("#view").click(function(e){
                e.preventDefault();
                //console.log("bottone premuto");
                $.ajax({
                    type: "GET",
                    url: "prova.php",
                    data: {
                       count: 1
                    },
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                    },
                    error : function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>-->
<nav class="navbar navbar-expand-lg navbar-light bg-light navabar">
<a href="Home.php">       
    <input type="button"class="btn btn-outline-primary" value="Torna alla pagina principale">  
    </a>
</nav>
<input type="button"class="btn btn-outline-primary" id="view"  value="Torna alla pagina principale">  

<div id="tabella-container"></div>
<script>
    fetch('./Ajax/AddValutation.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data =>{
        line=data;
        console.log("dati",data);
        let tabella= ` 
        <table id="table" >
        <thead>
            <tr class="TitleTable">
                <th class="thID">Id </th>
                <th class="thNA">Ragione Sociale</th>
                <th class="thDA">Data</th>
                <th>Peso Effettivo (Kg)</th>
                <th>Altezza Iniziale (Cm)</th>
                <th class="thDV">Distanza Verticale (Cm)</th>
                <th class="thDO">Distanza Orizzontale (Cm)</th>
                <th class="thAN">Distanza Angolare(°)</th>
                <th>Presa Carico (Kg)</th>
                <th>Peso Massimo (Kg)</th>
                <th class="thIS">Indice Sollevamento</th>
                <th>Frequenza</th>
                <th>Prezzo</th>
                <th> PDF</th>
                <th>Modifica</th>
                <th>Elimina</th>                            
            </tr>
        </thead>
        <tbody>
            ${generaRighe(data)}
        </tbody>
        <table>`;
        let tabellaContainer=document.querySelector("#tabella-container");
        tabellaContainer.insertAdjacentHTML('beforeend',tabella);

    })
    .catch((error) => {
        console.log(error);
    });


    function generaRighe(line){
        alert(line);
        alert(line.Length);
        let righe='';
        for(var i=0; i<line.Lenght; i++){
            let riga=`<tr Id="CodDVR">  
                        <td Id="CodID_'.$i.'">'.$row['Id'].'</td>
                        <td>'.${data.Nome}$row['Nome'].'</td>
                        <td>'.${data.DataU}$row['DataU'].'</td>
                        <td>'.${data.PesoEffettivo}$row['PesoEffettivo'].'</td>
                        <td>'.${data.AltezzaIniziale}$row['AltezzaIniziale'].'</td>
                        <td>'.${data.DistanzaVerticale}$row['DistanzaVerticale'].'</td>
                        <td>'.${data.DistanzaOrizzontale}$row['DistanzaOrizzontale'].'</td>
                        <td>'.${data.DistanzaAngolare}$row['DistanzaAngolare'].'</td>
                        <td>'.${data.PresaCarico}$row['PresaCarico'].'</td>
                        <td>'.${data.PesoMax}$row['PesoMax'].'</td>
                        <td>'.${data.IndiceSollevamento}$row['IndiceSollevamento'].'</td>
                        <td>'.${data.FrequenzaGesti}$row['FrequenzaGesti'].'</td>
                        <td>'.${data.Prezzo}$row['Prezzo'].'</td>
                        <td> Visualizza</td>
                        
                        <td data-id=${data.id}>Modifica</td>
                        
                        <td data-id=${data.id}>Elimina</td>
                    </tr>`
                    alert(i);
            righe+=riga;
        }
        /*line.forEach(data=>{
            let riga=`<tr Id="CodDVR">  
                        <td Id="CodID_'.$i.'">'.$row['Id'].'</td>
                        <td>'.${data.Nome}$row['Nome'].'</td>
                        <td>'.${data.DataU}$row['DataU'].'</td>
                        <td>'.${data.PesoEffettivo}$row['PesoEffettivo'].'</td>
                        <td>'.${data.AltezzaIniziale}$row['AltezzaIniziale'].'</td>
                        <td>'.${data.DistanzaVerticale}$row['DistanzaVerticale'].'</td>
                        <td>'.${data.DistanzaOrizzontale}$row['DistanzaOrizzontale'].'</td>
                        <td>'.${data.DistanzaAngolare}$row['DistanzaAngolare'].'</td>
                        <td>'.${data.PresaCarico}$row['PresaCarico'].'</td>
                        <td>'.${data.PesoMax}$row['PesoMax'].'</td>
                        <td>'.${data.IndiceSollevamento}$row['IndiceSollevamento'].'</td>
                        <td>'.${data.FrequenzaGesti}$row['FrequenzaGesti'].'</td>
                        <td>'.${data.Prezzo}$row['Prezzo'].'</td>
                        <td> Visualizza</td>
                        
                        <td data-id=${data.id}>Modifica</td>
                        
                        <td data-id=${data.id}>Elimina</td>
                    </tr>`
            righe+=riga;
        });*/
        return righe;
    }
</script>
        <?php
      //  session_start();
       /* if(isset($_SESSION['Nome'])){
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
                            echo' <table id="table" >
                            <tr class="TitleTable">
                                <th class="thID">Id </th>
                                <th class="thNA">Ragione Sociale</th>
                                <th class="thDA">Data</th>
                                <th>Peso Effettivo (Kg)</th>
                                <th>Altezza Iniziale (Cm)</th>
                                <th class="thDV">Distanza Verticale (Cm)</th>
                                <th class="thDO">Distanza Orizzontale (Cm)</th>
                                <th class="thAN">Distanza Angolare(°)</th>
                                <th>Presa Carico (Kg)</th>
                                <th>Peso Massimo (Kg)</th>
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
            }*/
        ?>
    </table>
   
   
</body>
</html>