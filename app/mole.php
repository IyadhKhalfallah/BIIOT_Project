<?php

namespace App;

use App\generatedImages;
use Illuminate\Database\Eloquent\Model;

class mole extends Model
{   protected $primaryKey = 'id_mole';
    protected $fillable = ['location','x','y'];

    public function checks()
    {
    	return $this->hasMany(generatedImages::class);
    }
}
