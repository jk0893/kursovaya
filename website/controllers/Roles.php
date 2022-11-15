<?php

require('db.php');

class roles extends DB
{
    public function login($request)
    {
        $req = json_decode($request);
        $username = $req->name;
        $password = $req->password;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT * from serving_comp_tech.users where username=:username and password=:password');
        $sql->execute([
            'username' => $username,
            'pass' => $password,
        ]);
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            session_start();
            $_SESSION['user'] = (object)[
                'username' => $data->name,
                'role' => $data->role
            ];
        }
    }

    public function registration($request)
    {
        $req = json_decode($request);
        $username = $req->username;
        $password = $req->password;
        $connect = $this->connect();
        $sql = $connect->prepare('SELECT * from serving_comp_tech.users where username=:username and password=:password');
        $sql->execute(array(
            'username' => $username,
            "password" => $password,
        ));
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            return json_encode([
                'message' => "Такой пользователь существует"
            ]);
        }
        $sql = $connect->prepare("INSERT INTO serving_comp_tech.users(username,password,role_id) values (:name,:pass,:role)");
        $sql->execute([
            'username' => $username,
            "password" => $password,
            "role" => 3
        ]);
        $sql = $connect->prepare('SELECT * from serving_comp_tech.users where username=:username and password=:pass');
        $sql->execute([
            'username' => $username,
            "password" => $password,
        ]);
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($data) {
            session_start();
            $_SESSION['user'] = (object)[
                'last_name' => $data->last_name,
                'name' => $data->name,
                'father_name' => $data->father_name,
                'role' => $data->role
            ];
            return json_encode([
                'message' => 'Пользователь добавлен'
            ]);
        }
    }
}