<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $fillable = [
        'name',
        'tags',
    ];

    public $casts = [
        'tags' => 'array',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model)
        {
            if (empty($model->tags)) {
                $model->tags = [];
            } elseif (is_string($model->tags)) {
                $model->tags = explode(',', $model->tags);
                $model->tags = array_map('trim', $model->tags);
            }
        });
    }
}
