<?php

require('DB.php');

class roles extends DB
{
    public function login($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT * from users where username=:username and password=:password');
        $sql->execute([
            'username' => $username,
            'password' => $password,
        ]);
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            session_start();
            $_SESSION['user'] = (object)[
                'username' => $data->username,
                'role_id' => $data->role_id,
            ];
        }
    }

    public function registration($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $role_id = $req->role_id;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT * from users where username=:username and password=:password and role_id=:role_id;');
        $sql->execute(array(
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
        ));
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            return json_encode([
                'message' => "Такой пользователь существует"
            ]);
        }
        $sql = $connect->prepare("INSERT INTO users(username,password, role_id) values (:username,:password,:role_id);
REVOKE ALL PRIVILEGES, GRANT OPTION FROM '$username'@'localhost'");
        $sql->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
        ]);
        $sql = $connect->prepare('SELECT * from users where username=:username and password=:password and role_id=:role_id');
        $sql->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
        ]);
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            session_start();
            $_SESSION['user'] = (object)[
                'username' => $data->username,
                'password' => $data->password,
                'role_id' => $data->role_id,
            ];
            return json_encode([
                'message' => 'Пользователь добавлен'
            ]);
        }
    }
}