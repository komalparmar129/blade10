<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    /**
     * class name:products
     * create products model to intract with database
     */

    use HasFactory;
    protected $fillable = ['name', 'description','sku', 'instock_Quantity', 'regular_price', 'sale_price'];

    public function rules()
    {
        /**
         * method name:rules
         * create a rules method for apply rule on database data

         */
        return [
            'name' => 'required|max:3',
            'description' => 'required|max:5',
            'sku' => 'required|max:2',
            'regular_price' => 'nullable',
            'sale_price' => 'nullable',
        ];
    }
    public function categories()
    {
         /**
         * method name:categories
         * create a product method for connecting with categories table using many to many relation 

         */
       return $this->belongsToMany(categories::class);
    }
}
