<?php
require ('DB.php');

class Warehouse extends DB
{
    public function getWarehouse(){
        return $this->DBAll($this->connect(),'SELECT * from serving_comp_tech.warehouse');
    }
    
    public function createWarehouse($request)
    {
        $req = json_decode($request);
        $hardware_name = $req->hardware_name;
        $quantity = $req->quantity;
        $price = $req->price;
        $connect = $this->connect();
        try{
            $connect->beginTransaction();
            $connect->exec("INSERT INTO serving_comp_tech.warehouse(hardware_name,quantity,price)
values ('{$hardware_name}','{$quantity}','{$price}')");
            $connect->commit();
            return json_encode([
                'message'=>'Товар(услуга) добавлен(а)'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }
}