<?php
require ('db.php');

class Warehouse extends DB
{
    protected function standard(){
        return $this->connect('localhost','serving_comp_tech','root','');
    }

    public function getData(){
        return $this->DBAll($this->standard(),
            'SELECT id as id, hardware_name as hardware_name, quantity as quantity, price as price from serving_comp_tech.warehouse');
    }
    
    public function createData($request)
    {
        $req = json_decode($request);
        $hardware_name = $req->hardware_name;
        $quantity = $req->quantity;
        $price = $req->price;
        $connect = $this->standard();
        try{
            $connect->beginTransaction();
            $connect->exec('INSERT INTO serving_comp_tech.warehouse(hardware_name,quantity,price)
values ("'.$hardware_name.'","'.$quantity.'",'.$price .')');
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