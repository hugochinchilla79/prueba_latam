<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_country
 * @property string $name
 * @property string $phonecode
 * @property string $currency
 * @property User[] $users
 */
class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_country';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phonecode', 'currency'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id_country', 'id_country');
    }
}
