<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [ 'title', 'description', 'status', 'service_id', 'user_id' ];

    //todo service_id moet anders gedaan worden
    protected $attributes = [
        'status'     => '0',
        'service_id' => '1',
    ];

    public function getStatusAttribute( $attribute )
    {
        return $this->statusOptions()[ $attribute ];
    }

    public function scopeOngoing( $query )
    {
        return $query->where( 'status', 0 );
    }

    public function Service()
    {
        return $this->belongsTo( Service::class );
    }

    public function User()
    {
        return $this->belongsTo( User::class );
    }

    public function statusOptions()
    {
        return [
            0 => trans( 'text.reported' ),
            1 => trans( 'text.ongoing' ),
            2 => trans( 'text.pending' ),
            3 => trans( 'text.solved' ),
            4 => trans( 'text.unresolved' ),
        ];
    }
}
