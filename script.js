  //VIEW
  var Id;
  var freq;
  $.ajax({    
    url: "Ajax/QueryDVR.php",             
    dataType: "json",  
    contentType: "application/json; charset=utf-8",        
    success: function(data){   
      var i=0;          
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
        document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+Pesolimte  +" Kg</td><td id=Ind"+i+">"+IndiceSollevamento+"</td><td>"+data[i].Prezzo+"€</td><td id=checkVal"+i+">"+val+"</td><td onclick='createPDF("+data[i].Id+","+data[i].Validità+")'>Visualizza</td><td onclick='Update("+data[i].Id+","+data[i].Validità+")'>Modifica</td><td onclick='Delete("+data[i].Id+")'>Cancella</td></tr>";
        
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
      alert(xhr.status);
      alert(thrownError);
    }
    
});

//NUOVE VALUTAZIONI
$(document).ready(function() {
  document.getElementById("form1").addEventListener("submit", (e) => {
   //e.preventDefault();
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
      Durata: document.getElementById("Durata").value
    },      
    success: function(data){   
      console.log("dati salvati");
    },
    error: function (data) {
      console.log(data);
    }})
  });
});


//CARICAMENTO DATI NELLA MODALE
function Update(Idi,V){
  if(V=="1"){
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
      $('#Durata1').val(data[0].Durata)
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data);
      console.log(xhr.status);
      console.log(thrownError);
    }})
  }else{
    document.getElementById('alert').hidden=false;
    setTimeout(
      function() {
      console.log("run");
      document.getElementById('alert').hidden=true;
      }, 3000);
  }
}


//MODIFICA DATI
$(document).ready(function() {
  document.getElementById("ModificaDati").addEventListener("submit", (e) => {
    e.preventDefault();
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
      Durata: document.getElementById("Durata1").value
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
  if(V=="1"){
    Id=Idi;
    $.ajax({
      url: "Ajax/PDF.php",
      type: "POST",             
      dataType: "json",  
      data: {
        Id: Id
      },        
      success: function(data){  
        //$('#exampleModal').modal('show');
       /* console.log(data[0].Nome);
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
        $('#Durata1').val(data[0].Durata)*/
        //PDFdata(data);
        console.log(data);

        window.open('Ajax/PDF.php');





      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data);
        window.open('Ajax/PDF.php');
      }})
    }else{
      document.getElementById('alert1').hidden=false;
      setTimeout(
        function() {
        console.log("run");
        document.getElementById('alert1').hidden=true;
        }, 3000);
    }
}


