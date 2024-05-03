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
                    <form id="formOfferSave">
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
                                <!-- Ürünlerin dinamik olarak ekleneceği yer -->
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-success btn-md btn-block" id="addProductBtn">Yeni Ürün Ekle</button>
                            </div>
                            <div class="col-lg-2">
                            <button type="button" class="btn btn-danger btn-md btn-block" id="deleteAllProduct">Tümünü Sil</button>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <span>Toplam Adet: <span id="totalQuantity">0</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <span>Toplam Fiyat: <span id="totalValue">0.00</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mt-2">
                                    <a class="btn btn-primary btn-md btn-block" style="color:#fff" id="offerSave">Kaydet</a>
                                </div>
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
storeOffer: "{{ route('offer.store') }}",

};
@endsection