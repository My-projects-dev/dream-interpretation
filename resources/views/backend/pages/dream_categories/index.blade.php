@extends('layouts.backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="row m-1">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success pb-0">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger pb-0">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('dream_categories.create')}}" class="btn btn-primary btn-sm">+ Add category</a>

                        {{--                        <div class="card-tools">--}}
                        {{--                            <div class="input-group input-group-sm" style="width: 150px;">--}}
                        {{--                                <input type="text" name="table_search" class="form-control float-right"--}}
                        {{--                                       placeholder="Search">--}}

                        {{--                                <div class="input-group-append">--}}
                        {{--                                    <button type="submit" class="btn btn-default">--}}
                        {{--                                        <i class="fas fa-search"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('dream_categories.edit',['dream_category' => $category->id])}}"
                                               class="btn btn-warning btn-sm mr-3">Edit</a>
                                            <form action="{{ route('dream_categories.destroy',['dream_category' => $category->id]) }}"
                                                  method="Post" onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">{!! $categories->links() !!}</div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
