@section('title', 'Payment Create')
@section('module1')Payment @endsection
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

                        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf






                            <div class="form-group row ">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Müşteri Seçiniz</label>
                                    <select class="form-control" name="customer_id">
                                        <option value="">Seçiniz</option>
                                        @foreach ($customers as $customer )
                                            <option value="{{ $customer->id }}" @if(old('customer_id')==$customer->id) selected @endif> {{ $customer->name }} &nbsp {{  $customer->surname }}</option>

                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Fiyat </label>
                                    <input class="form-control" name="price" value="{{ old('price') }}"
                                        type="text">
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">İşlem Tarihi </label>
                                    <input class="form-control" name="date" value="{{ old('date', date('Y-m-d') ) }}"
                                        type="date">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Hesap</label>
                                    <select class="form-control" name="bank_id">
                                        <option value="">Seçiniz</option>
                                        @foreach ($banks as $bank )
                                            <option value="{{ $bank->id }}" @if(old('bank_id')==$bank->id) selected @endif> {{  $bank->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Ödeme Tipi</label>
                                    <select class="form-control" name="type" id='payment_type'>
                                        <option value="">Seçiniz</option>
                                        <option value="0">Ödeme</option>
                                        <option value="1">Tahsilat</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">Fatura Seçiniz</label>
                                    <select class="form-control" name="invoice_id" id="invoices">
                                        <option value="">Seçiniz</option>
                                        @foreach ($invoices as $invoice )
                                            <option value="{{ $invoice->id }}" @if(old('invoice_id')==$invoice->id) selected @endif> {{  $invoice->invoice_no }}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label class="col-form-label" for="l0">Açıklama</label>
                                    <textarea class="form-control" name="description" >{{ old('description') }}</textarea>
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
var invoiceRoutes = {
    listWithPaymentType: "{{ route('invoice.listWithPaymentType') }}",

};
@endsection
