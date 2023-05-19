  //VIEW
  var Id;
  var freq;
  var IdUtente;
  var lunghezza;
  function VerUtente(Id){
    IdUtente=Id;
    //alert(IdUtente);
    if(IdUtente==0){
      document.getElementById("NuovoDVR").hidden=false;
      document.getElementById("NuovoUtente").hidden=true;
      document.getElementById("ViewDVR").hidden=true;
      document.getElementById("RSWord").hidden=false;
      document.getElementById("Startsearch").hidden=false;
    
    }else if(IdUtente==2){
      document.getElementById("RSWord").hidden=true;
      document.getElementById("Startsearch").hidden=true;
      document.getElementById("NuovoDVR").hidden=true;
      document.getElementById("NuovoUtente").hidden=true;
      document.getElementById("ViewDVR").hidden=false;
      document.getElementById("table").innerHTML='<table id="table"><thead><tr class="TitleTable bg-primary"><th class="thID">Id </th><th class="thNA">Ragione Sociale</th><th class="thDA">Data</th><th>Peso Limite (Kg)</th><th class="thIS">Indice Sollevamento</th><th>Prezzo</th><th>Validità</th><th> PDF</th><th>Modifica</th><th>Elimina</th></tr></thead></table>';
      

      Image.hidden=true;
      }else if(IdUtente==1){
      
      document.getElementById("NuovoDVR").hidden=false;
      document.getElementById("NuovoUtente").hidden=false;
      document.getElementById("ViewDVR").hidden=true;
      document.getElementById("RSWord").hidden=false;
      document.getElementById("Startsearch").hidden=false;
    }
  
  }

  $.ajax({    
    url: "Ajax/QueryDVR.php",             
    dataType: "json",  
    contentType: "application/json; charset=utf-8",        
    success: function(data){
      lunghezza=data.length;
      console.log(data);
     // alert(IdUtente);   
      var i=0;       
      if(data.length==0){
          document.getElementById("table").hidden=true;
          document.getElementById("NoVal").hidden=false;
        }  
       $.each(data, function (key, value) {
        var val="";
        var val1="";
        if(data[i].PresaCarico=="1"){
          val1="Buona";
        }else{
          val1="Scarsa";
        }
        if(data[i].Validità=="1"){
          val="Valido";
        }else{
          val="Non Valido";
        }
        var IndiceSollevamento;
        if(data[i].FrequenzaGesti=="20"){
          freq="0.20";
        }else{
          freq=data[i].FrequenzaGesti;
        }
        if(data[i].IndiceSollevamento=="-1"){
          IndiceSollevamento="Non Calcolabile";
        }else{
          IndiceSollevamento=Math.round(data[i].IndiceSollevamento * 100) / 100;
          
        }
        var Pesolimte=Math.round(data[i].PesoMax * 100) / 100;
        
        //document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+data[i].PesoEffettivo+"</td><td>"+data[i].AltezzaIniziale+"</td><td>"+data[i].DistanzaVerticale+"</td><td>"+data[i].DistanzaOrizzontale+"</td><td>"+data[i].DistanzaAngolare+"</td><td>"+val1+"</td><td>"+Pesolimte  +"</td><td>"+IndiceSollevamento+"</td><td>"+freq+"</td><td>"+data[i].Prezzo+"€</td><td id=checkVal"+i+">"+val+"</td><td>Visualizza</td><td onclick='Update("+data[i].Id+")'>Modifica</td><td onclick='Delete("+data[i].Id+")'>Cancella</td></tr>";
        document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+Pesolimte  +" Kg</td><td id=Ind"+i+">"+IndiceSollevamento+"</td><td>"+data[i].Prezzo+"€</td><td id=checkVal"+i+">"+val+"</td><td id='crea"+i+"' onclick='createPDF("+data[i].Id+","+data[i].Validità+")'><a href='view.php?Id="+data[i].Id+"'><img src='./Foto/PDF.png' ></a></td><td id='modifica"+i+"' onclick='Update("+data[i].Id+","+data[i].Validità+")'><img src='./Foto/Modifca.png'></td><td id='elimina"+i+"'onclick='Delete("+data[i].Id+")'><img src='./Foto/X.jpg' ></td></tr>";
      
        i++;
        var tds = document.getElementsByTagName("td");
        for(var h = 0, j = tds.length; h < j; h++){
          if(tds[h].innerHTML=="Valido"){
            tds[h].style.color = "green";
            document.getElementById("table").style.border="1px solid black";
          }else if(tds[h].innerHTML=="Non Valido"){
            tds[h].style.color = "red";
            document.getElementById("table").style.border="1px solid black";
          }else if(tds[h].innerHTML=="Non Calcolabile"){
            tds[h].style.color = "red";
          }

        }
      })
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      //alert(xhr.status);
      //alert(thrownError);
    }
    
});

