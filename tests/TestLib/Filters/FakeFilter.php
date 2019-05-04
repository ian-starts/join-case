<?php

namespace Tests\TestLib\Filters;


use App\Filters\Filter;

class FakeFilter extends Filter
{
    public $filters = [];

    public function filterTestFilter($value)
    {
        $this->filters['test_filter'] = $value;
    }
}
