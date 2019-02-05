<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    //Mass assigned
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'image_show','meta_title', 'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by'];

    //Mutators
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    //Polimorphic relation with categories
    public function categories() {
    return $this->morphToMany('App\Category', 'categoryable');
}
    public function scopeLastproducts($query, $count) {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
