<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property int $organization_id
 * @property int $employee_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Employee $employee
 * @property \SEO\SchemaOrg\Models\Organization $organization
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Employee extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'organization_id' => 'int',
		'employee_id' => 'int'
	];

	public function employee()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Employee::class);
	}

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class);
	}
}
