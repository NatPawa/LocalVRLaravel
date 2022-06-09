<?php

namespace App\Models;

use App\Helper\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory, Imageable;
    protected $fillable = ['name', 'description', 'company', 'yearcreation', 'numplayers', 'pathexe', 'urllogo', 'urlcover'];

    public function devices()
    {
        return $this->belongsToMany(Device::class);
    }
    
    public function matches(){
        return $this->belongsTo(Partida::class);
    }

    public function events(){
        return $this->belongsTo(Event::class);
    }
}
