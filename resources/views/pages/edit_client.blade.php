@extends('layouts.default')
    @section('content')

      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Client</h5>
              <div class="card">
                <div class="card-body">
                <form action="{{ route('update_client',[$client->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputText1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputText1" value="{{$client->name}}" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$client->email}}" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputText2" class="form-label">Address</label>
                      <textarea class="form-control" name="address">{{$client->address}}</textarea>
                    </div>                                        
                    <div class="mb-3">
                      <label for="exampleInputText2" class="form-label">City</label>
                      <select name="city" class="form-control">
                        <option>Select</option>
                        @foreach($city as $s)
                            @if($s->id == $client->city)
                                <option value="{{$s->id}}" selected>{{$s->name}}</option>
                            @else
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputText2" class="form-label">Notes</label>
                      <textarea class="form-control" name="notes">{{$client->notes}}</textarea>
                    </div>          
                    <button type="submit" class="btn btn-primary">Submit</button>                                      
                  </form>
                </div>
              </div>              
            </div>
          </div>
      </div>
    @stop