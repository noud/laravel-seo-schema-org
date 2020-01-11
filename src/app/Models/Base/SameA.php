<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SameA
 * 
 * @property int $id
 * @property int $thing_id
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Thing $thing
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class SameA extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'thing_id' => 'int'
	];

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}
}
