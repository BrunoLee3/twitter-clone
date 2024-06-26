<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function show(Idea $idea){

        return view('ideas.show', compact('idea'));
    }

    public function store(){

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function destroy(Idea $idea){

    

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }

    public function edit(Idea $idea){
        
 

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){


        request()->validate([
            'content' => 'required'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully');
    }
}
