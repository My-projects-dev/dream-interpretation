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

                        <a href="{{route('settings.create')}}" class="btn btn-primary btn-sm">+ Add setting</a>

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
                                <th>Image</th>
                                <th>Key</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>
                                        @if($setting->image)
                                            <img src="{{asset('uploads/settings/'.$setting->image)}}" alt="{{$setting->key}}" width="100"
                                                 height="100">
                                        @endif
                                    </td>
                                    <td>{{$setting->key}}</td>
                                    <td ><span class="{{($setting->status==1) ? 'badge-success' : 'badge-danger'}} p-1 rounded-sm">{{($setting->status==1) ? 'Active' : 'Passive'}}</span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('settings.edit',['setting' => $setting->id])}}"
                                               class="btn btn-warning btn-sm mr-3">Edit</a>
                                            <form action="{{ route('settings.destroy',['setting' => $setting->id]) }}"
                                                  method="Post"
                                                  onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
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

                        <div class="d-flex justify-content-center">{!! $settings->links() !!}</div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
