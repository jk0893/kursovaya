<?php

require('DB.php');

class Auth extends DB
{
    public function login($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT users.id,username,password,role_id,avatar, role_name from users,roles
                                                where username=:username and password=:password and role_id=roles.id');
        $sql->execute([
            'username' => $username,
            'password' => $password,
        ]);
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            session_start();
            $_SESSION['user'] = (object)[
                'id' => $data->id,
                'username' => $data->username,
                'avatar' => $data->avatar,
                'role_id' => $data->role_id,
                'role_name'=>$data->role_name
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
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            $_SESSION['user'] = (object)[
                'username' => $data->username,
                'password' => $data->password,
                'role_id' => $data->role_id,
                'avatar' => $data->avatar
            ];
            return json_encode([
                'message' => 'Пользователь добавлен'
            ]);
        }

    }
}