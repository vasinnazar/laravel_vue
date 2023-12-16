<?php

namespace App\Http\Controllers\Api\V1;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        return Movie::create($request->all());
    }

    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Movie::findOrFail($id);
        return $company->update($request->all());
    }

    public function destroy($id)
    {
        $company = Movie::findOrFail($id);
        return $company->delete();
    }
}
