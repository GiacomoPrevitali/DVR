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
    url: "Ajax/AddValutation.php",
    type: "POST",             
    dataType: "json",  
    data: {
      Id: Id
    },        
    success: function(data){  
      $('#exampleModal').modal('show');
      console.log(data[0].Nome);
      //document.getElementById("Nome1").innerHTML=data[0].Nome;
      $("#Nome1").val(data[0].Nome);
      $("#Data1").val(data[0].DataU);
      $("#pesoEff1").val(data[0].pesoEffettivo);
      $("#AltIn1").val(data[0].AltezzaIniziale);
      $("#DistVert1").val(data[0].DistanzaVerticale);
      $("#DistOrizz1").val(data[0].DistanzaOrizzontale);
      $("#DistAngo1").val(data[0].DistanzaAngolare);
      if(data[0].PresaCarico=="2"){
        $("#PresaC1").val("Buona");
      }else if(data[0].PresaCarico=="1"){
        $("#PresaC1").val("Sufficiente");
      }else{
        $("#PresaC1").val("Scarsa");
      }
      $("#PesoMax1").val(data[0].PesoMax);
      $("#IndiceSoll1").val(data[0].IndiceSollevamento);
      $("#Freq1").val(data[0].FrequenzaGesti);
      $("#Prezzo1").val(data[0].Prezzo);
      $("#Durata1").val(data[0].Durata);

      //document.getElementById("Nome").value=data[0].Nome;
       //document.location.href = "new.html";
       

    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data);
      console.log(xhr.status);
      console.log(thrownError);
    }})
    //document.location.href = "Ajax/Update.php";
//document.location.href = "Modifica.html";
}

/*$(document).ready(function() {
  document.getElementById("ButtUpdate").addEventListener("submit", (e) => {
    //e.preventDefault();
    $.ajax({ 
    url: "Ajax/Update.php",  
    type: "POST",           
    dataType: "json",  
    data: {
      Id: document.getElementById("Id1").value,
      Nome: document.getElementById("Nome1").value,
      DataVal: document.getElementById("Data1").value,
      pesoEff: document.getElementById("pesoEff1").value,
      AltIn: document.getElementById("AltIn1").value,
      DistVert: document.getElementById("DistVert1").value,
      DistOrizz: document.getElementById("DistOrizz1").value,
      DistAngo: document.getElementById("DistAngo1").value,
      PresaC: document.getElementById("PresaC1").value,
      PesoMax: document.getElementById("PesoMax1").value,
      IndiceSoll: document.getElementById("IndiceSoll1").value,
      Freq: document.getElementById("Freq1").value,
      Prezzo: document.getElementById("Prezzo1").value,
      Durata: document.getElementById("Durata1").value
    },      
    success: function(data){   
      console.log("dati salvati");
    },
    error: function (data) {
      console.log(data);
    }})
  });
});*/

