<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QtyController extends Controller
{
    public function index()
    {
        return view('qty.index');
    }
}
