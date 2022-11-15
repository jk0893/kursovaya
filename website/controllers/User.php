<?php
require('db.php');

class User extends DB
{
    public function getUser()
    {
        return $this->DBAll($this->standard(),
            'SELECT users.id as id,users.username as name, users.password as password from serving_comp_tech.users
join serving_comp_tech.roles on role_id=roles.id');
    }

    public function deleteUser($request)
    {
        $req = json_decode($request);
        return $this->transaction($this->standard(),
            'DELETE from serving_comp_tech.users where username=' . $req->id,
            'Пользователь удален');
    }

    public function createUser($request)
    {
        $req = json_decode($request);
        $name = $req->name;
        $pass = $req->password;
        $connect = $this->standard();
        try {
            $connect->beginTransaction();
            $sql=$connect->prepare('SELECT users.id as id,users.username as user from serving_comp_tech.users;
            INSERT INTO serving_comp_tech.users (users.username,users.password,) values (:name,:password);');
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