<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'FAQs';

    // Define which attributes are mass assignable
    protected $fillable = [
        'question',
        'answer',
    ];
}
