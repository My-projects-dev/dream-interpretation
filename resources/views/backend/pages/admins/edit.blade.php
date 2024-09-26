@extends('layouts.backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="row m-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{route('admin.index')}}" class="btn btn-success btn-sm">Admins list</a>
                        <a href="{{route('admin.create')}}" class="btn btn-primary btn-sm">+ Add admin</a>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success pb-0">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="{{route('admin.update',$admin->id)}}" method="POST">
                            @method('PUT')
                            @csrf

                            Name<br>
                            <input type="text" name="name" value="{{$admin->name}}" class="form-control mb-2">
                            @error('name')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            Email<br>
                            <input type="text" name="email" value="{{$admin->email}}" class="form-control mb-2">
                            @error('email')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            Password<br>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="btn btn-warning mt-3">Edit</button>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- /.content -->
        </div>
    </div>
@endsection
