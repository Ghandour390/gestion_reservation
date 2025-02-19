<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
   protected $fillable=['Numero','type','capacitie'];



   public function reservation()
    {
        return $this->HasMany(user::class);
    }
}
