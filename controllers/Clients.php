<?php
require('DB.php');

class Clients extends DB
{
    public function getClients()
    {
        return $this->DBAll('SELECT * from clients ORDER BY id');
    }

    public function createClients($request)
    {
        $req = json_decode($request);
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $father_name = $req->father_name;
        $birth_date = $req->birth_date;
        $passport_s_n = $req->passport_s_n;
        $phone_number = $req->phone_number;
        $address = $req->address;
        $user_id = $req->user_id;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("INSERT INTO clients (first_name, last_name, father_name, birth_date, passport_s_n, phone_number, address, user_id) values ('{$first_name}','{$last_name}','{$father_name}', '{$birth_date}', '{$passport_s_n}', '{$phone_number}', '{$address}', '{$user_id}')");
            $connect->commit();
            return json_encode([
                'message' => 'Клиент добавлен'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updateClients($request)
    {
        $req = json_decode($request);
        $id= $req-> id;
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $father_name = $req->father_name;
        $birth_date = $req->birth_date;
        $passport_s_n = $req->passport_s_n;
        $phone_number = $req->phone_number;
        $address = $req->address;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("UPDATE clients SET first_name='{$first_name}', last_name='{$last_name}', father_name='{$father_name}', birth_date='{$birth_date}', passport_s_n='{$passport_s_n}', phone_number='{$phone_number}', address='{$address}' WHERE id='{$id}'");
            $connect->commit();
            return json_encode([
                'message' => 'Клиент обновлён'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleteClients($request)
    {
        $req = json_decode($request);
        return $this->transaction('DELETE from clients where id=' . $req->id,
            'Клиент удален');
    }
}