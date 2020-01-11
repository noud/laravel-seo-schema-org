<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EducationRequirement
 * 
 * @property int $id
 * @property int $job_posting_id
 * @property int $education_requirement_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\EducationRequirement $education_requirement
 * @property \SEO\SchemaOrg\Models\JobPosting $job_posting
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class EducationRequirement extends Eloquent
{
	protected $casts = [
		'job_posting_id' => 'int',
		'education_requirement_id' => 'int'
	];

	public function education_requirement()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\EducationRequirement::class);
	}

	public function job_posting()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\JobPosting::class);
	}
}
