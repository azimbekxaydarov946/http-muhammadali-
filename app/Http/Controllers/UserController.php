<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model=new User();
    }

    public function index()
    {
        $search = request()->input('search');
        if(!request('search')){

            $data = $this->model->all();
        }
        else{
            $data = $this->model->where('first_name', 'like','%'.request('search').'%')->orWhere('last_name', 'like','%'.request('search').'%')->orWhere('email', 'like','%'.request('search').'%')->orWhere('address', 'like','%'.request('search').'%')->orWhere('id', 'like','%'.request('search').'%')->orWhere('birthday', 'like','%'.request('search').'%')->get();
        }
        return view('user', ['data' => $data,'search'=>$search]);
    }

    public function create()
    {
        return view('user-create');
    }

    public function store(UserStoreRequest $storerequest)
    {
        $data=$storerequest->validated();
        $this->model->create($data);
        return redirect()->route('user.index');
    }
    public function show($id)
    {
        return ($this->model->find($id)) ?? redirect()->route(['message' => 'Not Found']);
    }
    public function edit($id)
    {
        $id = $this->show($id);
        return view('user-update', ['data' => $id]);
    }
    public function update($id,UserUpdateRequest $updaterequest)
    {
       $data =  $updaterequest->validated();
       $this->show($id)->update($data);
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        if ($this->show($id)->delete()) {
            return redirect()->route('user.index');
        }
    }
}
