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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{route('dream_categories.index')}}" class="btn btn-success btn-sm">Categories list</a>
                            <a href="{{route('dream_categories.create')}}" class="btn btn-primary btn-sm">+ Add category</a>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($languages as $key=>$language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab"
                                       href="{{'#'.$language}}">{{strtoupper($language)}}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="text-center mt-5">
                            @if($dream_category->image)
                                <img class="border border-primary" src="{{asset('uploads/dream_categories/'.$dream_category->image)}}"
                                     alt="{{$dream_category->transname}}"
                                     width="300"
                                     >
                            @endif
                        </div>
                        <form action="{{route('dream_categories.update',['dream_category' =>$dream_category->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="tab-content">
                                @foreach($languages as $key => $language)
                                    <div id="{{$language}}"
                                         class="tab-pane .mb-3 mt-0 {{$loop->first ? 'active' : ''}}">
                                        <br>
                                        Name ({{strtoupper($language)}})<br>
                                        <input type="text" name="name:{{$language}}" class="form-control mb-2" value="{{ isset($dream_category) ? $dream_category->translate($language)->name : old('name:'.$language) }}">
                                        @error("name:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            Image<br>
                            <input type="file" name="image" class="form-control mb-2">
                            @error('image')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror

                            Status<br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="1" {{($dream_category->status==1) ? 'selected' : ''}}>Active</option>
                                <option value="0" {{($dream_category->status==0) ? 'selected' : ''}}>Passive</option>
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
