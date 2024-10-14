<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['funnel_id', 'title', 'content'];

    public function funnel()
    {
        return $this->belongsTo(Funnel::class);
    }
}
