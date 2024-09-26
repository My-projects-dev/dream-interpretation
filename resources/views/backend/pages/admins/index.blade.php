@extends('layouts.backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row m-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('admin.create')}}" class="btn btn-primary btn-sm">+ Add admin</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-warning btn-sm mr-3">Edit</a>

                                    <form action="{{ route('admin.destroy',$admin->id) }}" method="Post"
                                          onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
                                        @method('DELETE')
                                        @csrf
                                        @if($admin->id!=1)
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @endif
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                        <div class="d-flex justify-content-center">{!! $admins->links() !!}</div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- /.content -->
</div>
@endsection
