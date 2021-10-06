<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('index', compact('user'));
    }
    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $user = User::create($formData);
        if ($request->has('address')) {
            $data = [
                'user_id' => $user->id,
                'address' => $request->address,
            ];
            Address::create($data);
        }
        return redirect(route('index'))->with('success', 'data added succesfully');
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $user->update($formData);
        if ($request->has('address')) {
            $data = [
                'user_id' => $user->id,
                'address' => $request->address,
            ];
            $address = Address::where('user_id', $user->id)->first();
            $address->update($data);
        }
        return redirect(route('index'))->with('success', 'data updtaed succesfully');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('index'))->with('success', 'data deletd');
    }
}
