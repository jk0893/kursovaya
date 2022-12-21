<?php
require('DB.php');

class Employee extends DB
{
    public function getEmployee()
    {
        return $this->DBAll('SELECT employee.id, first_name, last_name, father_name, birth_date, passport_s_n, phone_number, position.name from employee, position WHERE position_id=position.id ORDER BY id');
    }

    public function createEmployee($request)
    {
        $req = json_decode($request);
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $father_name = $req->father_name;
        $birth_date = $req->birth_date;
        $passport_s_n = $req->passport_s_n;
        $phone_number = $req->phone_number;
        $address = $req->address;
        $position_id = $req->position_id;
        $user_id = $req->user_id;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("INSERT INTO employee (first_name, last_name, father_name, birth_date, passport_s_n, phone_number, address, position_id, user_id) values ('{$first_name}', '{$last_name}','{$father_name}', '{$birth_date}', '{$passport_s_n}', '{$phone_number}', '{$address}', '{$position_id}', '{$user_id}')");
            $connect->commit();
            return json_encode([
                'message' => 'Сотрудник добавлен'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updateEmployee($request)
    {
        $req = json_decode($request);
        $id = $req->id;
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
            $connect->exec("UPDATE employee SET first_name='{$first_name}', last_name='{$last_name}', father_name='{$father_name}', birth_date='{$birth_date}', passport_s_n='{$passport_s_n}', phone_number='{$phone_number}', address='{$address}' WHERE id='{$id}'");
            $connect->commit();
            return json_encode([
                'message' => 'Сотрудник обновлён'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleteEmployee($request)
    {
        $req = json_decode($request);
        return $this->transaction('DELETE from employee where id=' . $req->id,
            'Сотрудник удален');
    }
}