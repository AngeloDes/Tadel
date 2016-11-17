$(document).ready(function(){
  selectDaten();
});
function firstFunc(){
  console.log("Applikation initialisiert...");
  //$("#ergebnis").html(html).fadeOut(800).addClass("hidden");
  var check = false;
  var name = $("#name").val();
  var kraftstoff = $("#kraftstoff").val();
  var farbe = $("#farbe").val();
  var bauart = $("#bauart").val();

//  if(name && kraftstoff && farbe && bauart) {
    check = true;
//  }

  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "neu", name: name, kraftstoff: kraftstoff, farbe: farbe, bauart: bauart },
      dataType: "JSON",
      beforeSend: function(){
        console.log("bs");
      },
      success: function(daten){
        console.log("ok");
        console.log(daten);
        var html = "";
        selectDaten();
        if(daten.status){
          html = "<tr><td>" + daten.name +
          "</td><td>" + daten.kraftstoff +
          "</td><td style=\"color: " + daten.farbe + "\">" + daten.farbe +
          "</td><td>" + daten.bauart + "</td></tr>"

          $("#tabletest").removeClass("hidden");
          $("#tabletestbody").append(html);
        }
        $("#update").addClass("hidden");
        $("#topdivsuccess").removeClass("hidden");
        $("#topdivwarning").addClass("hidden");
        $("#topdivdanger").addClass("hidden");
        $("#topdivnotfilled").addClass("hidden");
      },
      error: function(){
        console.log("err");
        $("#topdivnotfilled").removeClass("hidden");

      },
      complete: function(){
        console.log("nach");
      },
    });
  }
}
function selectDaten(){

  var check = true;

  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "selectDaten" },
      dataType: "JSON",
      beforeSend: function(){
        $("#tabletestbody").html("");
        $("#tabletest").addClass("hidden");
        console.log("bs2");
      },
      success: function(daten){
        console.log("ok2");
        console.log(daten);
        var html = "";
        if(daten.length > 0){
          for (var i = 0; i < daten.length; i++) {
            html += "<tr><td>" + daten[i].name +
            "</td><td>" + daten[i].kraftstoff +
            "</td><td style=\"color: " + daten[i].farbe + "\">" + daten[i].farbe +
            "</td><td>" + daten[i].bauart + "</td>" +
            "<td><button onclick=\"deleteDaten(" + daten[i].id + ")\" type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>&nbsp; Löschen</button></td>" +
            "<td><button onclick=\"datenHolen(" + daten[i].id + ")\" type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-angle-up\" aria-hidden=\"true\"></i>&nbsp; Bearbeiten</button></td></tr>"
          }


          $("#tabletest").removeClass("hidden");
          $("#tabletestbody").html(html);
          $("#update").addClass("hidden");
        }

      },
      error: function(){
        console.log("err2");
      },
      complete: function(){
        console.log("nach2");
      },
    });
  }
}
function deleteDaten(id){

  var check = true;


  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "deleteDaten", id: id },
      dataType: "JSON",
      beforeSend: function(){
        console.log("bs3");
      },
      success: function(){
        selectDaten();
        $("#topdivsuccess").addClass("hidden");
        $("#topdivwarning").addClass("hidden");
        $("#topdivdanger").removeClass("hidden");
        $("#topdivnotfilled").addClass("hidden");
      },
      error: function(){
        console.log("err3");
      },
      complete: function(){
        console.log("nach3");
      },
    });
  }
}
function datenHolen(id){
  var check = true;


  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "datenHolen", id: id },
      dataType: "JSON",
      beforeSend: function(){
        console.log("bs4");
      },
      success: function(daten){
        console.log(daten);
        $("#autoid").val(daten[0].id);
        $("#name").val(daten[0].name);
        $("#kraftstoff").val(daten[0].kraftstoff);
        $("#farbe").val(daten[0].farbe).change();
        $("#bauart").val(daten[0].bauart);
        $("#update").removeClass("hidden");
        //selectDaten();
      },
      error: function(){
        console.log("err4");
      },
      complete: function(){
        console.log("nach4");
      },
    });
  }
}
function modifyDaten(){

  var check = true;
  var name = $("#name").val();
  var kraftstoff = $("#kraftstoff").val();
  var farbe = $("#farbe").val();
  var bauart = $("#bauart").val();
  var id = $("#autoid").val();

  if(name && kraftstoff && farbe && bauart && id) {
    check = true;
  }

  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "modifyDaten", id: id, name: name, kraftstoff: kraftstoff, farbe: farbe, bauart: bauart },
      dataType: "JSON",
      beforeSend: function(){
        console.log("bs4");
      },
      success: function(){
        selectDaten();
        $("#update").addClass("hidden");
        $("#topdivsuccess").addClass("hidden");
        $("#topdivwarning").removeClass("hidden");
        $("#topdivdanger").addClass("hidden");
        $("#topdivnotfilled").addClass("hidden");
      },
      error: function(){
        console.log("err4");
      },
      complete: function(){
        console.log("nach4");
      },
    });
  }
}
/*function SecondFunc(){
  var check = true;
  var anzTankungen = 0;


  if(check) {
    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { aktion: "tanken", anzTankungen: anzTankungen },
      dataType: "JSON",
      beforeSend: function(){
        console.log("bs");
      },
      success: function(Tankungen){
        console.log(Tankungen);

        var html = "";
        if(daten.status){

        }

      },
      error: function(){
        console.log("err");
      },
      complete: function(){
        console.log("nach");
      },
    });
  }



}*/
