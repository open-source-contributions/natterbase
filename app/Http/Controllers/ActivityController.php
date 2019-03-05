<?php

namespace Djunehor\Http\Controllers;

use Djunehor\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request) {
    	$activities = Activity::query()->paginate(15);
    	return response()->json(['data' => $activities]);
    }
}
