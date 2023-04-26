  $.ajax({    
    url: "Ajax/QueryDVR.php",             
    dataType: "json",  
    contentType: "application/json; charset=utf-8",
    //data: {table: "DVR"},        
    success: function(data){   
      var i=0;          
       $.each(data, function (key, value) {
        document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+data[i].PesoEffettivo+"</td><td>"+data[i].AltezzaIniziale+"</td><td>"+data[i].DistanzaVerticale+"</td><td>"+data[i].DistanzaOrizzontale+"</td><td>"+data[i].DistanzaAngolare+"</td><td>"+data[i].PresaCarico+"</td><td>"+data[i].PesoMax+"</td><td>"+data[i].IndiceSollevamento+"</td><td>"+data[i].FrequenzaGesti+"</td><td>"+data[i].Prezzo+"</td><td>Visualizza</td><td onclick='Update("+data[i].Id+")'><a href='Modifica.php'>Modifica</a></td><td>Cancella</td></tr>";
       
        i++;
      })
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
    
});

/*function Update(Id){

  $.ajax({    
    url: "Ajax/Update.php",             
    dataType: "json",  
    contentType: "application/json; charset=utf-8",
    data: {id: Id},        
    success: function(data){ 

      var i=0;          
      document.getElementById("Nome").value=data[0].Nome;
      alert(data[0].Nome);
      console.log(data[0].Nome);  
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
    
});
}*/
const element = document.getElementById("sendNew");
element.addEventListener("click", () => {
  $.ajax({ url: "Ajax/AddValutatiom.php",             
  dataType: "json",  
  type: "POST",
  contentType: "application/json; charset=utf-8",
  data: {
    Nome: document.getElementById("Id").value,
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
});

