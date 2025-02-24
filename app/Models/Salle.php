<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
   protected $fillable=['Numero','type','capacitie','image'];



   public function reservations()
{
    return $this->hasMany(Reservation::class);
}
}