//NUOVE VALUTAZIONI
$(document).ready(function() {
  document.getElementById("form1").addEventListener("submit", (e) => { 
   //e.preventDefault();
   var UnaMano;
   var DuePersone;
   if(document.getElementById("UnaMano").checked){
    UnaMano=1;
   }else{
    UnaMano=0;
   }
   if(document.getElementById("DuePersone").checked){
    
    DuePersone=1;
   }else{
    DuePersone=0;
   }
    $.ajax({ 
    url: "Ajax/AddValutation.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      Update: "1",
      Nome: document.getElementById("Nome").value,
      DataVal: document.getElementById("Data").value,
      pesoEff: document.getElementById("pesoEff").value,
      AltIn: document.getElementById("AltIn").value,
      DistVert: document.getElementById("DistVert").value,
      DistOrizz: document.getElementById("DistOrizz").value,
      DistAngo: document.getElementById("DistAngo").value,
      PresaC: document.getElementById("PresaC").value,
      Freq: document.getElementById("Freq").value,
      Prezzo: document.getElementById("Prezzo").value,
      Durata: document.getElementById("Durata").value,
      UnaMano: UnaMano,
      DuePersone: DuePersone,

    },      
    success: function(data){   
      console.log("dati salvati");
      console.log(data);
      document.location.href="Home.php"
    },
    error: function (data) {
      console.log(data);
    }})
  });
});


$(document).ready(function() {
  document.getElementById("formUtente").addEventListener("submit", (e) => {
   //e.preventDefault();
    $.ajax({ 
    url: "Ajax/AddUser.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      Update: "1",
      Nome: document.getElementById("NomeUser").value,
      Cognome: document.getElementById("CognomeUser").value,
      Username: document.getElementById("UsernameUser").value,
      Password: document.getElementById("PasswordUser").value,
      Permessi: document.getElementById("PermessiUser").value,
      Ragione: document.getElementById("RagioneUser").value,
    },      
    success: function(data){   
      console.log("dati salvati");
      window.location.href="Home.php"
    },
    error: function (data) {
      console.log(data);
    }})
  });
});





//CARICAMENTO DATI NELLA MODALE
function Update(Idi,V){
  //if(V=="1"){
  Id=Idi;
  $.ajax({
    url: "Ajax/Update.php",
    type: "POST",             
    dataType: "json",  
    data: {
      Id: Id
    },        
    success: function(data){  
      $('#exampleModal').modal('show');
      console.log(data[0].Nome);
      $("#Nome1").val(data[0].Nome);
      $("#Data1").val(data[0].DataU);
      $("#pesoEff1").val(data[0].PesoEffettivo);
      $("#AltIn1").val(data[0].AltezzaIniziale);
      $("#DistVert1").val(data[0].DistanzaVerticale);
      $("#DistOrizz1").val(data[0].DistanzaOrizzontale);
      $("#DistAngo1").val(data[0].DistanzaAngolare);
      if(data[0].PresaCarico=="1"){
        $("#PresaC1").val(data[0].PresaCarico);
      }else{
        $("#PresaC1").val(0);
      }
      $("#Freq1").val(data[0].FrequenzaGesti);
      $("#Prezzo1").val(data[0].Prezzo);
      $('#Durata1').val(data[0].Durata);
      if(data[0].Mano==1){
        document.getElementById("UnaMano1").checked = true;
      }else{
        document.getElementById("UnaMano1").checked = false;
      }
      if(data[0].DuePersone==1){
        document.getElementById("DuePersone1").checked = true;
      }else{
        document.getElementById("DuePersone1").checked = false;
      }
      //$('#DuePersone1').val(data[0].DuePersone);

    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data);
      console.log(xhr.status);
      console.log(thrownError);
    }})

}


