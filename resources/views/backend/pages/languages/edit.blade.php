@extends('layouts.backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="row m-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{route('languages.index')}}" class="btn btn-success btn-sm">Languages list</a>
                        <a href="{{route('languages.create')}}" class="btn btn-primary btn-sm">+ Add language</a>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success pb-0">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <form action="{{route('languages.update',$language->id)}}" method="POST">
                            @method('PUT')
                            @csrf

                            Language<br>
                            <input type="text" name="language" maxlength="30" required value="{{$language->language}}" class="form-control mb-2">
                            @error('language')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            Lang code<br>
                            <input type="text" name="lang_code" maxlength="3" required value="{{$language->lang_code}}" class="form-control mb-2">
                            @error('lang_code')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            Status<br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="1" {{($language->status==1) ? 'selected' : ''}}>Active</option>
                                <option value="0" {{($language->status==0) ? 'selected' : ''}}>Passive</option>
                            </select>
                            @error('status')
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
