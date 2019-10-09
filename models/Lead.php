<?php
class Lead{
    //Db stuff
    private $conn;
    private $table = 'leads';
    //lead properties
    public $id;
    public $name;
    public $phone;
    public $state;
    public $city;
    public $zip;
    public $contact_method;
    public $buy_indicator;
    //constructor wih db
    public function __construct($db){
        $this->conn = $db;
    }
    // Get leads
    public function getAllLeads() {
        // Create query
       /*
        get leads sorted by who is more likely to buy
        gnoring those ineligble
       */
        $query = 'SELECT * FROM '. $this->table . ' WHERE buy_indicator > 0 ORDER BY buy_indicator DESC ';
        
        // Prepared statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
      }

      //post lead
      public function addLead(){
        $query = 'INSERT INTO ' . $this->table . '
        SET
        name = :name,
        phone = :phone,
        state = :state,
        city = :city,
        zip = :zip,
        contact_method = :contact_method,
        buy_indicator = :buy_indicator';
        

        //prepare statment
        $stm = $this->conn->prepare($query);
        //clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->zip = htmlspecialchars(strip_tags($this->zip));
        $this->contact_method = htmlspecialchars(strip_tags($this->contact_method));
        $this->buy_indicator = htmlspecialchars(strip_tags($this->buy_indicator));

        
  

        //bind data
        $stm->bindParam(':name',$this->name);
        $stm->bindParam(':phone',$this->phone);
        $stm->bindParam(':state',$this->state);
        $stm->bindParam(':city',$this->city);
        $stm->bindParam(':zip',$this->zip);
        $stm->bindParam(':contact_method',$this->contact_method);
        $stm->bindParam(':buy_indicator',$this->buy_indicator);

        //execute stmt

        if($stm->execute()){
          return true;
        }
        else{
          //prnt errror if something goes wrong
          printf("Error: %s \n", $stm->error);
          return false;
        }
      }
      //get single lead
      //GET/id
      public function getOneLead(){
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';
                                    
      // Prepare statement
       $stm = $this->conn->prepare($query); 
      //bind ID
      $stm->bindParam(1, $this->id);

      //execute querry
      $stm->execute();

      $row = $stm->fetch(PDO::FETCH_ASSOC);
      //set propperties
      $this->name = $row['name'];
      $this->phone = $row['phone'];
      $this->state = $row['state'];
      $this->city = $row['city'];
      $this->zip = $row['zip'];
      $this->contact_method = $row['contact_method'];
      }
       //update  lead
       public function updateLead(){
        //create querry
        $query = 'UPDATE ' . $this->table . '
        SET
        name = :name,
        phone = :phone,
        state = :state,
        city = :city,
        zip = :zip,
        contact_method = :contact_method
        WHERE 
        id =:id';

        //prepare statment
        $stm = $this->conn->prepare($query);
        //clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->zip = htmlspecialchars(strip_tags($this->zip));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->contact_method = htmlspecialchars(strip_tags($this->contact_method));

        //bind data
        $stm->bindParam(':name',$this->name);
        $stm->bindParam(':phone',$this->phone);
        $stm->bindParam(':state',$this->state);
        $stm->bindParam(':city',$this->city);
        $stm->bindParam(':zip',$this->zip);
        $stm->bindParam(':contact_method',$this->contact_method);
        $stm->bindParam(':id',$this->id);

        //execute stmt

        if($stm->execute()){
          return true;
        }
        else{
          //prnt errror if something goes wrong
          printf("Error: %s \n", $stm->error);
          return false;
        }
      }
       //delete lead
       public function deleteLead(){
        //create querry
        $query = ' Delete From '. $this->table . ' where id = :id ';
        //prepare statment
        $stm = $this->conn->prepare($query);
        //clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind data
        $stm->bindParam(':id', $this->id);
        
        //execute stmt

        if($stm->execute()){
          return true;
        }
        else{
          //prnt errror if something goes wrong
          printf("Error: %s \n", $stm->error);
          return false;
        }
      }
      
}