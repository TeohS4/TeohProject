<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../database.php';
include_once '../objects/order.php';
  
$database = new Database();
$db = $database->getConnection();
  
$order = new Order($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->phone) &&
    !empty($data->email) &&
    !empty($data->payment_method) &&
    !empty($data->address) &&
    !empty($data->total_products) &&
    !empty($data->total_price) 
){
  
    // set product property values
    $order->name = $data->name;
    $order->phone = $data->phone;
    $order->email = $data->email;
    $order->payment_method = $data->payment_method;
    $order->address = $data->address;
    $order->total_products = $data->total_products;
    $order->total_price = $data->total_price;

    // create the product
    if($order->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "New order was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create order."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create order. Data is incomplete."));
}
?>