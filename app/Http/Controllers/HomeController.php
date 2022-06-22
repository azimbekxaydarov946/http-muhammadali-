<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayStoreRequest;
use App\Http\Requests\PayUpdateRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new Payment();
    }

    public function index()
    {
        $debit_cost = request()->input('debit_cost');
        $pay_type = request()->input('pay_type');
        if(request('debit_cost')==null && request('pay_type')==null)
        {
            $data = $this->model->all();
        }
        elseif(request('debit_cost')==0 && request('pay_type')==null||request('debit_cost')==1 && request('pay_type')==null){
            $data=$this->model->with('user')->where('debit_cost', $debit_cost)->get();
        }
        elseif(request('pay_type')==0 && request('debit_cost')==null||request('pay_type')==1 && request('debit_cost')==null){
            $data=$this->model->with('user')->where('pay_type', $pay_type)->get();
        }
        elseif(request('debit_cost')>=0 && request('pay_type')>=0){
            $data=$this->model->with('user')->where('pay_type', $pay_type)->where('debit_cost', $debit_cost)->get();
        }
        return view('home', ['data' => $data,'debit_cost' => $debit_cost,'pay_type' => $pay_type]);
    }

    public function create()
    {
        $users = User::all();
        return view('home-create',['users'=>$users]);
    }

    public function store(PayStoreRequest $storerequest)
    {
        $data = $storerequest->validated();
        $this->model->create($data);
        return redirect()->route('home');
    }
    public function show($id)
    {
        return ($this->model->find($id)) ?? redirect()->route(['message' => 'Not Found']);
    }
    public function edit($id)
    {
        $users = User::all();
        $data = $this->show($id);
        return view('home-update', ['data' => $data,'users'=>$users]);
    }
    public function update($id, PayUpdateRequest $updaterequest)
    {
        $data =  $updaterequest->validated();
        $this->show($id)->update($data);
        return redirect()->route('home');
    }
    public function destroy($id)
    {
        if ($this->show($id)->delete()) {
            return redirect()->route('home');
        }
    }
}
