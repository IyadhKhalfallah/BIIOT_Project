<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mole;

class generatedImages extends Model
{
    protected $fillable = ['uploadedImage','asymetry', 'border','color','diameter','risk','date','id_mole'];

    public function mole()
    {
    	return $this->belongsTo(mole::class);
    }
}
