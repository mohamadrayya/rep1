<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        // 'author_id'
    ];

    public function blogs(): HasMany

    {
        return $this->hasMany(Blogs::class, 'author_id');
        // return $this->hasMany(Blogs::class, 'author_id');
    }


    // public function blogs()
    // {
    //     return $this->hasMany(Blogs::class, 'author_id', 'id');
    // }

}
