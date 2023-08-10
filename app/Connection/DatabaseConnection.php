<?php
namespace App\Connection;

interface DatabaseConnection {
    public function getConnectionName(): string;
}