<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /*** List Clients***/ 
    public function index()
    {
        $client = Client::latest()->paginate(5);
    
        return view('pages.clienthome',compact('client'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /*** Add client***/ 
    public function create()
    {
        $city = City::all();
        return view('pages.create_client',compact('city'));
    }

    /*** Save employee***/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'notes' => 'required',
        ]);
    
        Client::create($request->all());
     
        return redirect()->route('clienthome')
                        ->with('success_client','Client created successfully.');
    }

    /*** Edit employee***/
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $city = City::all();
        return view('pages.edit_client',compact('client','city'));
    }

    /*** Update employee***/
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'notes' => 'required',
        ]);
        Client::whereId($id)->update($validateData);
    
        return redirect()->route('clienthome')
                        ->with('success_client','Client updated successfully');
    }

    /*** Delete employee***/
    public function destroy($id)
    {
        Client::whereId($id)->delete();
    
        return redirect()->route('clienthome')
                        ->with('success_client','Client deleted successfully');
    }      
}
