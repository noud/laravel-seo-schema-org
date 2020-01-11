<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BreadcrumbList
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class BreadcrumbList extends Eloquent
{
	protected $table = 'breadcrumb_list';
}
