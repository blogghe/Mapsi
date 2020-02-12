<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [ 'title', 'description', 'status', 'service_id' ];


    //todo service_id moet anders gedaan worden
    protected $attributes = [
        'status' => '0',
        'service_id' => '1',
    ];

    public function getStatusAttribute($attribute)
    {
        return $this->statusOptions()[$attribute];
    }


    public function scopeOngoing( $query )
    {
        return $query->where( 'status', 0 );
    }

    public function Service()
    {
        return $this->belongsTo( Service::class );
    }

    public function statusOptions()
    {
        return [
            0 => 'reported',
            1 => 'ongoing',
            2 => 'pending',
            3 => 'solved',
            4 => 'unresolved',
        ];
    }
}
