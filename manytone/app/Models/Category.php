<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function offers()
    {
        return $this->hasMany(Offer::class); // Une catégorie a plusieurs offres
    }
}
