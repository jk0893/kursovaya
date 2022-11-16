<?php
require ('db.php');

class Services extends DB
{
    public function getUslugi(){
        return $this->DBAll($this->standard(),
            'SELECT * from serving_comp_tech.services');
    }

    public function createUslugi($request)
    {
        $req = json_decode($request);
        $name = $req->name;
        $type = $req->type;
        $price = $req->price;
        $connect = $this->standard();
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
}