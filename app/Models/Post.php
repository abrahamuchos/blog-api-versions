<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // Dos formas de hacer un accesor (Mutator)
    /**
     *  Accesor to shorten words of the content
     */
    // public function getExcerptAttribute()
    // {
    //     return substr($this->content, 0, 120);
    // }


    /**
     * Accesor to shorten words of the content
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) =>  substr($attributes['content'], 0, 120)
        );
    }


    //Dos formas de hacer un Accesor
    /**
     * Format attribute to create day
     * @return [Object]
     */
    // public function getPublishedAtAttribute()
    // {
    //     return $this->created_at->format('d/m/Y');
    // }

    /**
     * Accesor to format published post
     *
     * @return Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (Carbon::createFromFormat('Y-m-d H:i:s', $attributes['created_at'])->format('Y/m/d'))

        );
    }
}
