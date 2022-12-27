<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->getAll(request()->all())
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['type'] = User::TYPES['admin'];
        $this->userRepository->store($inputs);
        return redirect()->route('user.index')->with('notification', 'Add new user successfully!!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if(Auth::user()->id==$id){
            return redirect()->route('user.index')->with('error', 'You can not delete your self!!');
        }

        User::destroy($id);
        return redirect()->route('user.index')->with('notification', 'Delete user successfully!!');
    }
}
