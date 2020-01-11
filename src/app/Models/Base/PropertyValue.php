<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PropertyValue
 * 
 * @property int $id
 * @property string $value
 * @property int $thing_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Thing $thing
 * @property \Illuminate\Database\Eloquent\Collection $things
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class PropertyValue extends Eloquent
{
	protected $table = 'property_value';

	protected $casts = [
		'thing_id' => 'int'
	];

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}

	public function things()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Thing::class, 'identifier_id');
	}
}
