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

                        <a href="{{route('about.create')}}" class="btn btn-primary btn-sm">+ Add about</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{$about->title}}</td>
                                    <td ><span class="{{($about->status==1) ? 'badge-success' : 'badge-danger'}} p-1 rounded-sm">{{($about->status==1) ? 'Active' : 'Passive'}}</span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('about.edit',['about' => $about->id])}}"
                                               class="btn btn-warning btn-sm mr-3">Edit</a>
                                            <form action="{{ route('about.destroy',['about' => $about->id]) }}" method="Post"
                                                  onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">{!! $abouts->links() !!}</div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
