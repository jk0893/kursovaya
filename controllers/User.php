<?php
require('DB.php');

class User extends DB
{
    public function getUser()
    {
        return $this->DBAll('SELECT serving_comp_tech.users.id, username, password, role_name from users, roles WHERE (role_id = roles.id)');
    }

    public function deleteUser($request)
    {
        $req = json_decode($request);
        return $this->transaction($this->connect(),
            'DELETE from serving_comp_tech.users where id=' . $req->id,
            'Пользователь удален');
    }

    public function createUser($request)
    {
        $req = json_decode($request);
        $username = $req->name;
        $password = $req->password;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $sql = $connect->prepare('INSERT INTO serving_comp_tech.users (username,password) values (:username,:password);');
            $sql->execute([
                'name' => $username,
                'password' => $password
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

    public function updateUser($request)
    {
        $req = json_decode($request);
        $id = $req->id;
        $username = $req->username;
        $password = $req->password;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("UPDATE users SET username='{$username}', password='{$password}' WHERE id={$id} ");
            $connect->commit();
            return json_encode([
                'message' => 'Пользователь обновлён'
            ]);
        } catch (PDOException $e) {
            $connect->rollBack();
            return json_encode([
                'message' => $e->getMessage()
            ]);
        }
    }
}