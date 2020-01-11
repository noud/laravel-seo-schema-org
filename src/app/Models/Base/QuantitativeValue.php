<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class QuantitativeValue
 * 
 * @property int $id
 * @property string $unit_text
 * @property int $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $monetary_amounts
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class QuantitativeValue extends Eloquent
{
	protected $table = 'quantitative_value';

	protected $casts = [
		'value' => 'int'
	];

	public function monetary_amounts()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\MonetaryAmount::class, 'value_id');
	}
}
