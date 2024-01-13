@section('title', 'Customer Create')
@section('module1')Customer @endsection
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

                        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class=" col-form-label">Müşteri Resmi</label>
                                    <input class="form-control" name="photo" type="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="" class="col-form-label">Müşteri Tipi</label>
                                    <div>
                                        <input type="radio" class="change-customerType" checked  {{ old('customer_type') == '0' ? 'checked' : '' }} name="customer_type"
                                            value="0"> Bireysel
                                    </div>
                                    <div>
                                        <input type="radio" class="change-customerType" {{ old('customer_type') == '1' ? 'checked' : '' }} name="customer_type"
                                            value="1"> Kurumsal
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row firma--area"  style="display: {{ old('customer_type') == '1' ? '' : 'none' }}">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Firma Adı</label>
                                    <input class="form-control" name="company_name" type="text" value="{{ old('company_name') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Vergi Numarası</label>
                                    <input class="form-control" name="tax_number" type="text" value="{{ old('tax_number') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Vergi Dairesi</label>
                                    <input class="form-control" name="tax_office" value="{{ old('tax_office') }}" type="text">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">Ad</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">Soyad</label>
                                    <input class="form-control" name="surname" type="text" value="{{ old('surname') }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">Doğum Tarih</label>
                                    <input class="form-control" name="birthday" type="date" value="{{ old('birthday') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">TC</label>
                                    <input class="form-control" name="tc_no" value="{{ old('tc_no') }}" type="text">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Adres</label>
                                    <input class="form-control" name="adress" value="{{ old('adress') }}" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Telefon</label>
                                    <input class="form-control" name="number" value="{{ old('number') }}" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Email</label>
                                    <input class="form-control" name="email" value="{{ old('email') }}" type="text">
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
