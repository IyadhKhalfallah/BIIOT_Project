<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mole;

class generatedImages extends Model
{
    protected $fillable = ['asymetry', 'border','color','diameter','risk','location','date'];

    public function mole()
    {
    	return $this->belongsTo(mole::class);
    }
}
