@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Leave</div>

                <div class="card-body">
                    <table class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Date From</th>
                                <th scope="col">Date To</th>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Reply</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                            <tr>
                                <td>{{$leave->user->name}}</td>
                                <td>{{$leave->from}}</td>
                                <td>{{$leave->to}}</td>
                                <td>{{$leave->description}}</td>
                                <td>{{$leave->type}}</td>
                                <td>{{$leave->message}}</td>
                                <td>
                                    @if($leave->status=='0')
                                    <span class="alert alert-danger">Pending</span>
                                    @else
                                    <span class="alert alert-success">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
                                        Approve/Reject
                                    </a>
                                </td>
                                <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('accept.reject',[$leave->id])}}" method="post">
                                            @csrf

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Leave</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status" required="">
                                                                <option value="0">Pending</option>
                                                                <option value="1">Accept</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="message" class="form-control" required=""></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
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
@endsection