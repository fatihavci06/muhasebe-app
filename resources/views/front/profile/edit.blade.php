@section('title', 'Profile Edit')
@section('module1')Profile @endsection
@section('module2')Edit @endsection
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

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class=" col-form-label">Profil Resmi</label>
                                    <input class="form-control" name="photo" type="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class=" col-form-label">Ad</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name',$user->name) }}">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class=" col-form-label">Email</label>
                                    <input class="form-control" name="email" type="text" value="{{ old('email',$user->email) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class=" col-form-label">Şifre</label>
                                    <input class="form-control" name="password" type="password">
                                </div>
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
@section('jquery')

    $(document).ready(function () {

    $(".change-customerType").change(function () {

    var customerType = $(this).val();
    if(customerType==1){
    $(".firma--area").fadeIn();

    }
    else{

    $(".firma--area").fadeOut();
    }
    });
    });
@endsection
