<?php
require_once("models/User.php");

class UserDAO implements UserDaoInterface{

        private $conn;
        private $url;

        public function __construct(PDO $conn, $url){
                $this->conn = $conn;
                $this->url = $url; 

        }

        public function buildUser($data){

                $user = new User();

                $user->id = $data["id"];
                $user->name = $data["name"];
                $user->lastname = $data["lastname"];
                $user->email = $data["email"];
                $user->password = $data["password"];
                $user->image = $data["image"];
                $user->bio = $data["bio"];
                $user->token = $data["token"];
                
                return $user;

        }
        public function create(User $user, $authUser = false){

        }
        public function update(User $user){

        }
        public function verifyToken($protected = false){

        }
        public function setTokenToSession($token, $redirect = true){

        }
        public function autenticateUser($email, $password){

        }
        public function findByToken($token){

        }
        public function findByEmail($email){

                if($email !=""){

                        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email - :email");
                        $stmt->bindParam(":email",$email);
                        $stmt->execute();

                        if($stmt->rowCount()> 0){

                                $data = $stmt->fetch();
                                $user = $this->buildUser($user);
                                return $user;

                        }else{
                                return false;
                        }


                }else{
                        return false;
                }

        }
        public function findById($id){

        }
        public function changePassword(User $user){

        }

}



?>