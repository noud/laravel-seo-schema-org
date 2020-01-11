<?php

namespace SEO\SchemaOrg\Models;

class Article extends \SEO\SchemaOrg\Models\Base\Article
{
	protected $fillable = [
		'article_body',
		'creative_work_id'
	];
}
