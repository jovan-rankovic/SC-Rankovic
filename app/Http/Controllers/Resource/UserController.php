<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(6);
        return view('back.pages.admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('back.pages.admin.users.create', compact('roles'));
    }


    public function store(UserRequest $request)
    {
        $password = md5($request->password);
        $request->role_id ? $role_id = $request->role_id : $role_id = 2;
        $image = $request->image;

        if($image)
        {
            if($image->isValid())
            {
                $imgFolder = 'images/user/';
                $imgName = time().rand().$image->getClientOriginalName();
                $image->move(public_path().'/'.$imgFolder, $imgName);

                User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => $password,
                    'phone' => $request->phone,
                    'birth_date' => $request->birth_date,
                    'role_id' => $role_id,
                    'image' => $imgFolder.$imgName,
                    'card_number' => $request->card_number,
                    'address' => $request->address
                ]);

                if(str_replace(url('/'), '', url()->previous() == '/admin/users/create'))
                    return redirect('/admin/users');
                else
                    return redirect('/energijapp/search');
            }
        }
        else
        {
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $password,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'role_id' => $role_id,
                'card_number' => $request->card_number,
                'address' => $request->address
            ]);

            return redirect('/energijapp/search');
        }
    }


    public function show(User $user)
    {
        if (session('user')->role->name == 'user')
            abort_if(session()->get('user')->id != $user->id, 403);
        else
        {
            if ($user->role->name != 'user')
                abort_if(session()->get('user')->id != $user->id, 403);
        }

        return view('back.pages.energijapp.profile', compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('back.pages.admin.users.edit', compact('user', 'roles'));
    }


    public function update(UserRequest $request, User $user)
    {
        $request->role_id ? $role_id = $request->role_id : $role_id = 2;
        $image = $request->image;

        if($image)
        {
            if($image->isValid())
            {
                if(File::exists(public_path().'/'.$user->image))
                {
                    $defaultImage = public_path().'/images/user/new.jpg';

                    if(public_path().'/'.$user->image != $defaultImage)
                    {
                        File::delete(public_path().'/'.$user->image);
                    }
                }

                $imgFolder = 'images/user/';
                $imgName = time().rand().$image->getClientOriginalName();
                $image->move(public_path().'/'.$imgFolder, $imgName);

                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'birth_date' => $request->birth_date,
                    'role_id' => $role_id,
                    'image' => $imgFolder.$imgName,
                    'card_number' => $request->card_number,
                    'address' => $request->address
                ]);
            }
        }
        else
        {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'role_id' => $role_id,
                'card_number' => $request->card_number,
                'address' => $request->address
            ]);
        }

        return redirect('/energijapp/profile' . '/' . $user->id);
    }


    public function destroy(User $user)
    {
        if(File::exists(public_path().'/'.$user->image))
        {
            $defaultImage = public_path().'/images/user/new.jpg';

            if(public_path().'/'.$user->image != $defaultImage)
            {
                File::delete(public_path().'/'.$user->image);
            }
        }

        User::where(request(['id']))->delete();
    }


    public function search()
    {
        return view('back.pages.energijapp.operator.users.search');
    }


    public function image_update(Request $request, User $user)
    {
        $image = $request->imgUser;

        if ($image->isValid()) {
            if (File::exists(public_path() . '/' . $user->image)) {
                $defaultImage = public_path() . '/' . 'images/user/new.jpg';

                if (public_path() . '/' . $user->image != $defaultImage) {
                    File::delete(public_path() . '/' . $user->image);
                }
            }

            $imgFolder = 'images/user/';
            $imgName = time() . rand() . $image->getClientOriginalName();
            $image->move(public_path() . '/' . $imgFolder, $imgName);

            $user->update([
                'image' => $imgFolder . $imgName
            ]);

            session('user')->update([
                'image' => $imgFolder . $imgName
            ]);

            return redirect('/energijapp/profile' . '/' . $user->id);
        }

        return redirect('/energijapp/profile' . '/' . $user->id);
    }
}
