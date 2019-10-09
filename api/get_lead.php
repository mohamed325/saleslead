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
  //get id
  $lead->id = isset($_GET['id'])? $_GET['id'] : die();
  //get single lead
  $lead->getOneLead();

  //create array of lead entity
  $lead_entity = array(
    'id'=> $lead->id,
    'name'=>$lead->name,
    'phone'=>$lead->phone,
    'state'=> $lead->state,
    'city'=> $lead->city,
    'zip'=>$lead->zip,
    'contact_method,'=>$lead->contact_method

  );
  //make json
  print_r(json_encode($lead_entity));