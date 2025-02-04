<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    protected $guarded = ["id"];

    protected static function booted()
    {
        static::creating(function ($employee) {
            $employee->created_by = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, "created_by");
    }
}
