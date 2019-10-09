<?php 
 
  include_once '../config/Headers.php';
  include_once '../config/Database.php';
  include_once '../models/Lead.php';
  include_once '../logic/buy_indicator.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate lead object
  $lead = new Lead($db);

  //Get raw data

  $data = json_decode(file_get_contents('php://input'));
  $lead->name = $data->name;
  $lead->phone = $data->phone;
  $lead->state = $data->state;
  $lead->city = $data->city;
  $lead->zip = $data->zip;
  $lead->contact_method = $data->contact_method;
  //call business logic to set buyindicator
  $lead->buy_indicator = addBuyIndicator($lead);

  //create lead

  if($lead->addLead()){
      echo json_encode(
          array(
            "name"=>$lead->name,
            "phone"=>$lead->phone,
            "state"=>$lead->state,
            "city"=>$lead->city,
            "zip"=>$lead->zip,
            "contact_method"=>$lead->contact_method


          )
      );
  } 

  else{ 
    echo json_encode(
        array('message'=> 'Lead Not created')
    );
  }