<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GeoCoordinate
 * 
 * @property int $id
 * @property float $latitude
 * @property float $longitude
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $places
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class GeoCoordinate extends Eloquent
{
	protected $casts = [
		'latitude' => 'float',
		'longitude' => 'float'
	];

	public function places()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Place::class, 'geo_id');
	}
}
