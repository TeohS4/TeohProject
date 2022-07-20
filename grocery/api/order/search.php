<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../database.php';
include_once '../objects/order.php';
  
// instantiate database and order object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$order = new Order($db);
  
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
  
// query order
$stmt = $order->search($keywords);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // order array
    $order_arr=array();
    $order_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $order_item=array(
            "id" => $id,
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "payment_method" => $payment_method,
            "address" => $address,
            "total_products" => $total_products,
            "total_price" => $total_price
        );
  
        array_push($order_arr["records"], $order_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show orders data
    echo json_encode($order_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the order no order found
    echo json_encode(
        array("message" => "No order found.")
    );
}
?>