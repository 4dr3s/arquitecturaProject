<?php

namespace App\PATRON\DTO\Category;

class CategoriesDTO
{
    private $id;
    private $name;
    private $estado;

    public function __construct($id, $name, $estado)
    {
        $this->id = $id;
        $this->name = $name;
        $this->estado = $estado;
    }

	public function getEstado() {
		return $this->estado;
	}
	
	public function setEstado($estado) {
		$this->estado = $estado;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getId() {
		return $this->id;
	}

    public function setId($id) {
		$this->id = $id;
	}
}