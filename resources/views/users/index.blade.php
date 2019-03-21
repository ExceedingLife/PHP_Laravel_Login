@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View All Users</h4>

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->get('danger'))
                        <div class="alert alert-danger">
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                    <div class="modal" id="mdelete" role="dialog" aria-labelledby="moddelete">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="moddelete">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete</p>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" id="formdelete">
                                        <input type="hidden" name="txtid" id="txtid" />
                                        <input type="text" name="uid" id="uid" />

                                        <button type="button" class="btn btn-danger " data-dismiss="modal">No</button>
                                    
                                        <span class="text-right">
                                            <!-- @csrf 
                                            @method('DELETE') -->
                                            <button type="submit" class="btn btn-primary btndelete">Yes</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center my-2">
                        <a href="{{ route('register') }}" class="btn btn-primary">New User</a>
                    </div>
                    <div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary mr-2">Show</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info text-white mx-2">Edit</a>
                                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" 
                                         data-target="#mdelete" data-id="{{$user->id}}" data-name="{{$user->username}}" 
                                         data-url="{{ URL::route('users.destroy',$user->id) }}">Delete</button>
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

@endsection

