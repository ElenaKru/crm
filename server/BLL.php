<?php
require_once 'Connection.php';


class BLL {

    public static function updateItemById($table, $id, $data){
        $connection = Connection::getInstance();
        $db = $connection->getDB();
        $strUpdate = '';
        foreach ($data as $key => $value){
            $strUpdate .= $key . ' = :' . $key . ',';
        }
        $strUpdate = substr($strUpdate, 0, -1);
        $query = 'UPDATE ' .  $table . ' SET ' . $strUpdate . ' WHERE id = :id';
        $stmt = $db->prepare($query);
        $data['id'] = $id;
        $stmt->execute($data);
        return 0;
    }
public static function getAll($table){

    $connection = Connection::getInstance();
    $db = $connection->getDB();

    $stmt = $db->prepare('SELECT * FROM ' .  $table);
    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch())
    {
        $result[] = $row;
    }

    return $result;

}

    public static function getOneById($table, $id){

        $connection = Connection::getInstance();
        $db = $connection->getDB();

        $stmt = $db->prepare('SELECT * FROM ' .  $table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row;

    }
    
    public static function getAllIds($table){

        $connection = Connection::getInstance();
        $db = $connection->getDB();

        $stmt = $db->prepare('SELECT id FROM ' .  $table . ' ORDER BY id');
        $stmt->execute();
        $result = [];
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;

    }

    public static function deleteItemById($table, $id){
        $connection = Connection::getInstance();
        $db = $connection->getDB();
        $stmt = $db->prepare('DELETE FROM ' .  $table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return 0;
    }

    public static function createItem($table, $data){
        $connection = Connection::getInstance();
        $db = $connection->getDB();
        $str1 = implode(",", array_keys($data));
        $str2 = ':' . implode(",:", array_keys($data)) ;
        // INSERT INTO proj_employee (name_of_employee,start_of_job) values  (:name_of_employee,:start_of_job)

        $query = "INSERT INTO " .  $table . " (" . $str1 . ") values (" . $str2 . ")";
        $stmt = $db->prepare($query);
        $stmt->execute($data);

        $id = $db->lastInsertId();
        if($id){
            return $id;
        }

        return false;
    }

}