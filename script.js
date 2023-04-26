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
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
    
});
$(document).ready(function() {
  document.getElementById("sendNew").addEventListener("click", () => {
    alert("fin qui");
    $.ajax({ 
    url: "Ajax/AddValutation.php",             
    dataType: "json",  
  // type: "POST",
    contentType: "application/json; charset=utf-8",
    data: {
      Nome: document.getElementById("Nome").value,
      Data: document.getElementById("Data").value,
      pesoEff: document.getElementById("pesoEff").value,
      AltIn: document.getElementById("AltIn").value,
      DistVer: document.getElementById("DistVert").value,
      DistOrizz: document.getElementById("DistOrizz").value,
      DistAngo: document.getElementById("DistAngo").value,
      PresC: document.getElementById("PresC").value,
      PesoMax: document.getElementById("PesoMax").value,
      IndiceSoll: document.getElementById("IndiceSoll").value,
      Freq: document.getElementById("Freq").value,
      Prezzo: document.getElementById("Prezzo").value,
      Durata: document.getElementById("Durata").value,
    },        
    success: function(data){   
      alert("ffsfs");
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }})
    document.location.href = "Ajax/AddValutation.php";
  });
});

/*
function Update(Id){
  $.ajax({
    url: "Ajax/Update.php",             
    dataType: "json",  
    type: "POST",
    contentType: "application/json; charset=utf-8",
    data: {
      /*Nome: document.getElementById("Id").value,
      Data: document.getElementById("Data").value,
      pesoEff: document.getElementById("pesoEff").value,
      AltIn: document.getElementById("AltIn").value,
      DistVer: document.getElementById("DistVer").value,
      DistOrizz: document.getElementById("DistOrizz").value,
      DistAngo: document.getElementById("DistAngo").value,
      PresC: document.getElementById("PresC").value,
      PesoMax: document.getElementById("PesoMax").value,
      IndiceSoll: document.getElementById("IndiceSoll").value,
      Freq: document.getElementById("Freq").value,
      Prezzo: document.getElementById("Prezzo").value,
      Durata: document.getElementById("Durata").value
    },        
    success: function(data){   

    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }})
    //document.location.href = "Ajax/Update.php";
//document.location.href = "Modifica.html";
}*/



