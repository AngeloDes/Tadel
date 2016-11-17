<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
      body {
        font-family: Montserrat;
      }
      #topdivlol{
        margin-top: 10px;
      }
      div.test {
        width: 75%;
        float: left
      }
      div.test2 {
        width: 22%;
        float: right;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div  id="topdivlol" class="col-md-12">
          <div class="alert alert-warning hidden" id="topdivdanger" role="alert"><h3>Daten wurden erfolgreich entfernt!</h3></div>
          <div class="alert alert-success hidden" id="topdivsuccess" role="alert"><h3>Daten wurden erfolgreich hinzugefügt!</h3></div>
          <div class="alert alert-warning hidden" id="topdivwarning" role="alert"><h3>Daten wurden erfolgreich bearbeitet!</h3></div>
          <div class="alert alert-danger hidden" id="topdivnotfilled" role="alert"><h3>Bitte alle Felder ausfüllen</h3></div>
          <h1><a href="" class="fa fa-home fa-lg"></a></h1>
          <br>
            <form method="POST" id="form1">
              <input type="hidden" id="autoid" value="">
              <div class="form-group test">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" value="Winterauto" placeholder="Name">
             </div>
              <div class="form-group test2">
                <label for="farbe">Farbe</label>
                <input class="form-control" id="farbe" type="color" name="farbe" value="#cc00cc" placeholder="Farbe">
              </div>
              <div class="form-group">
                <label for="bauart">Bauart</label>
                  <select class="form-control" id="bauart" name="bauart">
                    <option>Cabrio</option>
                    <option>Limousine</option>
                    <option>Kombi</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="kraftstoff">Kraftstoff</label>
                  <select class="form-control" id="kraftstoff" name="kraftstoff">
                    <option>Benzin</option>
                    <option>Diesel</option>
                    <option>Kerosin</option>
                  </select>
              </div>
            <!--  <div class="form-group">
                <label for="alter">Alter</label>
                <input disabled class="form-control" type="number" name="Alter" value="" placeholder="Alter">
              </div>-->
              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="lol@lol.lol" placeholder="Email">
              </div> -->
              <!-- <div>
                <label class="checkbox-inline"><input disabled name="checkbox2" type="checkbox" value="">Option 1</label>
                <label class="checkbox-inline"><input name="checkbox2" type="checkbox" value="">Option 2</label>
              </div> -->
              <!-- <div>
                <div class="radio">
                  <label><input type="radio" name="radio1">Option 1</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="radio2">Option 2</label>
                </div>
                <div class="radio disabled">
                  <label><input type="radio" name="radio3" disabled>Option 3</label>
                </div>
              </div> -->
              <div>
                <button onclick="firstFunc()" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Eintrag hinzufügen</button>
              <!--  <button type="reset" class="btn btn-default"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp; Formular zurücksetzen</button>-->
          <!--      <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp; Absenden</button>-->
                <button onclick="modifyDaten()" id="update" type="button" class="btn btn-default hidden"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp; Datensatz aktualisieren</button>
              </div>
            </form>
        </div>

        <div class="col-md-12">
          <div id="ergebnis" class="hidden"></div>
          <!--<h1>Objektorientierte Entwicklung <i class="fa fa-ambulance" aria-hidden="true"></i></h1>-->
          <div id="div123">
            <br>
            <table id="tabletest" class="hidden table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Kraftstoff</th>
                  <th>Farbe</th>
                  <th>Bauart</th>
                  <th>Eintrag löschen</th>
                  <th>Eintrag bearbeiten</th>
                <!--  <th>Tankdeckelöffnungen</th>
                  <th>TankDeckel öffnen</th>-->
                </tr>
              </thead>
              <tbody id="tabletestbody">

              </tbody>
            </table>
          </div>

          <?php
            include("classes.php");


          /*  if(!empty($_POST)){
              feldercheck();
            }*/

            //POST variablen zwischenspeichern
          /*print_r($_POST);
            $name = $_POST["name"];
            $farbe = $_POST["farbe"];
            $email = $_POST["email"];
            $checkbox1 = $_POST["checkbox1"];
            $checkbox1 = $_POST["checkbox2"];*/


          //  session_start();
          //  if(!isset($_SESSION["betankungen"])) $_SESSION["betankungen"] = 0;
          //  $golf->autoDaten();

          /*  $BMW = new Auto();
            $BMW->setName("BMW");
            //$golf->tankDeckelOeffnen();
            $BMW->setKraftstoff("Benzin");
            $BMW->tankDeckelOeffnen();
            $BMW->tankDeckelOeffnen();
            $BMW->tankDeckelOeffnen();
            $BMW->tankDeckelOeffnen();
            $BMW->setFarbe("Pink");
            $BMW->setBauart("ROFLKOPTER");
            $BMW->autoDaten();*/

            //getBetankungen();

          ?>
         </div>
      </div>
    </div>
  </body>
</html>
