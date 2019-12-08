<?php

namespace App;

use App\generatedImages;
use Illuminate\Database\Eloquent\Model;

class mole extends Model
{
    protected $fillable = ['location'];

    public function checks()
    {
    	return $this->hasMany(generatedImages::class);
    }
}
