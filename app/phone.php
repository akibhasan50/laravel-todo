<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $fillable = [
        'user_id', 'phone',
    ];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
