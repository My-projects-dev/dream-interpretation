@extends('layouts.backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="row m-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('languages.index')}}" class="btn btn-success btn-sm mb-3">Language list</a>

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

                        <form action="{{route('languages.store')}}" method="post">
                            @csrf
                            Language<br>
                            <input type="text" name="language" maxlength="30"  required class="form-control mb-2" value='{{old("language")}}'>
                            @error('language')
                            <p class="text-danger mb-1">{{ $message }}</p>
                            @enderror
                            Lang code<br>
                            <input type="text" name="lang_code" maxlength="3" required class="form-control mb-2" value='{{old("lang_code")}}'>
                            @error('lang_code')
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
@endsection
