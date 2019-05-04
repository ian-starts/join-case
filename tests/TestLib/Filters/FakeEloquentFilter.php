<?php

namespace Tests\TestLib\Filters;

use App\Filters\EloquentFilter;
use Tests\TestLib\TestModel;

class FakeEloquentFilter extends EloquentFilter
{
    const MODEL = TestModel::class;

    public function filterTestFilter($value)
    {
        $this->query()->where('test_filter', $value);
    }
}
