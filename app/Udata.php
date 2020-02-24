<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Udata extends Model
{
    protected $fillable = [ 'type', 'language', 'selfmail', 'phone' ];

    public function getLanguageAttribute($attribute)
    {
        return $this->languageOptions()[$attribute];
    }

    public function languageOptions()
    {
        return [
            0 => 'Nederlands',
            1 => 'Francais',
            2 => 'English',
            3 => 'Deutsche',
            4 => 'Español',
        ];
    }

    public function getTypeAttribute($attribute)
    {
        return $this->typeOptions()[$attribute];
    }

    public function typeOptions()
    {
        return [
            0 => 'free',
            1 => 'premium',
            2 => 'golden',
            3 => 'demo',
        ];
    }

    public function getSelfmailAttribute($attribute)
    {
        return $this->selfmailOptions()[$attribute];
    }

    public function selfmailOptions()
    {
        return [
            0 => 'yes',
            1 => 'No',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
