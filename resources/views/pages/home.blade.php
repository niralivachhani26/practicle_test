    @extends('layouts.default')
    @section('content')

    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 pull-left">Employee Lists</h5>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('create_employee') }}"> Create New Employee</a>
                        </div>
                        @if ($message = Session::get('success'))
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
                                            <h6 class="fw-semibold mb-0">Mobile No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $emp)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ ++$i }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $emp->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><a
                                                    href="mailto:{{ $emp->email}}">{{ $emp->email }}</a></p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><a
                                                    href="tel:{{ $emp->mobile_no}}">{{ $emp->mobile_no }}</a></p>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($emp->status == 1)
                                            <div class="d-flex align-items-center gap-2 employee_status">
                                                <button type="button"
                                                    class="border-0 badge bg-success rounded-3 fw-semibold"
                                                    onclick="changestatus({{$emp->status}}, {{$emp->id}})"> Active
                                                </button>
                                            </div>
                                            @else
                                            <div class="d-flex align-items-center gap-2 employee_status">
                                                <button type="button"
                                                    class="border-0 badge bg-danger rounded-3 fw-semibold"
                                                    onclick="changestatus({{$emp->status}}, {{$emp->id}})"> Inactive
                                                </button>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_employee',[$emp->id]) }}"><button type="button"
                                                    class="btn btn-outline-secondary m-1"><i
                                                        class="ti ti-edit"></i></button></a>
                                            <form action="{{ route('delete_employee', [$emp->id])}}" method="post"
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