@extends('layouts.default')
    @section('content')

      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Employee</h5>
              <div class="card">
                <div class="card-body">
                <form action="{{ route('store_employee') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputText1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputText1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputText2" class="form-label">Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" id="exampleInputText2" aria-describedby="emailHelp">
                    </div>                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>              
            </div>
          </div>
      </div>
    @stop