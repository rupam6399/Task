<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeData extends Model
{
    protected $fillable = ['username', 'email', 'phone', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
