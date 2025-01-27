<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfume;

class MainController extends Controller
{

    public function dashboard()
    {
        $perfumes = Perfume::get();
        return view('admin.perfumes.index', compact('perfumes'));
    }

}
