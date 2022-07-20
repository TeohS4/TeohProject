<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $user_id;
    public $username;
    public $email;
    public $password;
    public $gender;
    public $address;
    public $dob;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
  
        // select all query
        $query = "SELECT
                    user_id,username,email,password,gender,address,dob
                FROM
                    " . $this->table_name ."";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }

function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                username=:username, email=:email, password=:password, gender=:gender, address=:address, dob=:dob";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->dob=htmlspecialchars(strip_tags($this->dob));
    
    // bind values
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":gender", $this->gender);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":dob", $this->dob);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
// update the user
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                username = :username,
                email = :email,
                password = :password,
                gender = :gender,
                address = :address,
                dob = :dob
            WHERE
                user_id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->dob=htmlspecialchars(strip_tags($this->dob));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind new values
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':address', $this->address);
    $stmt->bindParam(':dob', $this->dob);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// delete users
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// search user
function search($keywords){
  
    // select all query
    $query = "SELECT
                user_id,username,email,password,gender,address,dob
            FROM
                " . $this->table_name . " 
            WHERE
                username LIKE ? OR email LIKE ?";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
  
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
}