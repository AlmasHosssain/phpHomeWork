<?php 

    include_once 'Session.php';
    include 'Database.php';

    class User{
        private $db;
        public function __construct(){
            $this -> db = new Database();
        }

        //Registration Work

        public function userRegistration($data){
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $phone = $data['phone'];
            $email = $data['email'];
            $password = $data['password'];

            $chk_email = $this->emailCheck($email);

            if ($firstName == "" OR $lastName == "" OR $phone == "" OR $email == "" OR $password == "") {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Field must not be empty</div>";
                return $msg;
            }


            if (filter_var($email,FILTER_VALIDATE_EMAIL)=== false) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The email address is not valid!</div>";
                return $msg;
            }

            if ($chk_email == true) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address already Exist!</div>";
                return $msg;
            }

            if(strlen($password) < 6 ) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Minimum length f password should be 6!</div>";
                return $msg;
            }

            $password = md5($data['password']);
            $sql = "INSERT INTO user (firstName, lastName, phone, email, password) VALUES(:firstName, :lastName, :phone, :email, :password)";

            $query = $this->db->pdo->prepare($sql);

            $query->bindValue(':firstName', $firstName);
            $query->bindValue(':lastName', $lastName);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $result =  $query->execute();
            if ($result) {
                $msg = "<div class='alert alert-success'><strong>Congratulations!! </strong>You have been registered successfully!</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger'><strong>Sorry!! </strong>Registration Failed!</div>";
                return $msg;
            }
        }

        public function emailCheck($email){
            $sql = "SELECT email FROM user WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->rowCount() > 0 ) {
                return true;
            }else {
                return false;
            }
        }

        //Login Work
        public function getLoginUser($email, $password)
        {
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function userLogin($data){

            $email = $data['email'];
            $password = md5($data['password']); 
            $chk_email = $this->emailCheck($email);

            if ($email == "" OR $password == "") {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Field must not be empty</div>";
                return $msg;
            }

            if (filter_var($email,FILTER_VALIDATE_EMAIL)=== false) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The email address is not valid!</div>";
                return $msg;
            }

            if ($chk_email == false) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address not Exist!</div>";
                return $msg;
            }

            $result = $this->getLoginUser($email, $password);  
            if ($result) {
                Session::init();
                Session::set("login", true);
                Session::set("id", $result->id);
                Session::set("firstName", $result->firstName);
                Session::set("lastName", $result->lastName);
                Session::set("phone", $result->phone);
                Session::set("email", $result->email);
                Session::set("loginMsg", "<div class='alert alert-success'><strong>Success!! </strong>You are Logged In</div>");
                header("Location: profile.php");

            } else {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>No such users available</div>";
                return $msg;
            }
        }

        //Update work
        public function getUserById($userId){
            $sql = "SELECT * FROM user WHERE id = :id LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $userId);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function updateUserData($userId, $data){
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $phone = $data['phone'];
            $email = $data['email'];

            if ($firstName == "" OR $lastName == "" OR $phone == "" OR $email == "") {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Field must not be empty</div>";
                return $msg;
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The email address is not valid!</div>";
                return $msg;
            }

            //Data storing Portion 
            $sql = "UPDATE user set 
                        firstName = :firstName,
                        lastName = :lastName,
                        phone = :phone,
                        email = :email
                        WHERE id = :userId";
            $query = $this->db->pdo->prepare($sql);

            $query->bindValue(':firstName', $firstName);
            $query->bindValue(':lastName', $lastName);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':email', $email);
            $query->bindValue(':userId', $userId);
            $result =  $query->execute();
            if ($result) {
                $msg = "<div class='alert alert-success'><strong>Success!! </strong>User data updated successfully!</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger'><strong>Sorry!! </strong>User Data not updated!</div>";
                return $msg;
            }
        }

        //check password
        private function checkPassword($id, $oldPass) {
            $password = md5($oldPass);

            $sql = "SELECT password FROM user WHERE id = :id AND password = :password";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $id);
            $query->bindValue(':password', $password);
            $query->execute();
            if ($query->rowCount() > 0 ) {
                return true;
            }else {
                return false;
            }

        }

        //Update password
        public function updatePassword($id, $data){
            $oldPass = $data['oldPass'];
            $newPass = $data['newPass'];
            $chk_pass = $this->checkPassword($id, $oldPass);

            if ($oldPass == "" OR $newPass == "" ) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Field must not be empty!</div>";
                return $msg;
            }

            if ($chk_pass == false) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Old password no matched!</div>";
                return $msg;
            }

            if(strlen($newPass) < 6 ) {
                $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Minimum length f password should be 6!</div>";
                return $msg;
            }

            $password = md5($newPass);

            $sql = "UPDATE user set 
                        password = :password 
                        WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);

            $query->bindValue(':password', $password);
            $query->bindValue(':id', $id);
            $result =  $query->execute();
            if ($result) {
                $msg = "<div class='alert alert-success'><strong>Success!! </strong>Password updated successfully!</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-danger'><strong>Sorry!! </strong>Password not updated!</div>";
                return $msg;
            }
        }
    }

?>