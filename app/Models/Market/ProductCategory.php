<?php

namespace App\Models\Market;

use App\Models\Attribute;
use App\Traits\CascadeDeleteMorph;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable, CascadeSoftDeletes, CascadeDeleteMorph;

    protected $cascadeDeletes = ['children'];

    protected $cascadeDeleteMorph = ['attributes'];

    protected $fillable = ['name', 'description', 'slug', 'image', 'show_in_menu', 'sizable', 'parent_id', 'colorable'];

    protected $casts = ['image' => 'array', 'colorable' => 'bool', 'sizable' => 'bool'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function trashedParent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent')->onlyTrashed();
    }

    public function allParent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent')->withTrashed();
    }

    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function trashedChildren(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children')->onlyTrashed();
    }

    public function allChildren(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children')->withTrashed();
    }
}
