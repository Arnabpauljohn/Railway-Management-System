<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;

class RuleController extends Controller
{
    // Admin: Show all rules
    public function index()
    {
        $rules = Rule::all();
        return view('admin.rules.index', compact('rules'));
    }

    // Admin: Create new rule
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        
        Rule::create($request->only('question', 'answer'));
        return redirect()->back()->with('success', 'Rule added successfully!');
    }

    public function update(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);
        $rule->update($request->only('question', 'answer')); // Ensure only these fields are updated
    
        return redirect()->back()->with('success', 'Rule updated.');
    }
    
    
    public function destroy($id)
    {
        Rule::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Rule deleted.');
    }
    
    // Normal matching code
    // User: Get answer based on question
   // public function getAnswer(Request $request)
    //{
    //    $question = strtolower($request->input('question'));
    
    //    // Use a more accurate matching logic
    //    $rule = Rule::all()->first(function ($rule) use ($question) {
     //       return strpos($question, strtolower($rule->question)) !== false;
   //     });
   // 
   //     return view('user.ask', [
  //          'question' => $question,
  //          'answer' => $rule ? $rule->answer : 'Sorry, no answer found for your question.',
  //      ]);
 //   }
    
    //fuzzy matching or approximate matching
    public function getAnswer(Request $request)
    {
        $question = strtolower($request->input('question'));
        $rules = Rule::all(); 
    
        $closestRule = null;
        $shortestDistance = -1;
    
    
        foreach ($rules as $rule) {
            $distance = levenshtein($question, strtolower($rule->question));
    
            if ($distance == 0) {
                $closestRule = $rule;
                break;
            }
    
            if ($distance <= $shortestDistance || $shortestDistance == -1) {
                $shortestDistance = $distance;
                $closestRule = $rule;
            }
        }
    
        
        return view('user.ask', [
            'question' => $question,
            'answer' => $closestRule ? $closestRule->answer : 'Sorry, no answer found for your question.',
        ]);
    }
    
}

