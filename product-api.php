<?php

require_once 'server/Lead.php';
require_once 'server/Product.php';

//    var_dump($_REQUEST);
//    exit();

$method = $_SERVER['REQUEST_METHOD'];
parse_str(file_get_contents("php://input"), $request_vars);

switch ($method) {
    case "POST":
        $data = Product::createProduct($_POST["data"]);
        break;
    case "GET":
        $action = $_GET["action"];
        switch ($action) {
            case "getProductsIds":
                $data = Product::getProductsIds();
                break;
            case "getProducts":
                $data = Product::getProducts();
                break;
        }
        break;
    case "PUT":
        $data = Product::updateProduct($request_vars["data"]);
        break;
    case "DELETE":
        $data = Product::deleteProduct($request_vars["id"]);
        break;
}
if($data === ""){
    echo json_encode(['status' => 2]); // No row with this id
} else {
    echo json_encode(['status' => 0, 'data' => $data]);
}
exit();

?>