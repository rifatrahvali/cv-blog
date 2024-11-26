<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'tags', 'image', 'parent_id'];

    // Alt kategorilerle ilişki
    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    // Üst kategori ile ilişki
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }
}