<?php
require('DB.php');

class User extends DB
{
    public function getUser()
    {
        return $this->DBAll('SELECT users.id, username, password, role_id, role_name from users, roles WHERE (role_id = roles.id) ORDER BY id');
    }

    public function createUser($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $role_id = $req->role_id;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $sql = $connect->prepare('INSERT INTO serving_comp_tech.users (username,password, role_id) values (:username,:password, :role_id)');
            $sql->execute([
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id,
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
        $role_id = $req->role_id;
        $connect = $this->connect();
        try {
            $connect->beginTransaction();
            $connect->exec("UPDATE users SET username='{$username}', password='{$password}', role_id='{$role_id}' WHERE id='{$id}'");
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

    public function deleteUser($request)
    {
        $req = json_decode($request);
        return $this->transaction('DELETE from users where id=' . $req->id,
            'Пользователь удален');
    }
}