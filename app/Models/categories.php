<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /**
     * class name:categories
     * create categories model to intract with database
     */
    use HasFactory;
    use HasFactory;
    public function products()
    {
        /**
         * method name:products
         * create a product method for connecting with producs table using many to many relation 

         */
       return $this->belongsToMany(products::class);
    }
}
