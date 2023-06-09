<?php
require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDao($conn,$BASE_URL);


//resgata O TIPO DO FORM
$type = filter_input(INPUT_POST, "type");

//verificação do form se é cadastro ou login

if($type === "register"){
//resgata os input que esta no form
        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

        //verificando dados minimos para cadastro
        
        if($name && $lastname && $password){

                //verifica a confirmação da senha
                if($password === $confirmpassword){

                        //verificar se o email ja esta cadastrado
                        if($userDao->findByEmail($email)===false){

                                echo "não foi encontrado usuários";

                        } else{
                                //email já existe
                                $message->setMessage("E-mail já esta cadastrado","error","back");

                        }


                }else{
                        //senhas não batem
                        $message->setMessage("AS senhas estão diferentes","error","back");
                }

        }else{
                //mandar uma mensage de erro com dados faltantes
                $message->setMessage("Por favor, verificas se preencheou os campos corretamente","error","back");
        }



}else if($type === "login"){

}