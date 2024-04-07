@section('title', 'Customer Extre')
@section('module1')Customer @endsection
@section('module2')Extre @endsection
<!-- /.navbar -->
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

@endsection
