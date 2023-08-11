<?php

namespace App\PATRON\DTO\Accounting;

class Accounting
{
    private $id;
    private $user_id;
    private $userName;
    private $inicioSesion;
    private $finSesion;

    public function __construct($id, $user_id, $userName, $inicioSesion, $finSesion)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->userName = $userName;
        $this->inicioSesion = $inicioSesion;
        $this->finSesion = $finSesion;
    }

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}
    public function getUser_id() {
		return $this->user_id;
	}
	
	public function setUser_id($user_id) {
		$this->user_id = $user_id;
	}

	public function getUserName() {
		return $this->userName;
	}

    public function setUserName($userName) {
		$this->userName = $userName;
	}

	public function getInicioSesion() {
		return $this->inicioSesion;
	}
	
	public function setInicioSesion($inicioSesion) {
		$this->inicioSesion = $inicioSesion;
	}

	public function getFinSesion() {
		return $this->finSesion;
	}
	
	public function setFinSesion($finSesion) {
		$this->finSesion = $finSesion;
	}
}