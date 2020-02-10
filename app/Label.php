<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Label extends Model
{
	protected $fillable = [ 'name' ];
	//
}
