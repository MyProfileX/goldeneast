<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetarian extends Model
{
    use HasFactory;
    protected $table = 'vegetarians';
    protected $guarded = [];

    public function dishes()
    {
      return $this->HasMany(Dish::class);
    }
}
