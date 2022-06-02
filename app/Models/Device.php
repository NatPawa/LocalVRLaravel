<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['QRName','type','state', 'ip'];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

}
