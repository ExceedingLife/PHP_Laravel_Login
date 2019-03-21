@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Show User</h4></div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="txtid" class="col-md-3"><b>ID:</b></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="txtid"
                             id="txtid" value="{{ $user->id }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtname" class="col-md-3"><b>Name:</b></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="txtname" 
                             id="txtname" value="{{ $user->name }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtemail" class="col-md-3"><b>Email:</b></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="txtemail" 
                             id="txtemail" value="{{ $user->email }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtusername" class="col-md-3"><b>Username:</b></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="txtusername" 
                             id="txtusername" value="{{ $user->username }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center text-center">
                        <div class="col-md-5">
                            <a class="btn btn-primary" href="{{ route('users.index') }}">View Users</a>
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">Edit User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection