<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        ' student_id', 'catagory_id','title','description',
    ];

    public function catagory()
    {
        return $this->belongsTo(catagory::class);
    }
    public function student()
    {
        return $this->belongsTo(student::class);
    }
    
    
    
}
