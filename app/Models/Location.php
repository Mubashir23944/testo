<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by', 'status'];

    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id');
    }
}
