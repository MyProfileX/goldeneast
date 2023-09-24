<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gluten extends Model
{
    use HasFactory;
    protected $table = 'glutens';
    protected $guarded = [];

    public function ingredients()
    {
      return $this->hasMany(Ingredient::class);
    }
}
