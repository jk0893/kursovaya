<?php

class DB
{
    protected function connect(){
        return new PDO('mysql:host=localhost;dbname=serving_comp_tech;charset=utf8','root','');
    }
    protected function DBAll(){
        return $this->connect();
        $sql = $connect->query($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    protected function transaction($connect,$query,$message){
        try{
            $connect->beginTransaction();
            $connect->exec($query);
            $connect->commit();
            return json_encode([
                'message'=>$message
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }

}