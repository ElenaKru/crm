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

    public static function updateProduct($data)
    {
        $updatedFields = [
            'product_name' => $data['product_name']
        ];
        return BLL::updateItemById(self::Product_table,  $data['id'], $updatedFields);
    }


    public static function deleteProduct($id)
    {
        return BLL::deleteItemById(self::Product_table, $id);

    }

    public static function createProduct($data)
    {
        $createdFields = [
            'product_name' => $data['product_name']
        ];
        return BLL::createItem(self::Product_table, $createdFields);
    }
}
?>
