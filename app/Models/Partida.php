<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $fillable = ['code','state', 'info'];
    
    public function device()
    {
        return $this->hasOne(Device::class,'id');
    }

    public function game()
    {
        return $this->hasOne(Game::class,'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
