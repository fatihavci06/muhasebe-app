@section('title', 'Invoice Create')
@section('module1')Invoice @endsection
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

                        <div class="form-group row firma--area">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="l0">Tip Seçiniz</label>
                                    <select class="m-b-10 form-control" id="invoice_type" name="invoice_type" data-toggle="select2">
                                        <option value="">Seçiniz</option>

                                        <option value="0" @if(old('invoice_type',$data->invoice_type)==0) selected @endif>Gelir</option>
                                        <option value="1" @if(old('invoice_type',$data->invoice_type)==1) selected @endif>Gider</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="l0">Müşteri Seçiniz</label>
                                    <select class="m-b-10 form-control" name="musteriId" data-toggle="select2">
                                        <option value="">Seçiniz</option>
                                        @foreach($customers as $customer)
                                        <option @if(old('invoice_type',$data->customer->id)==$customer->id) selected @endif value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row firma--area">
                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Fatura No</label>
                                <input class="form-control" required name="faturaNo" type="text" value="{{ old('faturaNo',$data->invoice_no) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="l0">Fatura Tarih</label>
                                <input class="form-control" required name="faturaTarih" value="{{ old('faturaTarih',$data->invoice_date) }}" type="date">
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
                                            @foreach($data->transactions as $transaction)
                                            <tr class="kalem">
                                                <td style="width:15%;"><select class="form-control" id="kalemSec" onchange="setKDV(this)" name="kalem[]">
                                                        <option value="">Seçiniz</option>
                                                        @foreach($financial as $f)
                                                            <option value="{{ $f->id }}" @if($f->id==$transaction->pencil_id) selected @endif data-kdv="{{ $f->kdv }}">{{ $f->name }}</option>
                                                        @endforeach

                                                    </select></td>
                                                <td><input type="text" class="form-control" name="urun[]" ></td>
                                                <td><input type="text" class="form-control" name="adet[]" value="{{ $transaction->amount }}" oninput="calculateTotal(this)"></td>
                                                <td><input type="text" class="form-control" name="tutar[]" value="{{ $transaction->price }}" oninput="calculateTotal(this)"></td>
                                                <td><input type="text" class="form-control" name="toplamTutar[]" value="{{ $transaction->amount }}"></td>
                                                <td><input type="text" class="form-control" name="kdv[]" value="{{ $transaction->subtotal }}" oninput="calculateTotal(this)"></td>
                                                <td><input type="text" class="form-control" name="kdvToplam[]" value="{{ $transaction->kdvtotal }}"></td>
                                                <td><input type="text" class="form-control" name="genelToplam[]" value="{{ $transaction->total }}"></td>
                                                <td><input type="text" class="form-control" name="aciklama[]"></td>
                                                <td><button class="btn btn-danger" onclick="removeRow(this)">Kaldır</button></td>
                                            </tr>
                                            @endforeach
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
$(document).ready(function() {
    // Sayfa içeriği tamamen yüklendiğinde çalışacak kod buraya gelecek
    calculateToplamGenelTutar();
    calculateKdvToplamTutar();
    calculateAraToplam();

});
function addRow() {
    var selectedValue = $("#invoice_type").val();
    if(selectedValue==''){
        alert('Tip Seçiniz...');
        return false;
    }
    $.ajax({
        type: 'GET',
        url: '{{ route("financial.getdata") }}',
        data: {type:selectedValue},
        success: function (response) {

            console.log(response.data);
            var option='';
            $.each(response.data, function(index, item) {
                option=option + '<option  data-kdv="'+item.kdv+'"value="'+item.id+'">'+item.name+'</option>';
               console.log(option);

                // Option'u selectBox'a ekleyin

            });
            var newRowHtml = `
            <tr class="kalem">
                <td style="width:15%;"><select class="form-control" id="kalemSec" onchange="setKDV(this)" name="kalem[]">
                        <option value="">Seçiniz</option>`+option+`
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


        },
        error: function (error) {



        }
    });
    console.log(selectedValue);

}
var invoiceRoutes = {
        storeInvoice: "{{ route('invoice.store') }}",
        financialGetData: "{{ route('financial.getdata') }}",

    };

@endsection
@section('includes')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> ds
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
@endsection
