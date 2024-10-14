<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funnel extends Model
{
    protected $fillable = ['user_id', 'name', 'description'];

    // Relación con las páginas
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

}
