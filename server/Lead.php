<?php

require_once 'BLL.php';

class Lead
{

    private $lead_id;
    private $lead_name;
    private $lead_phone;
    private $product_id;
    const lead_table = 'crm_leads';
    const Product_table = 'crm_products';

    public function __construct($ld_id, $ld_name, $ld_phone, $prod_id, $prod_name)
    {
        $this->setID($ld_id);
        $this->setLeadName($ld_name);
        $this->setLeadPhone($ld_phone);
        $this->setProduct_ID($prod_id);
        $this->setProduct_Name($prod_name);
    }

    public function getID()
    {
        return $this->id;
    }

    public function getLeadName()
    {
        return $this->lead_name;
    }

    public function getLeadPhone()
    {
        return $this->lead_phone;
    }

    public function getProduct_ID()
    {
        return $this->product_id;
    }

    public function getProduct_Name()
    {
        return $this->product_name;
    }

    public function setID($ld_id)
    {
        $this->id = $ld_id;
    }

    public function setLeadName($ld_name)
    {
        $this->lead_name = $ld_name;
    }

    public function setLeadPhone($ld_phone)
    {
        $this->lead_phone = $ld_phone;
    }

    public function setProduct_ID($prod_id)
    {
        $this->product_id = $prod_id;
    }

    public function setProduct_Name($prod_name)
    {
        $this->product_name = $prod_name;
    }

    public static function getLeads()
    {
        return BLL::getAll(self::lead_table);

    }

    public static function getLeadById($id)
    {
        return BLL::getOneById(self::lead_table, $id);

    }

    public static function getLeadsIds()
    {
        return BLL::getAllIds(self::lead_table);
    }

    public static function updateLead($data)
    {
        $updatedFields = [
            'lead_name' => $data['lead_name']
        ];
        return BLL::updateItemById(self::lead_table,  $data['id'], $updatedFields);
    }

    public static function getProducts()
    {
        return BLL::getAll(self::Product_table);

    }
}




?>
