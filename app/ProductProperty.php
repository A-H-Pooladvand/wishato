<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    /**
     * Indicates displayable price of a product.
     *
     * @return string
     */
    public function getDisplayablePriceAttribute(): string
    {
        return '$'.number_format($this->price).'.00';
    }
}
