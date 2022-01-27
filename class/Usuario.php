<?php
class Usuario
{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;


    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function setIdusuario($value)
    {
        $this->idusuario = $value;
    }
    public function getDeslogin()
    {
        return $this->deslogin;
    }
    public function setDeslogin($value)
    {
        $this->deslogin = $value;
    }
    public function getDessenha()
    {
        return $this->dessenha;
    }
    public function setDessenha($value)
    {
        $this->dessenha = $value;
    }
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }
    public function setDtcadastro($value)
    {
        $this->dtcadastro = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuarios = :ID", array(
            ":ID" => $id
        ));

        if (isset($result[0])) { //Ou  if(count($result)>0){} 
            $row = $result[0];
            $this->setIdusuario($row['idusuarios']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            //$this-> setDtcadastro(new Datetime($row['dessenha']));
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuarios" => $this->getIdusuario(),
            "deslogin" => $this->getDeslogin(),
            "dessenha" => $this->getDessenha()
            //"dtcadastro"=>$this->getDtcadastro()-> format("d/m/t H:i:s")
        ));
    }

    // lista de usuários no banco

    public static function getList()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios  ORDER BY deslogin");
    }

    // Retorna um usuário específico 
    public static function Search($login)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios  WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH" => "%" . $login . "%"
        ));
    }

    // Autentificação 
    public function Login($login, $password)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha =:PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password
        ));

        if (isset($result[0])) { //Ou  if(count($result)>0){} 
            $row = $result[0];
            $this->setIdusuario($row['idusuarios']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            //$this-> setDtcadastro(new Datetime($row['dessenha']));
        } else {
            throw new Exception("Login ou Senha inválida");
        }
    }
}
