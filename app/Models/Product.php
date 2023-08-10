<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];

    public function Categories():BelongsToMany
    {
        return $this->BelongsToMany(Categorie::class,'categories_products','products_id','categories_id');
    }
}
