<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Many-to-many relationship with Walkthrough
    public function walkthroughs()
    {
        return $this->belongsToMany('App\Models\Walkthrough');
    }
}
