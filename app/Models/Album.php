<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'artist_id', 'price_without_vat'];

    public function setPriceWithoutVatAttribute($value)
    {
        $this->attributes['vat_value'] = $value * 0.21;
    }

}
