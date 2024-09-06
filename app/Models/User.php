<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'dept_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
