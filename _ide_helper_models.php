<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App{
/**
 * App\Label
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Label whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Label extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Problem
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem ongoing()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Problem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Problem extends \Eloquent {}
}

namespace App{
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
	class Contact extends \Eloquent {}
}

