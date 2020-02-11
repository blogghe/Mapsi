<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [ 'title', 'description', 'status', 'service_id' ];

    public function getStatusAttribute($attribute)
    {
        return [
            0 => 'reported',
            1 => 'ongoing',
            2 => 'pending',
            3 => 'solved',
            4 => 'unresolved',
        ][$attribute];
    }


    public function scopeOngoing( $query )
    {
        return $query->where( 'status', 0 );
    }

    public function Service()
    {
        return $this->belongsTo( Service::class );
    }
}
