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
            ];
        }
    }

    public function registration($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $role_id = 3;
        $avatar = $req->avatar;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT * from users where username=:username and password=:password');
        $sql->execute(array(
            'username' => $username,
            'password' => $password
        ));
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            return json_encode([
                'message' => "Такой пользователь существует"
            ]);
        }
        $sql = $connect->prepare("INSERT INTO users(username,password, role_id, avatar) values (:username,:password,:role_id, :avatar)");
        $sql->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
            'avatar' => $avatar
        ]);
        $sql = $connect->prepare('SELECT * from users where username=:username and password=:password and role_id=:role_id and avatar=:avatar');
        $sql->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id,
            'avatar' => $avatar
        ]);
        $data = $sql->fetch();
        if ($data) {
            $_SESSION['user'] = array([
                'username' => $data->username,
                'password' => $data->password,
                'role_id' => $data->role_id,
                'avatar' => $data->path
            ]);
            return json_encode([
                'message' => 'Пользователь добавлен'
            ]);
        }
    }
}