@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach($errors->all() as  $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="id" class="col-md-3"><b>ID:</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="id"
                                id="id" value="{{ $user->id }}" disabled />
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="name" class="col-md-3"><b>Name:</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control {{ $errors->has('name') 
                                 ? ' is-invalid' : '' }}" name="name" id="name" value="{{ $user->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3"><b>Email:</b></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control {{ $errors->has('email') 
                                 ? ' is-invalid' : '' }}" name="email" id="email" value="{{ $user->email }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-3"><b>Username:</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control {{ $errors->has('username') 
                                 ? ' is-invalid' : '' }}" name="username" id="username" value="{{ $user->username }}" />
                            </div>
                        </div>
                        <div class="form-group row justify-content-center text-center">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            <div class="col-md-5">
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Go Back</a>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection