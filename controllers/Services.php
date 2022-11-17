<?php
require ('DB.php');

class Services extends DB
{
    public function getService(){
        return $this->DBAll('SELECT * from serving_comp_tech.services');
    }

    public function createService($request)
    {
        $req = json_decode($request);
        $name = $req->name;
        $type = $req->type;
        $price = $req->price;
        $connect = $this->connect();
        try{
            $connect->beginTransaction();
            $sql=$connect->prepare('INSERT INTO serving_comp_tech.services(name,type,price) values (:name,:type,:price);');
            $sql->execute([
                'name'=>$name,
                'type'=>$type,
                'price'=>$price
            ]);
            $connect->commit();
            return json_encode([
                'message'=>'Услуга(и) добавлена(ы)'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }

    public function updateService($request){
        $req = json_decode($request);
        $id = $req->id;
        $name = $req->name;
        $type = $req->type;
        $price = $req->price;
        $connect = $this->connect();
        try{
            $connect->beginTransaction();
            $connect->exec("UPDATE serving_comp_tech.services SET name='{$name}', type='{$type}', price='{$price}' WHERE id={$id} ");
            $connect->commit();
            return json_encode([
                'message'=>'Услуга(ы) обновлены(ы)'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }
}