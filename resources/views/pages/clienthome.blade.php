@extends('layouts.default')
@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 pull-left">Clients Lists</h5>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('create_clients') }}"> Create New Client</a>
                    </div>
                    @if ($message = Session::get('success_client'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Address</h6>
                                    </th>                                    
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Notes</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $c)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ ++$i }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $c->name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><a herf="mailto:{{ $c->name }}">{{ $c->email }}</a>
                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span
                                                class="rounded-3 fw-semibold">{{ $c->address }}</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $c->notes }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit_client',[$c->id]) }}"><button type="button"
                                                class="btn btn-outline-secondary m-1"><i
                                                    class="ti ti-edit"></i></button></a>
                                        <form action="{{ route('delete_client', [$c->id])}}" method="post"
                                            class="fit-content-button float-start">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-secondary m-1"><i
                                                    class="ti ti-archive"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop