<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //what can be passed down by a form
    protected $fillable = [ 'title', 'description', 'status', 'service_id', 'user_id', 'contact_id' ];

    //todo service_id moet anders gedaan worden
    protected $attributes = [
        'status' => '0',
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

    public function labels()
    {
        return $this->belongsToMany( Label::class );
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
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
