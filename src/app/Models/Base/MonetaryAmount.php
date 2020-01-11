<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MonetaryAmount
 * 
 * @property int $id
 * @property string $currency
 * @property int $value_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\QuantitativeValue $quantitative_value
 * @property \Illuminate\Database\Eloquent\Collection $job_postings
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class MonetaryAmount extends Eloquent
{
	protected $table = 'monetary_amount';

	protected $casts = [
		'value_id' => 'int'
	];

	public function quantitative_value()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\QuantitativeValue::class, 'value_id');
	}

	public function job_postings()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\JobPosting::class, 'base_salary_id');
	}
}
