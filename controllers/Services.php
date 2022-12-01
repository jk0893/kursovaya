<?php
require('DB.php');

class Services extends DB
{
    public function getService()
    {
        return $this->DBAll('SELECT * from services');
    }

    public function createService($request)
    {
        $req = json_decode($request);
        $name = $req->name;
        $type = $req->type;
        $price = $req->price;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("INSERT INTO services(name,type,price) values ('{$name}','{$type}','{$price}')");
            $connect->commit();
            return json_encode([
                'message' => 'Услуга добавлена'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updateService($request)
    {
        $req = json_decode($request);
        $id = $req->id;
        $name = $req->name;
        $type = $req->type;
        $price = $req->price;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("UPDATE services SET name='{$name}', type='{$type}', price='{$price}' WHERE id='{$id}'");
            $connect->commit();
            return json_encode([
                'message' => 'Услуга обновлена.'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleteService($request)
    {
        $req = json_decode($request);
        return $this->transaction(
            'DELETE FROM services WHERE id=' . $req->id,
            'Услуга удалена.');
    }
}