<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name'
    ];

    /**
     * Category has many Pr.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
    	return $this->hasMany(Product::class);
    }
}
