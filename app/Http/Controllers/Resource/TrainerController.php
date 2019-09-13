<?php

namespace App\Http\Controllers\Resource;

use App\Http\Requests\TrainerRequest;
use App\Trainer;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::latest()->paginate(6);
        return view('back.pages.admin.trainers.index', compact('trainers'));
    }


    public function create()
    {
        return view('back.pages.admin.trainers.create');
    }


    public function store(TrainerRequest $request)
    {
        Trainer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return redirect('/admin/trainers');
    }


    public function show(Trainer $trainer)
    {
        //
    }


    public function edit(Trainer $trainer)
    {
        return view('back.pages.admin.trainers.edit', compact('trainer'));
    }


    public function update(TrainerRequest $request, Trainer $trainer)
    {
        $trainer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return redirect('/admin/trainers');
    }


    public function destroy()
    {
        Trainer::where(request(['id']))->delete();
    }
}
