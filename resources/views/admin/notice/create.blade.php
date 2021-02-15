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
            <form action="{{route('notices.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header" style="background-color:#d6d2c3;">Create New Notice</div>

                    <div class="card-body">
                        <div class='form-group'>
                            <label>Title</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label>Description</label>
                            <textarea class="form-control  @error('description') is-invalid @enderror" name="description"> </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control  @error('date') is-invalid @enderror" required>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Created By</label>
                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control  @error('name') is-invalid @enderror" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection