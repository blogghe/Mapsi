<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
	protected $fillable = [ 'title', 'description', 'status' ];

	public function scopeOngoing( $query )
	{
		return $query->where( 'status', 0 );
	}
}
