<?php

require_once 'server/Lead.php';
require_once 'server/Product.php';

//    var_dump($_REQUEST);
//    exit();

$method = $_SERVER['REQUEST_METHOD'];
parse_str(file_get_contents("php://input"), $request_vars);

switch ($method) {
    case "POST":
        $data = Lead::createLead($_POST["data"]);
        break;
    case "GET":
        $action = $_GET["action"];
        switch ($action) {
            case "getLeads":
                $data = Lead::getLeads();
                break;
            case "getLeadById":
                $data = Lead::getLeadById($_GET["id"]);
                break;
            case "getLeadsIds":
                $data = Lead::getLeadsIds();
                break;
            case "getProductsIds":
                $data = Product::getProductsIds();
                break;
            case "getProducts":
                $data = Lead::getProducts();
                break;
        }
        break;
    case "PUT":
        $data = Lead::updateLead($request_vars["data"]);
        break;
    case "DELETE":
        $data = Lead::deleteLeadById($request_vars["id"]);
        break;
}
if($data === ""){
    echo json_encode(['status' => 2]); // No row with this id
} else {
    echo json_encode(['status' => 0, 'data' => $data]);
}
exit();

//
//}
//else {
//    $method = $_SERVER['REQUEST_METHOD'];
//    var_dump($_REQUEST);
//    exit();
//    echo json_encode(['status' => 1]);
//}


?>