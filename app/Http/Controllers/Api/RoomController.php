<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index(Hotel $hotel)
    {
        return $hotel->rooms;
    }
}