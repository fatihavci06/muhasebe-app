@section('title', 'Bank Create')
@section('module1')Bank @endsection
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

                    <form action="{{ route('product.update',['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')






                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Ürün Adı</label>
                                <input class="form-control" name="name" type="text" value="{{ old('name',$data->name) }}">
                            </div>

                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Stok</label>
                                <input class="form-control" name="quantity" step="any" type="number" value="{{ old('quantity',$data->quantity) }}" min="0">
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