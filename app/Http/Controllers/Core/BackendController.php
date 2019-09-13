<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;
use App\Price;
use App\Service;
use App\Slider;
use App\Social;
use App\Trainer;
use App\Training;
use App\User;

class BackendController extends Controller
{
    public function admin()
    {
        $users = User::all();
        $posts = Post::all();
        $sliders = Slider::all();
        $menus = Menu::all();
        $trainings = Training::all();
        $trainers = Trainer::all();
        $prices = Price::all();
        $services = Service::all();
        $socials = Social::all();

        return view('back.pages.admin.home', compact('users', 'posts', 'sliders', 'menus', 'trainers', 'trainings', 'prices', 'services', 'socials'));
    }
}
