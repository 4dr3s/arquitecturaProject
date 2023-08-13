<?php

namespace App\PATRON\DTO\Category;

class CategoriesDTO
{
	// Variables correspondientes a los atributos de la entidad
    private $id;
    private $name;
    private $estado;
	// Constructor para instancias las variables
    public function __construct($id, $name, $estado)
    {
        $this->id = $id;
        $this->name = $name;
        $this->estado = $estado;
    }
	// Métodos get y set para las diferentes variables
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