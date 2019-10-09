<?php 
  // Headers
  
  include_once '../config/Database.php';
  include_once '../models/Lead.php';
  include_once '../config/Headers.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate lead object
  $lead = new Lead($db);
  //Get raw posted data

  $data = json_decode(file_get_contents('php://input'));

    //get id
  $lead->id = isset($_GET['id'])? $_GET['id'] : die();
 
  //delete lead

  if($lead->deleteLead()){
      echo json_encode(
          array('message'=> 'Lead deleted')
      );
  } 

  else{ 
    echo json_encode(
        array('message'=> 'Lead Not deleted')
    );
  }