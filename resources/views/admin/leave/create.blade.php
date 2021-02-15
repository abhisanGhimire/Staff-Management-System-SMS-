@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('leaves.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header" style="background-color:#d6d2c3;">Leave Form</div>

                    <div class="card-body">
                        <div class='form-group'>
                            <label>From date</label>
                            <input type="date" name="from" class="form-control  @error('from') is-invalid @enderror" required>
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" name="to" class="form-control  @error('to') is-invalid @enderror" required>
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of Leave</label>
                            <select class="form-control" name="type">
                                <option value="annualleave">Annual Leave</option>
                                <option value="sickleave">Sick Leave</option>
                                <option value="parentalleave">Parental Leave</option>
                                <option value="otherleave">Other Leave</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">

                            </textarea>
                        </div>
                        <div class='form-group'>
                            <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date From</th>
                        <th scope="col">Date To</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}}</td>
                        <td>{{$leave->description}}</td>
                        <td>{{$leave->type}}</td>
                        <td>{{$leave->reply}}</td>
                        <td>
                            @if($leave->status=='0')
                            <span class="alert alert-danger">Pending</span>
                            @else
                            <span class="alert alert-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('leaves.edit',[$leave->id])}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
                                <i class=" fas fa-trash"> </i></a>
                            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('leaves.destroy',[$leave->id])}}" method="post">
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection