<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'dishes';
    protected $fillable = ['title', 'price', 'description', 'country_id', 'vegetarian_id'];
    

    public function country()
    {
      return $this->belongsTo(Country::class);
    }

    public function vegetarian()
    {
      return $this->belongsTo(Vegetarian::class);
    }

    public function orders()
    {
      return $this->belongsToMany(Order::class);
    }

    public function ingredients()
    {
      return $this->belongsToMany(Ingredient::class)
      ->withPivot(['gram_amount']);
   }
   
}

