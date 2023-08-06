<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Products():BelongsToMany
    {
        return $this->BelongsToMany(Product::class,'categories_products','products_id','categories_id');
    }
}
