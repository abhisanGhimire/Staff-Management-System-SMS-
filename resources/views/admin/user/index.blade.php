@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">All Users</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            @if(Session::has('messages'))
            <div class="alert alert-danger">
                {{Session::get('messages')}}
            </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Start_from</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users)>0)
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('profile')}}/{{$user->image}}" width="60"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><span class="badge badge-success">{{$user->role->name??''}}</span></td>
                        <td>{{$user->department->name??''}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->start_from}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->mobile_number}}</td>

                        <td>
                            @if(isset(auth()->user()->role->permission['name']['user']['can-edit']))
                            <a href="{{route('users.edit',[$user->id])}}"><i class="fas fa-edit"></i></a>
                        </td>
                        @endif
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['user']['can-delete']))
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                <i class=" fas fa-trash"> </i></a>
                            @endif
                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('users.destroy',[$user->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td>No users to display</td>

                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection