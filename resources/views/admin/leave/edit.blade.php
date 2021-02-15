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
            <form action="{{route('leaves.update',[$leave->id])}}" method="post">
                @method('PATCH')
                @csrf
                <div class="card">
                    <div class="card-header" style="background-color:#d6d2c3;">Update Leave Form</div>

                    <div class="card-body">
                        <div class='form-group'>
                            <label>From date</label>
                            <input type="date" name="from" class="form-control  @error('from') is-invalid @enderror" value="{{$leave->from}}" required>
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" name="to" class="form-control  @error('to') is-invalid @enderror" value="{{$leave->to}}" required>
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
                            {{$leave->description}}
                            </textarea>
                        </div>
                        <div class='form-group'>
                            <button type="submit" class="btn btn-primary"> Update </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection