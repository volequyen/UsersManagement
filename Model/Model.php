<?php
    include_once("../Model/Entity.php");
    class Model{
        public function __construct(){

        }
        public function getAll(){
            $link = mysqli_connect("localhost","root","") or die("Couldn't connect to database");
            mysqli_select_db($link, "user_db");
            $query = "SELECT * FROM user";
            $result = mysqli_query($link, $query);
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $password = $row['password'];
                $role = $row['role'];
                $users[$i++] = new Entity($firstname, $lastname, $username, $password, $role);
            }
            return $users;
        }

        public function checkExists($username, $password){
            $link = mysqli_connect("localhost", "root", "", "user_db") or die("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $rs = mysqli_query($link, $query);
            if(mysqli_fetch_array($rs)){
                return true;
            }
            else return false;
        }
        public function getUserByUsername($username){
            $link = mysqli_connect("localhost", "root", "", "user_db") or die("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "SELECT * FROM user WHERE username = '$username'";
            $rs = mysqli_query($link, $query);
            if($user = mysqli_fetch_array($rs)){
                return $user['lastname'];
            }
            else return null;
        }
        public function getUserDetail($username){
            $link = mysqli_connect("localhost", "root", "", "user_db") or die("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "SELECT * FROM user WHERE username = '$username'";
            $rs = mysqli_query($link, $query);
            if($result= mysqli_fetch_array($rs)){
                return $result;
        }
    }

        public function searchUser($search_value){
            $link = mysqli_connect("localhost", "root", "", "user_db") or die ("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $search_value = mysqli_real_escape_string($link, $search_value);

            $query = "SELECT * FROM user WHERE firstname like '%$search_value%' or lastname like '%$search_value%'";
            $rs = mysqli_query($link, $query);
                
            $result = [];
            $i = 0;
            if ($rs && mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_assoc($rs)) {
                    $result[$i++] = new Entity($row['firstname'], $row['lastname'], $row['username'], $row['password'], $row['role']);
                }
            }
            mysqli_close($link); 
            return $result; 
        }

        public function deleteUser($username){
            $link = mysqli_connect("localhost","root","", "user_db") or die ("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "DELETE FROM user WHERE username = '$username'";
            mysqli_query($link, $query);
            mysqli_close($link);
        }

        public function updateUser($username,$lastname,$role){
            $link = mysqli_connect("localhost","root","", "user_db") or die ("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "UPDATE user SET lastname = '$lastname', role = '$role' WHERE username = '$username'";
            mysqli_query($link, $query);
            mysqli_close($link);
        }
        public function CheckUsernameExists($username){
            $link = mysqli_connect("localhost","root","", "user_db") or die ("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "SELECT * FROM user WHERE username = '$username'";
            $rs = mysqli_query($link, $query);
            if(mysqli_fetch_array($rs)){
                return true;
            }
            else return false;
        }
        public function addUser($firstname, $lastname, $username, $password, $role){
            $link = mysqli_connect("localhost","root","", "user_db") or die ("Khong the ket noi database");
            mysqli_select_db($link, "user_db");
            $query = "INSERT INTO user (firstname, lastname, username, password, role) VALUES ('$firstname', '$lastname', '$username', '$password', '$role')";
            mysqli_query($link, $query);
            mysqli_close($link);
        }

        public function logout() {
            session_unset();
            session_destroy();
        }
    }
?>