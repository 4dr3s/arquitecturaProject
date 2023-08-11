<?php

namespace App\PATRON\DTO\Bill;

class BillsDTO
{
    private $id;
    private $amount;
    private $totalPrice;
    private $dateOrder;
    private $user_id;
    private $product_id;

    public function __construct($id, $amount, $totalPrice, $dateOrder, $user_id, $product_id)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->totalPrice = $totalPrice;
        $this->dateOrder = $dateOrder;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }
    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getAmount() {
		return $this->amount;
	}

	public function setAmount($amount) {
		$this->amount = $amount;
	}

	public function getTotalPrice() {
		return $this->totalPrice;
	}

	public function setTotalPrice($totalPrice) {
		$this->totalPrice = $totalPrice;
	}

	public function getDateOrder() {
		return $this->dateOrder;
	}

    public function setDateOrder($dateOrder) {
		$this->dateOrder = $dateOrder;
	}

	public function getUser_id() {
		return $this->user_id;
	}
	
	public function setUser_id($user_id) {
		$this->user_id = $user_id;
	}

	public function getProduct_id() {
		return $this->product_id;
	}
	
	public function setProduct_id($product_id) {
		$this->product_id = $product_id;
	}
}