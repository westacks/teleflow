<?php

namespace App\Traits;

use Mehradsadeghi\FilterQueryString\FilterQueryString as VendorFilterQueryString;

trait FilterQueryString
{
    use VendorFilterQueryString;

    protected $filters = [
        'sort',
        'greater',
        'greater_or_equal',
        'less',
        'less_or_equal',
        'between',
        'not_between',
        'in',
        'like',
        'related',
    ];

    public function related($query, $value)
    {
        return $query->with($value);
    }

    public function __construct(array $attributes = [])
    {
        $filters = cache()->rememberForever($this->getTable().'_fields', function() {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        });

        $this->filters = array_merge($this->filters, $filters);
        parent::__construct($attributes);
    }
}
