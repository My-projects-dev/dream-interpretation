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
                            <a href="{{route('dreams.index')}}" class="btn btn-success btn-sm">Dreams list</a>
                            <a href="{{route('dreams.create')}}" class="btn btn-primary btn-sm">+ Add dream</a>
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
                            @if($dream->image)
                                <img class="border border-primary" src="{{asset('uploads/dreams/'.$dream->image)}}"
                                     alt="{{$dream->transname}}"
                                     width="300"
                                     >
                            @endif
                        </div>
                        <form action="{{route('dreams.update',['dream' =>$dream->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="tab-content mb-3">
                                @foreach($languages as $key => $language)
                                    <div id="{{$language}}"
                                         class="tab-pane .mb-3 mt-0 {{$loop->first ? 'active' : ''}}">
                                        <br>

                                        Name ({{strtoupper($language)}})<br>
                                        <input type="text" name="name:{{$language}}" class="form-control mb-2"
                                               value="{{ isset($dream) ? $dream->translate($language)?->name : old('name:'.$language) }}">
                                        @error("name:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Slug* ({{strtoupper($language)}})<br>
                                        <input type="text" name="slug:{{$language}}" class="form-control mb-3"
                                               value="{{ isset($dream) ? $dream->translate($language)?->slug : old('slug:'.$language) }}">
                                        @error("slug:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Meta title* ({{strtoupper($language)}})<br>
                                        <input type="text" name="title:{{$language}}" class="form-control mb-3"
                                               value="{{ isset($dream) ? $dream->translate($language)?->title : old('title:'.$language) }}">
                                        @error("title:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Meta Keywords* ({{strtoupper($language)}})<br>
                                        <input type="text"
                                               name="keywords:{{$language}}"
                                               class="form-control mb-3"
                                               value="{{ isset($dream) ? $dream->translate($language)?->keywords : old('keywords:'.$language) }}"
                                               data-role="tagsinput">
                                        @error("keywords:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                        <br>

                                        Meta description* ({{strtoupper($language)}})<br>
                                        <input type="text" name="description:{{$language}}" class="form-control mb-3"
                                               value="{{ isset($dream) ? $dream->translate($language)?->description : old('description:'.$language) }}">
                                        @error("description:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror

                                        Content* ({{strtoupper($language)}})<br>
                                        <textarea name="text:{{$language}}" id="text_{{$language}}" rows="4" cols="3"
                                                  class="form-control mb-3">
                                            {{ isset($dream) ? $dream->translate($language)?->text : old('text:'.$language) }}
                                        </textarea>
                                        @error("text:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            Image*<br>
                            <input type="file" name="image" class="form-control mb-3">
                            @error('image')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror

                            Status<br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="1" {{($dream->status==1) ? 'selected' : ''}}>Active</option>
                                <option value="0" {{($dream->status==0) ? 'selected' : ''}}>Passive</option>
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
    <script>
        @foreach($languages as $lang)
        CKEDITOR.replace({{'text_'.$lang}});
        @endforeach
    </script>
@endsection
