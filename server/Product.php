<?php

require_once 'BLL.php';

class Product
{

    private $product_id;
    const Product_table = 'crm_products';

    public static function getProducts()
    {
        return BLL::getAll(self::Product_table);

    }

    public static function getProductsIds()
    {
        return BLL::getAllIds(self::Product_table);

    }

}




?>
