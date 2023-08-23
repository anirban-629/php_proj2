<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // ! Instead of this we can add Model::unguard() to appServiceProvider.php
    // protected $fillable = [
    //     'title', 'company', 'location', 'website', 'email', 'tags', 'description'
    // ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) { // if this filter is not false
            $query->where('tags', 'like', '%' . request('tag') . '%');
            // Where tags like '%lara%;
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
