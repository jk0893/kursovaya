<?php
require('DB.php');

class User extends DB
{
    public function getUser()
    {
        return $this->DBAll($this->connect(),
            'SELECT * from serving_comp_tech.users
            join serving_comp_tech.roles on role_id=roles.id');
    }

    public function deleteUser($request)
    {
        $req = json_decode($request);
        return $this->transaction($this->connect(),
            'DELETE from serving_comp_tech.users where username=' . $req->id,
            'Пользователь удален');
    }

    public function createUser($request)
    {
        $req = json_decode($request);
        $name = $req->name;
        $pass = $req->password;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $sql = $connect->prepare('SELECT users.id as id,users.username as name from serving_comp_tech.users;
            INSERT INTO serving_comp_tech.users (username,password) values (:name,:password);');
            $sql->execute([
                'name' => $name,
                'password' => $pass
            ]);
            $connect->commit();
            return json_encode([
                'message' => 'Пользователь добавлен'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }

}