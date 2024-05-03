@section('title', 'User Create')
@section('module1')User @endsection
@section('module2')Create @endsection
<!-- /.navbar -->
@extends('layouts.master')
<!-- SIDEBAR -->
@section('content')
<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </div>
                    @endif

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Kullanıcı Adı</label>
                                <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                            </div>

                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Email</label>
                                <input class="form-control" name="email" type="text" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Password</label>
                                <input class="form-control" name="password" type="password">
                            </div>
                        </div>

                        <div class="form-group row ml-4 ">
                            @foreach($menus as $menu)
                            <div class="col-md-3">
                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $menu->id }}" id="flexCheckDefault{{ $menu->id }}" @if(in_array($menu->id, old('permission', []))) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault{{ $menu->id }}">
                                    {{ $menu->name }}
                                </label>
                            </div>
                            @endforeach


                        </div>


                        <div class="form-actions">
                            <div class="form-group row">
                                <div class="col-md-12 ml-md-auto btn-list">
                                    <button class="btn btn-primary btn-rounded" type="submit">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
    </div>
</div>
@endsection