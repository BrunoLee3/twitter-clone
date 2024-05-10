<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function show(Idea $idea){

        return view('ideas.show', compact('idea'));
    }

    public function store(Request $request){

        $request->validate([
            'conteudo' => 'required'
        ]);

        $conteudo = $request->get('conteudo');

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

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){

        request()->validate([
            'conteudo' => 'required'
        ]);

        $idea->conteudo = request()->get('conteudo', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully');
    }
}
