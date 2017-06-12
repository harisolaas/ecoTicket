<?php
require_once 'class.UsersRepo.php';
require_once '../support.variables.php';
class MySQLUsersRepo extends UsersRepo{

    public $db;

    public function __construct(){
        $this->db = new PDO($dbDSN,$dbUser,$dbPass);
    }

    public function getUserByMail($mail){
        $query = $this->db->query('SELECT * from users where mail = '.$mail);
        $query = $query->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }

    public function getUserField($mail, $field){
        $query = $this->db->query('SELECT '.$field.' from users where mail = '.$mail);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query;
    }

    public function saveUser(User $user)
    {
        $insert = "INSERT INTO users (id_json, name, last_name, pass, mail, avatar_path) VALUES (?,?,?,?,?,?)";
        $insert = $this->db->prepare($insert);
        $insert->execute([$user->id,$user->name,$user->lastName,$user->pass,$user->mail,'']);
    }
}
