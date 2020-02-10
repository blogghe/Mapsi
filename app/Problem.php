<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
class Problem extends Model
{
	protected $fillable = [ 'title', 'description', 'status' ];

	public function scopeOngoing( $query )
	{
		return $query->where( 'status', 0 );
	}
}
