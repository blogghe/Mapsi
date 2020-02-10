<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $street
 * @property int $sNumber
 * @property string $bus
 * @property string $city
 * @property int $zip
 * @property int $gender
 * @property int $phone
 * @property string $birthdate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereBus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereSNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereZip($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    //
}
