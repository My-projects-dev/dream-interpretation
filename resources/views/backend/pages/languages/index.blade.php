@extends('layouts.backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="row m-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('languages.create')}}" class="btn btn-primary btn-sm">+ Add language</a>

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
                                <th>Language</th>
                                <th>Language Code</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{$language->language}}</td>
                                    <td>{{$language->lang_code}}</td>
                                    <td>{{$language->view}}</td>
                                    <td><span class="{{($language->status==1) ? 'badge-success' : 'badge-danger'}} p-1 rounded-sm">{{($language->status==1) ? 'Active' : 'Passive'}}</span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('languages.edit',$language->id)}}"
                                               class="btn btn-warning btn-sm mr-3">Edit</a>

                                            <form action="{{ route('languages.destroy',$language->id) }}" method="Post"
                                                  onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
                                                @method('DELETE')
                                                @csrf
                                                @if(app()->getLocale()!=$language->lang_code)
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <div class="d-flex justify-content-center">{!! $languages->links() !!}</div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection
