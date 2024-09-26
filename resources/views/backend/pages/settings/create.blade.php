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

                        <a href="{{route('settings.index')}}" class="btn btn-success btn-sm mb-3">Settings
                            list</a>

                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($languages as $key=>$language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab"
                                       href="{{'#'.$language}}">{{strtoupper($language)}}</a>
                                </li>
                            @endforeach
                        </ul>

                        <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content mb-3">
                                @foreach($languages as $key => $language)
                                    <div id="{{$language}}"
                                         class="tab-pane .mb-3 mt-0 {{$loop->first ? 'active' : ''}}">
                                        <br>

                                        Value ({{strtoupper($language)}})<br>
                                        <textarea name="value:{{$language}}" id="value_{{$language}}" rows="4" cols="3"
                                                  class="form-control mb-3"> </textarea>
                                        @error("value:$language")
                                        <p class="text-danger mb-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            Static value<br>
                            <input type="text" name="static_value" class="form-control mb-3"
                                   value='{{old("static_value")}}'>
                            @error("static_value")
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror

                            Key*<br>
                            <input type="text" name="key" class="form-control mb-3" required maxlength="255"
                                   value='{{old("key")}}'>
                            @error("key")
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror

                            Image<br>
                            <input type="file" name="image" class="form-control mb-3">
                            @error("image")
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror

                            Status<br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Passive</option>
                            </select>
                            @error('status')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror


                            <button type="submit" class="btn btn-primary mt-3">Create</button>
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
            CKEDITOR.replace({{'value_'.$lang}});
            @endforeach
        </script>

@endsection
