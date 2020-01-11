<?php

namespace SEO\SchemaOrg\Models;

class Role extends \SEO\SchemaOrg\Models\Base\Role
{
	protected $fillable = [
		'person_id',
		'roleable_id',
		'roleable_type'
    ];
    
    public function roleable()
    {
        return $this->morphTo();
    }
	
    public function scopeNamed($query, $givenname)
    {
        $query->whereHas('person', function ($query) use ($givenname) {
            $query
                ->where('given_name', 'like', '%' . $givenname . '%')
                ->orWhere('family_name', 'like', '%' . $givenname . '%')
            ;
        });
    }
}
