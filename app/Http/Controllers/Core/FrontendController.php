<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Menu;
use App\Post;
use App\Price;
use App\Slider;
use App\Social;
use App\Training;

class FrontendController extends Controller
{
    public function home()
    {
        $menus = Menu::orderBy('position')->get();
        $sliders = Slider::orderBy('position')->get();
        $trainings = Training::latest('id')->paginate(3);
        $trainings->withPath('training_pagination');
        $prices = Price::orderBy('amount')->get();
        $posts = Post::latest('id')->paginate(4);
        $posts->withPath('post_pagination');
        $socials = Social::all();

        return view('front.pages.home', compact('menus', 'sliders', 'trainings', 'prices', 'posts', 'socials'));
    }


    public function contact(ContactRequest $request)
    {
        $name = $request->conName;
        $email = $request->conEmail;
        $subject = $request->conSubject;
        $message = $request->conMsg;
        $headers = 'From: ' . $name . ' ' . $email;

        try {
            mail('jovan.rankovic.145.14@ict.edu.rs', $subject, $message, $headers);
            \Log::info('Contact message sent.');
            return redirect('/')->with('message', 'Poruka poslata.');
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect('/')->with('message', 'Problem u slanju poruke.');
        }
    }


    public function sessions()
    {
        return response()->download(public_path('download/')."scr-raspored.jpg");
    }
}
