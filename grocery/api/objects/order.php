<?php
class Order{
  
    // database connection and table name
    private $conn;
    private $table_name = "my_order";
  
    // object properties
    public $id;
    public $name;
    public $phone;
    public $email;
    public $payment_method;
    public $address;
    public $total_products;
    public $total_price;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //READ product
    function read(){
  
        // select all query
        $query = "SELECT
                    id,name,phone,email,payment_method,address,total_products,total_price
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
                    name=:name, phone=:phone, email=:email, payment_method=:payment_method, 
                    address=:address, total_products=:total_products, total_price=:total_price";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->payment_method=htmlspecialchars(strip_tags($this->payment_method));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->total_products=htmlspecialchars(strip_tags($this->total_products));
        $this->total_price=htmlspecialchars(strip_tags($this->total_price));
        
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":payment_method", $this->payment_method);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":total_products", $this->total_products);
        $stmt->bindParam(":total_price", $this->total_price);
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
    // update the product
    function update(){
      
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    phone = :phone,
                    email = :email,
                    payment_method = :payment_method,
                    address = :address,
                    total_products =:total_products,
                    total_price = :total_price
                WHERE
                    id = :id";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->payment_method=htmlspecialchars(strip_tags($this->payment_method));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->total_products=htmlspecialchars(strip_tags($this->total_products));
        $this->total_price=htmlspecialchars(strip_tags($this->total_price));
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':payment_method', $this->payment_method);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':total_products', $this->total_products);
        $stmt->bindParam(':total_price', $this->total_price);
        $stmt->bindParam(':id', $this->id);
      
        // execute the query
        if($stmt->execute()){
            return true;
        }
      
        return false;
    }
    // delete order
    function delete(){
      
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      
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
    // search order
    function search($keywords){
      
        // select all query
        $query = "SELECT
                    id,name,phone,email,payment_method,address,total_products,total_price
                FROM
                    " . $this->table_name . " 
                WHERE
                    name LIKE ? OR email LIKE ? OR payment_method LIKE ? OR address LIKE ?";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
      
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->bindParam(4, $keywords);
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
}