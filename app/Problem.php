<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [ 'title', 'description', 'status', 'service_id' ];

    public function scopeOngoing( $query )
    {
        return $query->where( 'status', 0 );
    }

    public function Service()
    {
        return $this->belongsTo( Service::class );
    }
}
