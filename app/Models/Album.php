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
        $this->attributes['price_without_vat'] = $value;
        $this->attributes['vat_value'] = $value * 0.21;
    }

    /* RELATIONSSHIPS*/

    /**
     * Get the album for the artist
     */
    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    
    /**
     * Get the artist that owns the album
     */
    public function album()
    {
        return $this->belongsTo(Artist::class);
    }
}
