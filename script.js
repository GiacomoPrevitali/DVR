  $.ajax({    
    url: "Ajax/QueryDVR.php",             
    dataType: "json",  
    contentType: "application/json; charset=utf-8",        
    success: function(data){   
      var i=0;          
       $.each(data, function (key, value) {
        document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+data[i].PesoEffettivo+"</td><td>"+data[i].AltezzaIniziale+"</td><td>"+data[i].DistanzaVerticale+"</td><td>"+data[i].DistanzaOrizzontale+"</td><td>"+data[i].DistanzaAngolare+"</td><td>"+data[i].PresaCarico+"</td><td>"+data[i].PesoMax+"</td><td>"+data[i].IndiceSollevamento+"</td><td>"+data[i].FrequenzaGesti+"</td><td>"+data[i].Prezzo+"</td><td>Visualizza</td><td onclick='Update("+data[i].Id+")'>Modifica</td><td>Cancella</td></tr>";
       
        i++;
      })
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(xhr.status);
      alert(thrownError);
    }
    
});
$(document).ready(function() {
  document.getElementById("form1").addEventListener("submit", (e) => {
    //e.preventDefault();
    $.ajax({ 
    url: "Ajax/AddValutation.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      Nome: document.getElementById("Nome").value,
      DataVal: document.getElementById("Data").value,
      pesoEff: document.getElementById("pesoEff").value,
      AltIn: document.getElementById("AltIn").value,
      DistVert: document.getElementById("DistVert").value,
      DistOrizz: document.getElementById("DistOrizz").value,
      DistAngo: document.getElementById("DistAngo").value,
      PresaC: document.getElementById("PresaC").value,
      PesoMax: document.getElementById("PesoMax").value,
      IndiceSoll: document.getElementById("IndiceSoll").value,
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

function Update(Id){
  //alert(Id);
  $.ajax({
    url: "Ajax/Update.php",
    type: "POST",             
    dataType: "json",  
    data: {
      Id: Id
    },        
    success: function(data){  
      console.log("ciap"+data);
       document.location.href = "new.html";
       document.getElementById("Nome").value=data[0].Nome;

    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data);
      console.log(xhr.status);
      console.log(thrownError);
    }})
    //document.location.href = "Ajax/Update.php";
//document.location.href = "Modifica.html";
}



