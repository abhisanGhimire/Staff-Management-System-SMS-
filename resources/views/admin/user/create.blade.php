@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active " aria-current="page">Register Employee</li>
        </ol>
    </nav>
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class='card'>
                    <div class="card-header" style="background-color:#c6c3e3">General Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control  @error('firstname') is-invalid @enderror" required>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control  @error('lastname') is-invalid @enderror" required>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" required>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" @error('mobile_number') is-invalid @enderror" class="form-control" required>
                            @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control" name="department_id" required>
                                @foreach(App\Department::all() as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror" required>
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="start_from" class="form-control  @error('start_from') is-invalid @enderror" placeholder="dd-mm-yyyy" required>
                            @error('start_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" style="background-color:#c6c3e3">Login Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" class="form-control" name="role_id" required>
                                @foreach(App\Role::all() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection