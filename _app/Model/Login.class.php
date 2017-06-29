<?php

class Login {

    private $user;
    private $pass;
    private $alert;
    private $result;
    private $read;

    function __construct() {
        $this->read = new Read;
    }

    /**
     * <b>Login: </b>Utiliza a uma array informada no login e valida seus dados.
     * @param ARRAY $user_Data = user, pass
     */
    public function execute_Login(array $user_Data) {

        $this->user = (String) strip_tags(trim($user_Data['user']));
        $this->pass = (String) strip_tags(trim($user_Data['pass']));
        $this->set_Login();
    }

    public function check_Login() {
        if (empty($_SESSION['userLogin'])):
            unset($_SESSION['userLogin']);
            return false;
        else:
            return true;
        endif;
    }

    public function get_Alert() {
        return $this->alert;
    }

    public function get_Result() {
        return $this->result;
    }

    private function set_Login() {
        if (!$this->user || !$this->pass):
            $this->alert = ['Informe o usuário e a senha para realizar o login!'];
            $this->result = false;
        elseif (!$this->get_User()):
            $this->alert = ['Os dados não são compativeis!'];
        else:
            $this->execute();
        endif;
    }

    private function get_User() {

        $this->read->ExeRead("users", "WHERE username = :u AND password = :p", "u={$this->user}&p={$this->pass}");

        if ($this->read->getResult()):
            $this->result = $this->read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }

    private function execute() {

        if (!session_id()):
            session_start();
        endif;

        $_SESSION['userLogin'] = $this->result;
        $_SESSION['userLogin']['password'] = "";
        var_dump($_SESSION['userLogin']);
        $this->alert = ["Olá {$this->result['username']}!"];
    }

}
