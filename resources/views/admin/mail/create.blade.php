@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Send Mail</div>
                <div class="card-body">
                    <form action="{{route('mails.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Select</label>
                            <select id="mail" class="form-control">
                                <option value="0">Mail to all staff</option>
                                <option value="1">Choose Department</option>
                                <option value="2">Choose person</option>
                            </select>
                            <br>
                            <div id="department">
                                <select name="department" class="form-control">
                                    <option value="">Select</option>
                                    @foreach(App\Department::all() as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div id="person">
                                <select name="person" class="form-control">
                                    <option value="">Select</option>
                                    @foreach(App\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror">
                            </textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #department {
        display: none;
    }

    #person {
        display: none;
    }
</style>
@endsection