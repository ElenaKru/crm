<?php

require_once 'server/Lead.php';
require_once 'server/Product.php';

//    var_dump($_REQUEST);
//    exit();
    if(isset($_POST["action"])){
        $action = $_POST["action"];

        switch ($action) {
            case "getLeads":
                $data = Lead::getLeads();
                break;
            case "getLeadById":
                $data = Lead::getLeadById($_POST["id"]);
                break;
            case "getLeadsIds":
                $data = Lead::getLeadsIds();
                break;
            case "updateLead":
                $data = Lead::updateLead($_POST["data"]);
                break;
            case "getProductsIds":
                $data = Product::getProductsIds();
                break;
            case "getProducts":
                $data = Lead::getProducts();
                break;
        }

        if($data === ""){
            echo json_encode(['status' => 2]); // No row with this id
        } else {
            echo json_encode(['status' => 0, 'data' => $data]);
        }
    }
    else {
        echo json_encode(['status' => 1]);
    }


?>