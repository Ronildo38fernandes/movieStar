<?php
class User{
        public $id;
        public $name;
        public $lastname;
        public $email;
        public $password;
        public $image;
        public $bio;
        public $token;
}

interface UserDaoInterface {
        public function buildUser($data);
        public function create(User $user, $authUser = false);
        public function update(User $user);  
        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function autenticateUser($email, $password);
        public function findByToken($token);
        public function findByEmail($email);
        public function findById($id);
        public function changePassword(User $user);
}