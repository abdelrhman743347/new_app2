<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description', 'price', 'stock','image','category_id',
    ];

    protected $appends = ['image_path'];
    public function getImagePathAttribute()
    {
        return asset('images/products_images/' . $this->image);

    }//end of get image path


	public function category()
	{
		// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
		return $this->belongsTo(Category::class);
	}
}
