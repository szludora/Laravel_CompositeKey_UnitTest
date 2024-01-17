<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winning extends Model
{
    use HasFactory;

    protected function setKeysForSaveQuery($query)
    {
        $query
            // az a lényeg, hogyan hívják őt a táblában --> user_id
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('brand_id', '=', $this->getAttribute('brand_id'))
            ->where('part_id', '=', $this->getAttribute('part_id'));
        return $query;
    }

    protected $fillable = [
        'user_id',
        'brand_id',
        'part_id',
        'product_id',
        'date'
    ];
}
