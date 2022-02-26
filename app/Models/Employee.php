<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age'
    ];

    public function scopeSearching($query, $q)
    {
        if ($q) {
            return $query->where('name', 'LIKE', '%'. $q .'%')
                        ->orWhere('age', 'LIKE', '%'. $q .'%');
        }
    }
}
