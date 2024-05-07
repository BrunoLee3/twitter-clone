<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function show($id){

        $idea = Idea::findOrFail($id);

        return view('ideas.show', compact('idea'));
    }

    public function store(Request $request){

        $request->validate([
            'idea' => 'required'
        ]);

        $conteudo = $request->get('idea');

        Idea::create([
            'conteudo' => $conteudo
        ]);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function destroy($id){

        Idea::destroy($id);

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }

    public function edit($id){

        $idea = Idea::findOrFail($id);
        $editing = true;

        return view('ideas.edit', compact('idea', 'editing'));
    }
}