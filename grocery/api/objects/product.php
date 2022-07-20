<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "product";
  
    // object properties
    public $product_id;
    public $product_name;
    public $product_price;
    public $category_id;
    public $category_name;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //READ product
    function read(){
  
        // select all query
        $query = "SELECT
                    c.name as category_name, p.product_id, p.product_name,p.product_price, p.category_id
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
// create product
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                product_name=:name, product_price=:price, category_id=:category_id";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
  
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":category_id", $this->category_id);
  
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
                product_name = :name,
                product_price = :price,
                category_id = :category_id
            WHERE
                product_id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE product_id = ?";
  
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
// search products
function search($keywords){
  
    // select all query
    $query = "SELECT
                c.name as category_name, p.product_id, p.product_name, p.product_price, p.category_id
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.product_name LIKE ? OR c.name LIKE ?";
  
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