<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Article
 * 
 * @property int $id
 * @property string $article_body
 * @property int $creative_work_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\CreativeWork $creative_work
 * @property \Illuminate\Database\Eloquent\Collection $blog_postings
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Article extends Eloquent
{
	protected $table = 'article';

	protected $casts = [
		'creative_work_id' => 'int'
	];

	public function creative_work()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\CreativeWork::class);
	}

	public function blog_postings()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\BlogPosting::class);
	}
}
