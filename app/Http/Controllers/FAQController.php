<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
        public function index()
    {
        $faqs = FAQ::all();
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        FAQ::create($request->only('question', 'answer'));

        return redirect()->route('faq.index')->with('status', 'FAQ toegevoegd!');
    }

    public function edit(FAQ $faq)
    {
    return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
    $validated = $request->validate([
        'question' => 'required|max:255',
        'answer' => 'required',
    ]);

    $faq->update($validated);

    return redirect()->route('faq.index')->with('status', 'FAQ bijgewerkt!');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('status', 'FAQ verwijderd!');
    }
}
