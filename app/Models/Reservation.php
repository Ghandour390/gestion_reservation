<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['user_id','salle_id','date_dubee','date_finall','status'];
                        
    use HasFactory;

    public function user()
    {
        return $this->HasMany(User::class);
    }
    public function salle()
    {
        return $this->HasMany(Salle::class);
    }

}
