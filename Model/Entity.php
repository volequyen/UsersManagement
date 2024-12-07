<body>
<?php
    class Entity{
        public $firstname;
        public $lastname;
        public $username;
        public $password;
        public $role;

        public function __construct($_firstname, $_lastname, $_username, $_password, $_role) {
            $this->firstname = $_firstname;
            $this->lastname = $_lastname;
            $this->username = $_username;
            $this->password = $_password;
            $this->role = $_role;
        }
    }
?>
</body>