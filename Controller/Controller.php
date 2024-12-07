<?php
    session_start();
    include_once("../Model/Model.php");
    class Controll_User {
        public function invoke() {

            if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $model = new Model();
                $check = $model->checkExists($username, $password);
                if ($check) {
                    $user = $model->getUserByUsername($username);
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user'] = $user;
                    include_once("../View/Search.php");
                }
                else {
                    include_once("../View/LoginError.html");
                }
            }

            else if(isset($_POST['search']) && isset($_POST['search_value'])){
                $search_value = $_POST['search_value'];
                $model = new Model();
                $result = $model->searchUser($search_value);
                include_once("../View/SearchResult.php");
            }
            else if(isset($_GET['username'])){
                $username = $_GET['username'];
                $model = new Model();
                $result = $model->getUserDetail($username);
                if($result){
                    include_once("../View/Detail.php");
                }
               
            }
            else if (isset($_POST['delete']) && isset($_POST['username'])) {
                $username = $_POST['username'];
                $model = new Model();
                $model->deleteUser($username);
                $users = $model->getAll();
                include_once("../View/List.php");
                
            }

            else if(isset($_POST['updateform']) && isset($_POST['username'])) {
                $username = $_POST['username'];
                $model = new Model();
                $result = $model->getUserDetail($username);
                include_once("../View/Update.php");
            }
            else if(isset($_POST['update']) && isset($_POST['username']) && isset($_POST['lastname']) && isset($_POST['role'])){
                $username = $_POST['username'];
                $lastname = $_POST['lastname'];
                $role = $_POST['role'];
                $model = new Model();
                $model->updateUser($username, $lastname, $role);
                $users = $model->getAll();
                include_once("../View/List.php");
            }
            else if (isset($_POST['register']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['role'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $role = $_POST['role'];
            
                $model = new Model();
                $check = $model->CheckUsernameExists($username);
                if($check){
                    echo "
                        <script>
                            alert('Username already exists!');
                        </script>
    
                    ";
                    include_once("../View/Register.html");
                }
                else {
                    $model->addUser($firstname, $lastname, $username, $password, $role);
                    include_once("../View/Login.html");
                }
            }            
            else if (isset($_GET['logout'])) { 
                $model = new Model();
                $model->logout();
                include_once("../View/Login.html");
                exit();
            }
            
        }
    };
    $C_User = new Controll_User();
    $C_User->invoke();
?>
