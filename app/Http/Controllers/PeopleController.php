<?php

namespace App\Http\Controllers;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
{
    $people = People::all();
    return view('people.index', compact('people'));
}

}