//MODIFICA DATI
$(document).ready(function() {
  document.getElementById("ModificaDati").addEventListener("submit", (e) => {
    //e.preventDefault();
    if(document.getElementById("UnaMano1").checked){
      UnaMano=1;
     }else{
      UnaMano=0;
     }
     if(document.getElementById("DuePersone1").checked){
      
      DuePersone=1;
     }else{
      DuePersone=0;
     }
    $.ajax({ 
    url: "Ajax/AddValutation.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      Update: "0",
      Id: Id,
      Nome: document.getElementById("Nome1").value,
      DataVal: document.getElementById("Data1").value,
      pesoEff: document.getElementById("pesoEff1").value,
      AltIn: document.getElementById("AltIn1").value,
      DistVert: document.getElementById("DistVert1").value,
      DistOrizz: document.getElementById("DistOrizz1").value,
      DistAngo: document.getElementById("DistAngo1").value,
      PresaC: document.getElementById("PresaC1").value,
      Freq: document.getElementById("Freq1").value,
      Prezzo: document.getElementById("Prezzo1").value,
      Durata: document.getElementById("Durata1").value,
      UnaMano: UnaMano,
      DuePersone: DuePersone,
    },      
    success: function(data){   
      console.log(data);
    },
    error: function (data) {
      console.log(data);
    }})
  });
});


function Delete(Idi){
  Id=Idi;
  $('#ConfDelete').modal('show');
  
}

function Conf(){
  Delete1(Id);
  $('#ConfDelete').modal('hide');
}
//DELETE
function Delete1(Idi){
  Id=Idi;
  $.ajax({
    url: "Ajax/Delete.php",
    type: "POST",             
    dataType: "json",  
    data: {
      Id: Id
    },        
    success: function(data){  
      console.log("dati cancellati");
      console.log(data);
      document.location.href = "view.html";
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data);
      console.log(xhr.status);
      console.log(thrownError);
    }})
}

function Close(){
  $('#ConfDelete').modal('hide');
}





function createPDF(Idi,V){      
    Id=Idi;
    $.ajax({
      url: "Ajax/PDF.php",
      type: "POST",             
      dataType: "json",  
      data: {
        Id: Id
      },        
      success: function(data){  
        console.log(data);
       // window.open('Ajax/PDF.php');
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data);
        //window.open('Ajax/PDF.php');
      }})
}

$(document).ready(function() {
  document.getElementById("Startsearch").addEventListener("click", (e) => {
    e.preventDefault();
    $.ajax({ 
    url: "Ajax/Search.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      RS: document.getElementById("RSWord").value,
    },      
    success: function(data){   
      document.getElementById("table").innerHTML='<table id="table"><thead><tr class="TitleTable bg-primary"><th class="thID">Id </th><th class="thNA">Ragione Sociale</th><th class="thDA">Data</th><th>Peso Limite (Kg)</th><th class="thIS">Indice Sollevamento</th><th>Prezzo</th><th>Validità</th><th> PDF</th><th>Modifica</th><th>Elimina</th></tr></thead></table>';
      console.log(data);
      var i=0;
      if(data.length==0){
        document.getElementById("table").hidden=true;
        document.getElementById("NoVal").hidden=false;
      }  
     $.each(data, function (key, value) {
      if(data[i].Nome=="A"){
        document.getElementById("table").hidden=true;
        document.getElementById("NoVal").hidden=false;
      }else{
        document.getElementById("table").hidden=false;
        document.getElementById("NoVal").hidden=true;
      var val="";
      var val1="";
      if(data[i].PresaCarico=="1"){
        val1="Buona";
      }else{
        val1="Scarsa";
      }
      if(data[i].Validità=="1"){
        val="Valido";
      }else{
        val="Non Valido";
      }
      var IndiceSollevamento;
      if(data[i].FrequenzaGesti=="20"){
        freq="0.20";
      }else{
        freq=data[i].FrequenzaGesti;
      }
      if(data[i].IndiceSollevamento=="-1"){
        IndiceSollevamento="Non Calcolabile";
      }else{
        IndiceSollevamento=Math.round(data[i].IndiceSollevamento * 100) / 100;
        
      }
      var Pesolimte=Math.round(data[i].PesoMax * 100) / 100;
      
      document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+Pesolimte  +" Kg</td><td id=Ind"+i+">"+IndiceSollevamento+"</td><td>"+data[i].Prezzo+"€</td><td id=checkVal"+i+">"+val+"</td><td id='crea"+i+"' onclick='createPDF("+data[i].Id+","+data[i].Validità+")'><a href='view.php?Id="+data[i].Id+"'><img src='./Foto/PDF.png' ></a></td><td id='modifica"+i+"' onclick='Update("+data[i].Id+","+data[i].Validità+")'><img src='./Foto/Modifca.png'></td><td id='elimina"+i+"'onclick='Delete("+data[i].Id+")'><img src='./Foto/X.png' ></td></tr>"; 
      i++;
      }
      });
    
    },
    error: function (data) {
      console.log(data);
    }})
  });
});




