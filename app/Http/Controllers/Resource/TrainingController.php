<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Social;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::latest('id')->paginate(2);
        return view('back.pages.admin.trainings.index', compact('trainings'));
    }


    public function create()
    {
        return view('back.pages.admin.trainings.create');
    }


    public function store(TrainingRequest $request)
    {
        $image = $request->image;
        $logo = $request->logo;

        if($image->isValid() && $logo->isValid())
        {
            $imgFolder = 'images/training/img/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            $logoFolder = 'images/training/logo/';
            $logoName = time().rand().$logo->getClientOriginalName();
            $logo->move(public_path().'/'.$logoFolder, $logoName);

            Training::create([
                'name' => $request->name,
                'duration' => $request->duration,
                'capacity' => $request->capacity,
                'intensity' => $request->intensity,
                'target' => $request->target,
                'benefits' => $request->benefits,
                'description' => $request->description,
                'logo' => $logoFolder.$logoName,
                'image' => $imgFolder.$imgName,
                'reservations' => $request->reservations
            ]);
        }

        return redirect('/admin/trainings');
    }


    public function show(Training $training)
    {
        $socials = Social::all();
        return view('front.pages.training', compact('training','socials'));
    }


    public function edit(Training $training)
    {
        return view('back.pages.admin.trainings.edit', compact('training'));
    }


    public function update(TrainingRequest $request, Training $training)
    {
        $image = $request->image;
        $logo = $request->logo;

        if($image->isValid() && $logo->isValid())
        {
            if(File::exists(public_path().'/'.$training->image))
            {
                File::delete(public_path().'/'.$training->image);
            }

            if(File::exists(public_path().'/'.$training->logo))
            {
                File::delete(public_path().'/'.$training->logo);
            }

            $imgFolder = 'images/training/img/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            $logoFolder = 'images/training/logo/';
            $logoName = time().rand().$logo->getClientOriginalName();
            $logo->move(public_path().'/'.$logoFolder, $logoName);

            $training->update([
                'name' => $request->name,
                'duration' => $request->duration,
                'capacity' => $request->capacity,
                'intensity' => $request->intensity,
                'target' => $request->target,
                'benefits' => $request->benefits,
                'description' => $request->description,
                'logo' => $logoFolder.$logoName,
                'image' => $imgFolder.$imgName,
                'reservations' => $request->reservations
            ]);
        }

        return redirect('/admin/trainings');
    }


    public function destroy(Training $training)
    {
        if(File::exists(public_path().'/'.$training->image))
        {
            File::delete(public_path().'/'.$training->image);
        }

        Training::where(request(['id']))->delete();
    }


    public function pagination(Request $request)
    {
        if ($request->ajax()) {
            $trainings = Training::latest('id')->paginate(3);

            return view('front.partials.home.pagination.trainings', compact('trainings'));
        }

        return abort(404);
    }
}
