@extends('layouts.dashboard.app')

@section('content')
    <div>
        <h2>Users</h2>
    </div>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="col-md-12">

                    {{--            <h3 class="tile-title">Add user</h3>--}}
                    <div class="tile-body">
                        {{--                <form class="form-horizontal" method="post" action="{{route('dashboard.users.update',$users->id)}}">--}}
                        <form method="post" action="{{ route('dashboard.users.update', $user->id) }}">

                            @csrf
                            @method('put')
                            @include('dashboard.partials._errors')

                            <div class="form-group row">
                                <label class="control-label col-md-3">user name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" type="text" placeholder="Enter user name"
                                           value="{{old('name',$user->name)}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">user email</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="email" type="email" placeholder="Enter user email"
                                           value="{{old('email',$user->email)}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Roles</label>
                                <div class="col-md-9">
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" {{$user->hasRole($role->name)? 'selected':''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-edit"></i>Edit
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{route('dashboard.users.index')}}"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
