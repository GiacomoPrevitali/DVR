/*function calcola(){
  const pesoEff= document.getElementById("pesoEff").value;
  const AltIn=document.getElementById("AltIn").value;
  const DistVert=document.getElementById
  alert("ciao");
}

function Modifica(DVR){
  var table=DVR.getAttribute("data-id");
  var id=document.getElementById("CodID_"+table).innerHTML;

  return id;
  alert(table);
  alert(id);
}*/
/*   
<input id="pesoEff"     placeholder="Peso Effettivo (Kg)"><br>
<input id="AltIn"       placeholder="Altezza iniziale (Cm)"><br>
<input Id="DistVert"    placeholder="Distanza verticale (Cm)"><br>
<input Id="DistOrizz"   placeholder="Distanza orizzontale (Cm)"><br>
<input Id="DistAngo"    placeholder="Distanza angolare"><br>
<input Id="PresaC"      placeholder="Presa sul carico"><br>
<input Id="Freq"        placeholder="Frequenza (volte al minuto)"><br>
<input Id="Dur"         placeholder="Durata (Ore)"> */
/*
function Modifica(mod){
alert(mod.value);
var riga = document.getElementById("modID").innerHTML;
const tabella= document.getElementById("cellaID").innerHTML;
alert(tabella);
}*/

/*function Add(){
  alert("ciao");
  fetch('Ajax/AddValutation.php',{
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })
  .catch((error) => {
    console.log(error);
  });
}*/

/*
document.getElementById("view").addEventListener("click", function(){
$(document).ready(function(){
  $('#view').click(function(){
    $.ajax({
      url: "Ajax/AddValutation.php",
      type: "GET",
      data: $(this).serialize(),
        success: function(data){
          console.log(data);
        },
        error : function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
    });
  });
});
});*/


  $.ajax({    
    type: "GET",
    url: "Ajax/QueryDVR.php",             
    dataType: "json",                 
    success: function(data){             
      console.log(data);       
        $("#table-container").html(data);  
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
    
});
