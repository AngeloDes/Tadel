<?php

//Klassen
//echo $_SERVER["PHP_SELF"];


class Auto {
  private $farbe;         //Schwarz, Weiss, Silber
  private $kraftstoff;    //Diesel, Benzin
  private $bauart;        //Cabrio, Limousine, Kombi
  private $name;
  private $daten;
  private $antwort;
  private $code;          //HTTP Statuscode /200 OK   418 Not ok
  private $anzTankungen = 0;



  public function setName($name){
    $this->name = $name;
  }

  public function setKraftstoff($kraftstoff){
    $this->kraftstoff = $kraftstoff;
  }

  public function setFarbe($farbe){
    $this->farbe = $farbe;
  }

  public function setBauart($bauart){
    $this->bauart = $bauart;
  }

  /*public function addTankungen(){
    $this->anzTankungen++;
    $_SESSION["anzTankungen"] = anzTankungen;
  }

  public function getTankungen(){
    http_response_code(200);
    echo json_encode($anzTankungen);
  }*/

  public function saveAuto(){
    include("dbconn.php");
    $sql = "INSERT INTO privat (name, kraftstoff, farbe, bauart)
    VALUES ('$this->name', '$this->kraftstoff', '$this->farbe', '$this->bauart');";

    if ($conn->query($sql) === TRUE) {
      /*$this->Daten = array(
        "status" => true,
        "name" => $this->name,
        "kraftstoff" => $this->kraftstoff,
        "farbe" => $this->farbe,
        "bauart" => $this->bauart,
        "code" => $this->code);*/
      //echo "New records created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      /*$this->code = 418;
      $this->daten = array(
        "status" => false,
        "code" => $this->code);*/
    }

    http_response_code($this->code);
    echo json_encode($this->daten, $this->code);
  }

  public function selectData(){
    include("dbconn.php");
    $sql = "SELECT * FROM privat";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $this->code = 200;
        $this->daten = array();
        while($row = $result->fetch_assoc()) {
          $this->daten[] = $row;
        }
    } else {
        echo "0 results";
        $this->code = 418;
    }

    http_response_code($this->code);
    echo json_encode($this->daten, $this->code);
  }

  // public function autoDaten(){
  //   echo "<h3> Daten vom Auto " . $this->name . "</h3>";
  //   echo "<p>Kraftstoff: " . $this->kraftstoff . "</p>";
  //   echo "<p>Farbe: " . $this->farbe . "</p>";
  //   echo "<p>Bauart: " . $this->bauart . "</p>";
  // }

  public function getAuto(){ //Array für Daten senden
    if($this->daten){
      $this->daten = array(
        "status" => true,
        "antwort" => $this->antwort,
        "name" => $this->name,
        "kraftstoff" => $this->kraftstoff,
        "farbe" => $this->farbe,
        "bauart" => $this->bauart,
        "code" => $this->code);
    } else {
      $this->code = 418;
      $this->antwort = "Nichts OK!";
      $this->daten = array(
        "status" => false,
        "code" => $this->code,
        "antwort" => $this->antwort);
    }
    //PHP aufbereitung
    http_response_code($this->code);
    echo json_encode($this->daten, $this->code);
  }

  public function datenHolen($id){
    include("dbconn.php");
    $sql = "SELECT * FROM privat WHERE id=" . $id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $this->code = 200;
        $this->daten = array();
        while($row = $result->fetch_assoc()) {
          $this->daten[] = $row;
        }
    } else {
        echo "0 results";
        $this->code = 418;
    }

    http_response_code($this->code);
    echo json_encode($this->daten, $this->code);
  }

  public function deleteData($id){
    include("dbconn.php");
    $sql = "DELETE FROM privat WHERE id=" . $id;
    if (mysqli_query($conn, $sql)) {
        echo true;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
  }

  public function modifyData($id){
    include("dbconn.php");
    $sql = "UPDATE privat SET name='$this->name', bauart='$this->bauart', kraftstoff='$this->kraftstoff', farbe='$this->farbe' WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) {
      echo true;
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }

  function __construct(){
    $this->daten = true;
    $this->antwort = "Alles OK!";
    $this->code = 200;
  }

/*function __destruct(){
    echo "<p>Destruktor von " . $this->name . "</p>";
  }*/

}



 ?>
