@section('title', 'Customer Create')
@section('module1')Customer @endsection
@section('module2')Create @endsection
<!-- /.navbar -->
@extends('layouts.master')
<!-- SIDEBAR -->
@section('includesCSS')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <div class="alert alert-success" id="success" style="display: none">

                    </div>
                    <div class="alert alert-danger" id="error" style="display: none">

                    </div>

                    <form method="POST" id="formInvoice">
                        @csrf
                        <input type="hidden" name="invoice_type" value="0">
                        <div class="form-group row firma--area">
                            <div class="col-md-4">
                                <label class="col-form-label" for="l0">Fatura No</label>
                                <input class="form-control" required name="faturaNo" type="text">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="l0">Müşteri Seçiniz</label>
                                    <select class="m-b-10 form-control" name="musteriId" data-toggle="select2">
                                        <option value="">Seçiniz</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="l0">Fatura Tarih</label>
                                <input class="form-control" required name="faturaTarih" value="{{ date("Y-m-d") }}" type="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="faturaData" class="table">
                                        <thead>
                                            <tr>
                                                <th>Kalem</th>
                                                <th>Ürün</th>
                                                <th>Adet / Gün</th>
                                                <th>Tutar</th>
                                                <th>Toplam Tutar</th>
                                                <th>Kdv</th>
                                                <th>Kdv Toplam</th>
                                                <th>Genel Toplam</th>
                                                <th>Açıklama</th>
                                                <th>Kaldır</th>
                                            </tr>
                                        </thead>

                                        <tbody id="dynamic-form-body">
                                            <!-- Dinamik satırlar buraya eklenecek -->
                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addRow()" class="btn-rounded btn btn-primary"> + </button>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <td align="left">Ara Toplam:</td>
                                        <td align="right" id="araToplam" class="ara_toplam">0.00</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Kdv Toplam:</td>
                                        <td align="right" id="toplamKdv" class="kdv_toplam">0.00</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Gnl. Toplam:</td>
                                        <td align="right" id="toplamGenelTutar" class="genel_toplam">0.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>







                        <div class="form-actions">
                            <div class="form-group row">
                                <div class="col-md-12 ml-md-auto btn-list">
                                    <a class="btn btn-primary btn-rounded" id="saveInvoice">Kaydet</a>
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
function addRow() {
    // Yeni satır HTML içeriği
    var newRowHtml = `
<tr class="kalem">
    <td style="width:15%;"><select class="form-control" onchange="setKDV(this)" name="kalem[]">
            <option value="">Seçiniz</option>@foreach($financialItem as $data)<option data-kdv={{$data->kdv}} value="{{$data->id}}">{{$data->name}}</option>@endforeach
        </select></td>
    <td><input type="text" class="form-control" name="urun[]"></td>
    <td><input type="text" class="form-control" name="adet[]" oninput="calculateTotal(this)"></td>
    <td><input type="text" class="form-control" name="tutar[]" oninput="calculateTotal(this)"></td>
    <td><input type="text" class="form-control" name="toplamTutar[]"></td>
    <td><input type="text" class="form-control" name="kdv[]" oninput="calculateTotal(this)"></td>
    <td><input type="text" class="form-control" name="kdvToplam[]"></td>
    <td><input type="text" class="form-control" name="genelToplam[]"></td>
    <td><input type="text" class="form-control" name="aciklama[]"></td>
    <td><button class="btn btn-danger" onclick="removeRow(this)">Kaldır</button></td>
</tr>
`;

    // Dinamik satırı tabloya ekle
    $('#dynamic-form-body').append(newRowHtml);
}
var invoiceRoutes = {
        storeInvoice: "{{ route('invoice.store') }}",
       
    };
@endsection
@section('includes')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> ds
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
@endsection