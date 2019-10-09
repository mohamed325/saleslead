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
  // lead query
  $result = $lead->getAllLeads();
  // Get row count
  $num = $result->rowCount();
  // Check if any leads exist
  if($num > 0) {
    // lead array
    $all_leads = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $alead = array(
        'id' => $id,
        'name' => $name,
        'phone' => $phone,
        'state' => $state,
        'city' => $city,
        'zip' => $zip,
        'contact_method'=> $contact_method
        
      );
      // Push all leads to an array
      array_push($all_leads, $alead);
      
    }
    //putting ohio leads on top
    $ohio_leads = array();
    //if lead is from ohio remove and put to ohio_leads array
    foreach($all_leads as $k=> $v){
      //check if if leads state is ohio
      if(strcasecmp($v['state'], 'oh')===0|| strcasecmp($v['state'], 'ohio')===0){
        //push to ohio leads array
        array_push($ohio_leads,$v);
        //remove from oringal array
        unset($all_leads[$k]);
      }
    }
   //merge two arrays to put ohio leads on top
    $leads_with_ohio_top = array_merge($ohio_leads,$all_leads);
    
    
    // Turn to JSON & output
    echo json_encode($leads_with_ohio_top);
  } else {
    // No leads
    echo json_encode(
      array('message' => 'No leads Found')
    );
  
}