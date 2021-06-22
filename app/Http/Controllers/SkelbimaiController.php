<?php

namespace App\Http\Controllers;
use App\Models\Skelbimai;

use Illuminate\Http\Request;

class SkelbimaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skelbimas = Skelbimai::orderBy('id', 'desc')->get();

        return view('index', compact('skelbimas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = [
            [
                'label' => 'Computers',
                'value' => 'Computers',
            ],
            [
                'label' => 'Phones',
                'value' => 'Phones',
            ]
        ];
        return view('create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $skelbimas = new Skelbimai();
        $skelbimas->title = $request->title;
        $skelbimas->description = $request->description;
        $skelbimas->category = $request->category;
        $skelbimas->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skelbimas = Skelbimai::findOrFail($id);
        $categorys = [
            [
                'label' => 'Computers',
                'value' => 'Computers',
            ],
            [
                'label' => 'Phones',
                'value' => 'Phones',
            ]
        ];
        return view('show', compact('categorys', 'skelbimas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skelbimas = Skelbimai::findOrFail($id);
        $categorys = [
            [
                'label' => 'Computers',
                'value' => 'Computers',
            ],
            [
                'label' => 'Phones',
                'value' => 'Phones',
            ]
        ];
        return view('edit', compact('categorys', 'skelbimas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skelbimas = Skelbimai::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);

        $skelbimas->title = $request->title;
        $skelbimas->description = $request->description;
        $skelbimas->category = $request->category;
        $skelbimas->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skelbimas = Skelbimai::findOrFail($id);
        $skelbimas->delete();
        return redirect()->route('index');
    }


}
