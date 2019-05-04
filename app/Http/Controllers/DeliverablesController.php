<?php

namespace App\Http\Controllers;


use App\Filters\DeliverablesFilter;
use Illuminate\Http\Request;

class DeliverablesController extends Controller
{
    /**
     * @param DeliverablesFilter $filter
     * @param Request            $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DeliverablesFilter $filter, Request $request)
    {
        return response()->json($filter->paginate($request->get('pageSize',20)));
    }
}
