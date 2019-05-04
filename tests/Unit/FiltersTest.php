<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Tests\TestCase;
use Tests\TestLib\Filters\FakeEloquentFilter;
use Tests\TestLib\Filters\FakeFilter;

class FiltersTest extends TestCase
{
    /**
     * @test
     */
    public function resolveArrayAndFireMethods()
    {
        $filter = new FakeFilter();
        $filter->applyFilters(['test_filter' => 'test']);
        $this->assertTrue($filter->filters['test_filter'] === 'test');
    }

    /**
     * @test
     */
    public function useRequestForResolving()
    {
        $request = new Request(
            [
                'filters' => [
                    'test_filter' => 'request'
                ]
            ]
        );

        $filter = new FakeFilter($request);
        $this->assertTrue($filter->filters['test_filter'] === 'request');
    }

    /**
     * @test
     */
    public function resolveEloquentFilter()
    {
        $filter = new FakeEloquentFilter();
        $filter->applyFilters(['test_filter' => 'test']);

        $this->assertCount(1, $filter->query()->getQuery()->wheres);
    }
}
