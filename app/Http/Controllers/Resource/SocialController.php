<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Social;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::latest('id')->paginate(6);
        return view('back.pages.admin.socials.index', compact('socials'));
    }


    public function create()
    {
        return view('back.pages.admin.socials.create');
    }


    public function store(SocialRequest $request)
    {
        Social::create([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => strtolower($request->icon)
        ]);

        return redirect('/admin/socials');
    }


    public function show(Social $social)
    {
        //
    }


    public function edit(Social $social)
    {
        return view('back.pages.admin.socials.edit', compact('social', 'trainers'));
    }


    public function update(SocialRequest $request, Social $social)
    {
        $social->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => strtolower($request->icon)
        ]);

        return redirect('/admin/socials');
    }


    public function destroy()
    {
        Social::where(request(['id']))->delete();
    }
}
