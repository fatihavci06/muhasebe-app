@section('title', 'Offer Create')
@section('module1')Offer @endsection
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
                    <div class="alert alert-success" id="success" style="display: none">

                    </div>
                    <div class="alert alert-danger" id="error" style="display: none">

                    </div>


                    <h2>Ürün Listesi</h2>
                    <form id="formOfferUpdate">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ürün Adı</th>
                                    <th>Adet</th>
                                    <th>Fiyat</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody id="productTableBody">
                                @foreach($offer->products as $product)
                                <tr class="dynamic-row">
                                    <td><input type="text" name="name[]" class="form-control product-name" value="{{$product->name}}"></td>
                                    <td><input type="number" name="quantity[]" class="form-control product-quantity" value="{{$product->quantity}}"></td>
                                    <td><input type="number" name="price[]" class="form-control product-price" value="{{$product->price}}"></td>
                                    <td>{{$product->price*$product->quantity}}</td>
                                    <td><button type="button" class="btn btn-danger delete-row">Sil</button></td>
                                </tr>
                                @endforeach
                                <!-- Ürünlerin dinamik olarak ekleneceği yer -->
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-success btn-md btn-block" id="addProductBtn">Yeni Ürün Ekle</button>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-danger btn-md btn-block" id="deleteAllProduct">Tümünü Sil</button>
                            </div>
                            <!-- @if(auth()->user()->isadmin == 1) -->
                            <div class="col-lg-3">
                                <select name="status" class="form-control ">
                                    <option value="0" @if($offer->status==0) selected @endif>Bekleyen</option>
                                    <option value="1" @if($offer->status==1) selected @endif>Onay</option>
                                    <option value="2" @if($offer->status==2) selected @endif>Red</option>
                                </select>
                            </div>
                            <!-- @endif -->
                            <div class="col-lg-3">
                                <div class="row ml-4">
                                    <a class="btn btn-primary btn-md btn-block" style="color:#fff" id="offerUpdate">Kaydet</a>
                                </div>
                            </div>

                        </div>
                        
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <span>Toplam Adet: <span id="totalQuantity">0</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <span>Toplam Fiyat: <span id="totalValue">0.00</span></span>
                                    </div>
                                </div>
                           
                        



                    </form>

                </div>
            </div>



        </div>



    </div>
    <!-- /.widget-body -->
</div>
<!-- /.widget-bg -->
</div>
</div>
</div>
@endsection
@section('jquery')
var offerRoutes = {
updateOffer: "{{ route('offer.update',['id'=>$offer->id]) }}",

};
$(document).ready(function() {

calculateTotal();
});
@endsection