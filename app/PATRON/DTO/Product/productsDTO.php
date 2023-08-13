<?php

namespace App\PATRON\DTO\Product;

class productsDTO
{
    // Variables correspondientes a los atributos de la entidad
    private $id;
    private $name;
    private $description;
    private $stock;
    private $estado;
    private $unitPrice;
    private $productImage;
    private $category;
    // Constructor para instancias las variables
    public function __construct($id ,$name, $description, $stock, $estado, $unitPrice, $productImage, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->stock = $stock;
        $this->estado = $estado;
        $this->unitPrice = $unitPrice;
        $this->productImage = $productImage;
        $this->category = $category;
    }
    // Métodos get y set para las diferentes variables
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function getStock()
    {
        return $this->stock;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }
    
    public function setCategory($category)
    {
        $this->category = $category;
    }
}