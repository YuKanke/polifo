<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableContract;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;

class Portfolio extends Model implements ReactableContract
{
	use Reactable;

	protected $fillable = [
        'user_id',
	];
	
	public function user(){
	    return $this->belongsTo('App\User');
	}
	
	public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
