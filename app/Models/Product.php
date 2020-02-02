<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $fillable = [
        'name',
        'color',
        'weight',
        'price',
        'tags',
    ];

    public $casts = [
        'tags' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
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
