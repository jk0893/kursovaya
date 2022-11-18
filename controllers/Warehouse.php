<?php
require ('DB.php');

class Warehouse extends DB
{
    public function getWarehouse(){
        return $this->DBAll('SELECT * FROM serving_comp_tech.warehouse');
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
                'message'=>'Предмет добавлен.'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }

    public function deleteWarehouse($request)
    {
        $req = json_decode($request);
        return $this->transaction(
            'DELETE FROM serving_comp_tech.warehouse WHERE id=' . $req->id,
            'Предмет удалён.');
    }

    public function updateWarehouse($request){
        $req = json_decode($request);
        $id = $req->id;
        $hardware_name = $req->hardware_name;
        $quantity = $req->quantity;
        $price = $req->price;
        $connect = $this->connect();
        try{
            $connect->beginTransaction();
            $connect->exec("UPDATE serving_comp_tech.warehouse SET hardware_name='{$hardware_name}', quantity='{$quantity}', price='{$price}' WHERE id={$id} ");
            $connect->commit();
            return json_encode([
                'message'=>'Предмет обновлён.'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }
}