<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OpeningHoursSpecification
 * 
 * @property int $id
 * @property \Carbon\Carbon $closes
 * @property string $day_of_week
 * @property \Carbon\Carbon $opens
 * @property int $place_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Place $place
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class OpeningHoursSpecification extends Eloquent
{
	protected $table = 'opening_hours_specification';

	protected $casts = [
		'place_id' => 'int'
	];

	protected $dates = [
		'closes',
		'opens'
	];

	public function place()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Place::class);
	}
}
