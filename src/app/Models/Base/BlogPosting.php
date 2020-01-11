<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogPosting
 * 
 * @property int $id
 * @property int $article_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Article $article
 *
 * @package App\Models\Base
 */
class BlogPosting extends Eloquent
{
	protected $table = 'blog_posting';

	protected $casts = [
		'article_id' => 'int'
	];

	public function article()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Article::class);
	}
}
