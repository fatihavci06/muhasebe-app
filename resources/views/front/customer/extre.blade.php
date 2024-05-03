@section('title', 'Customer Extre')
@section('module1')Customer @endsection
@section('module2')Extre @endsection
<!-- /.navbar -->
@section('css')
#dataTable_paginate{
font-size: 16px; /* Numara font büyüklüğü */
padding: 10px 15px; /* Numara kutusu içi boşluklar */
}
#dataTable_paginate a{
/* Numara font büyüklüğü */
padding: 10px 15px; /* Numara kutusu içi boşluklar */
cursor: pointer;
}
@endsection

@extends('layouts.master')
<!-- SIDEBAR -->
@section('content')
<div class="col-12 col-md-12 widget-holder widget-full-content">
    <div class="widget-bg">
        <div class="widget-body clearfix">
            <div class="widget-user-profile">
                <figure class="profile-wall-img">
                    <img src="{{ asset('thema/') }}/assets/demo/user-widget-bg.jpeg" alt="User Wall">
                </figure>
                <div class="profile-body">
                    <figure class="profile-user-avatar thumb-md">
                        <img src="{{Storage::url($customer->photo)}}" alt="User Wall">
                    </figure>
                    <h6 class="h3 profile-user-name">{{ $customer->name  }} {{ $customer->surname  }}</h6><small class="profile-user-address">@if($customer->customer_type==0) Bireysel @else Kurumsal @endif</small>
                    <hr class="profile-seperator">

                    <!-- /.profile-user-description -->
                    <div class="mb-5"><a href="{{ route('customer.edit',['id'=>$customer->id]) }}" class="btn btn-outline-color-scheme btn-rounded btn-lg px-5 border-thick text-uppercase mr-2 mr-0-rtl ml-2-rtl fw-700 fs-11 heading-font-family">Edit Profile</a>

                    </div>


                </div>
                <!-- /.d-flex -->

                <!-- /.row -->
            </div>
            <!-- /.widget-user-profile -->
        </div>
        <!-- /.widget-body -->
    </div>
    <!-- /.widget-bg -->
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-heading clearfix">
                    
                    @if($balance>0)
                    <button class="btn btn-success">{{$balance}}</button>
                    @else
                    <button class="btn btn-danger">{{$balance}}</button>
                    @endif
                </div>
                <!-- /.widget-heading -->
                <div class="widget-body clearfix">
                    <table class="table table-striped table-responsive" id="dataTable" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($extre as $e)
                            <tr>
                                <td>{{$e->type}}</td>
                                <td>{{$e->price}}</td>
                                <td>{{$e->created_at}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
    </div>
    <!-- /.row -->
</div>

@endsection
@section('includes')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@endsection