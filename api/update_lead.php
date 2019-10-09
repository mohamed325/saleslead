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

  //update properties
   //get id
   $lead->id = isset($_GET['id'])? $_GET['id'] : die();
  $lead->name = $data->name;
  $lead->phone = $data->phone;
  $lead->state = $data->state;
  $lead->city = $data->city;
  $lead->zip = $data->zip;
  $lead->contact_method = $data->contact_method;
  
 

  //update lead

  if($lead->updateLead()){
      echo json_encode(
          array('message'=> 'Lead updated')
      );
  } 

  else{ 
    echo json_encode(
        array('message'=> 'Lead Not updated')
    );
  }