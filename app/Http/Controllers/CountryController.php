<?php

namespace Djunehor\Http\Controllers;

use Djunehor\Activity;
use Djunehor\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{

	public function index(Request $request) {
		$countries = Country::query()->paginate(15);
		Activity::create([
			'user_id' => auth()->id(),
			'description' => "User ".auth()->id()." view all countries"
		]);
		return response()->json(['data' => $countries]);
	}

	public function create(Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|unique:countries',
			'continent' => 'required|string|unique:countries',

		]);

		if($validator->fails()){
			return response()->json(['errors' => $validator->errors()], 401);
		}

		$country = Country::create([
			'name' => $request->name,
			'continent' => $request->continent,
		]);

		Activity::create([
			'user_id' => $request->user()->id,
			'description' => "User ".auth()->id()." created country [$country->id]"
		]);

		return response()->json(['message'=> 'Country created successfully', 'data' => $country]);
	}

	public function update($id, Request $request) {
		$country = Country::findOrFail($id);
		if($request->has('name')) {
			$country->name = $request->name;
		}
		if($request->has('continent')) {
			$country->continent = $request->continent;
		}
		$country->save();

		Activity::create([
			'user_id' => auth()->id(),
			'description' => "User ".auth()->id()." updated country [$country->id]"
		]);


		return response()->json(['message'=> "Country $country->id updated successfully", 'data' => $country]);
	}

	public function delete($id, Request $request) {

		$country = Country::query()->findOrFail($id);
		$country->delete();

		Activity::create([
			'user_id' => auth()->id(),
			'description' => "User ".auth()->id()." deleted country [$id]"
		]);

		return response()->json(['message'=> "Country $id deleted successfully"]);
	}
}
