<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Accomodation\Accomodation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
  public function index(Accomodation $accomodation)
	{
    $accomodations = Accomodation::all();

		return view('booking.homepage.index', compact('accomodations'));
	}
}
