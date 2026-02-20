<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Buletin;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $berita = Berita::count();
        $buletin = Buletin::count();
        $resource = Resource::count();
        $persentaseresource = Resource::count() / 27 * 100 ;

        return view('admin.home', compact('berita', 'buletin', 'resource' , 'persentaseresource'));


    }


}
