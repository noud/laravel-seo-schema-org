<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CreativeWork
 * 
 * @property int $id
 * @property int $author_id
 * @property \Carbon\Carbon $date_modified
 * @property \Carbon\Carbon $date_published
 * @property string $headline
 * @property int $publisher_id
 * @property int $thing_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Person $person
 * @property \SEO\SchemaOrg\Models\Organization $organization
 * @property \SEO\SchemaOrg\Models\Thing $thing
 * @property \Illuminate\Database\Eloquent\Collection $articles
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class CreativeWork extends Eloquent
{
	protected $table = 'creative_work';

	protected $casts = [
		'author_id' => 'int',
		'publisher_id' => 'int',
		'thing_id' => 'int'
	];

	protected $dates = [
		'date_modified',
		'date_published'
	];

	public function person()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Person::class, 'author_id');
	}

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class, 'publisher_id');
	}

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}

	public function articles()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Article::class);
	}
}
