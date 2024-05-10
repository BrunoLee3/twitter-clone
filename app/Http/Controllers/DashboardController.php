<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $ideas = Idea::orderByDesc('created_at');

        if(request()->has('search')){
            $ideas = $ideas->where('conteudo', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard',[
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
