<?php

namespace App\PATRON\DTO\User;

class UserDTO
{
    private $id;
    private $name;
    private $email;
    private $profileImage;
    private $password;
    private $estado;
    private $isAdmin;

    public function __construct($id, $name, $email, $profileImage, $password, $estado, $isAdmin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->profileImage = $profileImage;
        $this->password = $password;
        $this->estado = $estado;
        $this->isAdmin = $isAdmin;
    }
    	
	public function getId() {
		return $this->id;
	}

	public function setId($id)
    {
		$this->id = $id;
	}
	
	public function getName() {
		return $this->name;
	}

	public function setName($name)
    {
		$this->name = $name;
	}
	
	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email)
    {
		$this->email = $email;
	}
	
	public function getProfileImage() {
		return $this->profileImage;
	}

    public function setProfileImage($profileImage)
    {
		$this->profileImage = $profileImage;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password)
    {
		$this->password = $password;
	}

	public function getEstado() {
		return $this->estado;
	}
	
	public function setEstado($estado)
    {
		$this->estado = $estado;
	}

	public function getIsAdmin() {
		return $this->isAdmin;
	}

	public function setIsAdmin($isAdmin): self {
		$this->isAdmin = $isAdmin;
		return $this;
	}
}