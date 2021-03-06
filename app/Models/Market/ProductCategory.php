<?php

namespace App\Models\Market;

use App\Models\Attribute;
use App\Traits\CascadeDeleteMorph;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable, CascadeSoftDeletes, CascadeDeleteMorph;

    // show_in_menu
    const ACTIVE = 1;
    const DISABLE = 0;

    protected $cascadeDeletes = ['children'];

    protected $cascadeDeleteMorph = ['attributes'];

    protected $fillable = ['name', 'description', 'slug', 'image', 'show_in_menu', 'parent_id'];

    protected $casts = ['image' => 'array'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Relations
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'category_id');
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

    public function selectableValues(): BelongsToMany
    {
        return $this->belongsToMany(SelectableAttributeValue::class, 'category_selectable_attribute_value', 'category_id', 'attribute_value_id');
    }

    /**
     * Scopes
     */
    public function scopeActiveInMenu(Builder $query): Builder
    {
        return $query->where('show_in_menu', self::ACTIVE);
    }
}
