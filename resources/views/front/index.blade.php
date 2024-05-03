@section('title', 'Dashboard')
@section('module1')Panel @endsection
@section('module2') Dashboard @endsection
<!-- /.navbar -->
@extends('layouts.master')
<!-- SIDEBAR -->
@section('content')


<!-- /.site-sidebar -->

<!-- /.page-title -->
<!-- =================================== -->
<!-- Different data widgets ============ -->
<!-- =================================== -->

<div class="widget-list row">

    <!-- /.widget-holder -->

    <!-- /.widget-holder -->
    <div class="widget-holder widget-sm widget-border-radius col-md-3">
        <div class="widget-bg">
            <div class="widget-heading bg-purple"><span class="widget-title my-0 color-white fs-12 fw-600">Gelir Faturası/Adet</span>
            </div>
            <!-- /.widget-heading -->
            <div class="widget-body">
                <div class="counter-w-info">
                    <div class="counter-title color-color-scheme"><span class="counter">{{ $data['income'] }} </span><span>Adet</span></div>
                    <!-- /.counter-title -->

                    <!-- /.counter-info -->
                </div>
                <!-- /.counter-w-info -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>
    <div class="widget-holder widget-sm widget-border-radius col-md-3">
        <div class="widget-bg">
            <div class="widget-heading bg-purple"><span class="widget-title my-0 color-white fs-12 fw-600">Gider Faturası/Adet</span>
            </div>
            <!-- /.widget-heading -->
            <div class="widget-body">
                <div class="counter-w-info">
                    <div class="counter-title color-color-scheme"><span class="counter">{{ $data['expense'] }} </span><span>Adet</span></div>
                    <!-- /.counter-title -->

                    <!-- /.counter-info -->
                </div>
                <!-- /.counter-w-info -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>
    <div class="widget-holder widget-sm widget-border-radius col-md-3">
        <div class="widget-bg">
            <div class="widget-heading bg-purple"><span class="widget-title my-0 color-white fs-12 fw-600">Toplam Ödeme</span>
            </div>
            <!-- /.widget-heading -->
            <div class="widget-body">
                <div class="counter-w-info">
                    <div class="counter-title color-color-scheme"><span class="counter">{{ $data['expenseSum'] }} </span></div>
                    <!-- /.counter-title -->

                    <!-- /.counter-info -->
                </div>
                <!-- /.counter-w-info -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>

    <div class="widget-holder widget-sm widget-border-radius col-md-3">
        <div class="widget-bg">
            <div class="widget-heading bg-purple"><span class="widget-title my-0 color-white fs-12 fw-600">Toplam Tahsilat</span>
            </div>
            <!-- /.widget-heading -->
            <div class="widget-body">
                <div class="counter-w-info">
                    <div class="counter-title color-color-scheme"><span class="counter">{{ $data['incomeSum'] }} </span></div>
                    <!-- /.counter-title -->

                    <!-- /.counter-info -->
                </div>
                <!-- /.counter-w-info -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>
    <!-- /.widget-holder -->

    <!-- /.widget-holder -->
</div>
<div class="widget-list row mt-3">

    <div class="col-md-6 text-center ">
        <h5 class="widget-title ">Günlük Gelir Grafiği</h5>
    </div>
    
    <div class="col-md-6 text-center">
        <h5 class="widget-title">Günlük Gider Grafiği</h5>
    </div>
</div>
<div class="widget-list row mt-3">

    <div class="col-md-6">
        <div class="widget-body">
            <div class="mr-t-10 flex-1">
                <div class="h-100" style="max-height: 270px"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                    <canvas id="chartJsGelir" style="height: 269px; display: block; width: 755px;" width="1510" height="538"></canvas>
                </div>
            </div>
        </div>
    </div>

<div class="col-md-6">
    <div class="widget-body">
        <div class="mr-t-10 flex-1">
            <div class="h-100" style="max-height: 270px"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                <canvas id="chartJsGider" style="height: 269px; display: block; width: 755px;" width="1510" height="538"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.widget-list -->
<hr>
<div class="widget-list row">
    <div class="widget-holder widget-full-height col-md-12">
        <div class="widget-bg">
            <div class="widget-heading widget-heading-border">
                <h5 class="widget-title">Latest Transactions</h5>
                <div class="widget-actions">
                    <div class="predefinedRanges badge bg-success-contrast px-3 cursor-pointer heading-font-family" data-plugin-options='{

                    "locale": {

                      "format": "MMM YYYY"

                    }

                   }'><span></span> <i class="feather feather-chevron-down ml-1"></i>
                    </div>
                </div>
                <!-- /.widget-actions -->
            </div>
            <!-- /.widget-heading -->
            <div class="widget-body">
                <table class="widget-latest-transactions">
                    @foreach($log as $l)
                    <tr>
                        <td class="thumb-xs2">
                            {{$l->text}}
                        </td>
                        <td class="single-user-details">{{ $l->created_at > $l->updated_at ? $l->created_at : $l->updated_at }}
                        </td>
                        </td>
                        <!-- /.single-user-details -->

                        <td class="single-status"><i class="material-icons fs-18 color-danger">fiber_manual_record</i> <span class="text-muted d-none d-sm-inline">{{$l->operation}}</span>
                        </td>
                        <!-- /.single-status -->
                    </tr>
                    @endforeach


                    <!-- /.single-status -->

                    <!-- /.single -->
                </table>
                <!-- /.widget-latest-transactions -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>
    <!-- /.widget-holder -->

    <!-- /.widget-holder -->
</div>


<!-- /.widget-list -->
</main>
<!-- /.main-wrappper -->
<!-- RIGHT SIDEBAR -->
<aside class="right-sidebar scrollbar-enabled suppress-x">
    <div class="sidebar-chat" data-plugin="chat-sidebar">
        <div class="sidebar-chat-info">
            <h6 class="fs-16">Chat List</h6>
            <form class="mr-t-10">
                <div class="form-group">
                    <input type="search" class="form-control form-control-rounded fs-13 heading-font-family pd-r-30" placeholder="Search for friends ..."> <i class="feather feather-search post-absolute pos-right vertical-center mr-3 text-muted"></i>
                </div>
            </form>
        </div>
        <div class="chat-list">
            <div class="list-group row">
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Julein Renvoye">
                    <figure class="thumb-xs user--online mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user2.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Gene Newman</span> <span class="username">@gene_newman</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Eddie Lebanovkiy">
                    <figure class="thumb-xs user--online mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user3.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Billy Black</span> <span class="username">@billyblack</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Cameron Moll">
                    <figure class="thumb-xs user--online mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user5.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Herbert Diaz</span> <span class="username">@herbert</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Bill S Kenny">
                    <figure class="user--busy thumb-xs mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user4.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Sylvia Harvey</span> <span class="username">@sylvia</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Trent Walton">
                    <figure class="user--busy thumb-xs mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user6.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Marsha Hoffman</span> <span class="username">@m_hoffman</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Julien Renvoye">
                    <figure class="user--offline thumb-xs mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user7.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Mason Grant</span> <span class="username">@masongrant</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Eddie Lebaovskiy">
                    <figure class="user--offline thumb-xs mr-3 mr-0-rtl ml-3-rtl">
                        <img src="{{ asset('thema/') }}/assets/demo/users/user8.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Shelly Sullivan</span> <span class="username">@shelly</span></span>
                </a>
            </div>
            <!-- /.list-group -->
        </div>
        <!-- /.chat-list -->
    </div>
    <!-- /.sidebar-chat -->
</aside>
<!-- CHAT PANEL -->
<div class="chat-panel" hidden>
    <div class="card">
        <div class="card-header d-flex justify-content-between"><a href="javascript:void(0);"><i class="feather feather-message-square text-success"></i></a> <span class="user-name heading-font-family fw-400">John Doe</span>
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="widget-chat-activity flex-1">
                <div class="messages scrollbar-enabled suppress-x">
                    <div class="message media reply">
                        <figure class="thumb-xs2 user--online">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user3.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>Epic Cheeseburgers come in all kind of styles.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                    <div class="message media">
                        <figure class="thumb-xs2 user--online">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user1.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>Cheeseburgers make your knees weak.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                    <div class="message media reply">
                        <figure class="thumb-xs2 user--offline">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user5.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>Cheeseburgers will never let you down.</p>
                            <p>They'll also never run around or desert you.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                    <div class="message media">
                        <figure class="thumb-xs2 user--online">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user1.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>A great cheeseburger is a gastronomical event.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                    <div class="message media reply">
                        <figure class="thumb-xs2 user--busy">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user6.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                    <div class="message media">
                        <figure class="thumb-xs2 user--online">
                            <a href="#">
                                <img src="{{ asset('thema/') }}/assets/demo/users/user1.jpg" class="rounded-circle">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>If you are a vegan, we are sorry for you loss.</p>
                        </div>
                        <!-- /.message-body -->
                    </div>
                    <!-- /.message -->
                </div>
                <!-- /.messages -->
            </div>
            <!-- /.widget-chat-acitvity -->
        </div>
        <!-- /.card-body -->
        <form action="javascript:void(0)" class="card-footer" method="post">
            <div class="d-flex justify-content-end"><i class="feather feather-plus-circle list-icon my-1 mr-3"></i>
                <textarea class="border-0 flex-1" rows="1" style="resize: none" placeholder="Type your message here" type="text"></textarea>
                <button class="btn btn-sm btn-circle bg-transparent" type="submit"><i class="feather feather-arrow-right list-icon fs-26 text-success"></i>
                </button>
            </div>
        </form>
        
    </div>
    @php
    
    $data = $expenseData;
    $label=$expenseLabel;
    $data = $incomeData;
    $label=$incomeLabel;
    @endphp
    <!-- /.card -->
</div>
<!-- /.chat-panel -->
</div>
<!-- /.content-wrapper -->
<!-- FOOTER -->
@endsection('content')
@section('jquery')



(function($) {


var Custom = {
init: function() {

this.gelirChartJs();
this.giderChartJs();
chartJsGider
},

gelirChartJs: function() {
var ctx = document.getElementById("chartJsGelir");
if ( ctx === null ) return;
ctx = ctx.getContext('2d');

var gradient = ctx.createLinearGradient(0,20,20,270);
gradient.addColorStop(0,'rgba(130,83,235,0.6)');
gradient.addColorStop(1,'rgba(130,83,235,0)');

var data = {
labels: @json($incomeLabel),
datasets: [
{
label: 'Gelir',
lineTension: 0,
data: @json($incomeData),
backgroundColor: gradient,
hoverBackgroundColor: gradient,
borderColor: '#8253eb',
borderWidth: 2,
pointRadius: 4,
pointHoverRadius: 4,
pointBackgroundColor: 'rgba(255,255,255,1)'
}
]
};

var chart = new Chart(ctx, {
type: 'line',
data: data,
responsive: true,
options: {
maintainAspectRatio: false,
legend: {
display: false,
},
scales: {
xAxes: [{
gridLines: {
display: false,
drawBorder: false,
tickMarkLength: 20,
},
ticks: {
fontColor: "#bbb",
padding: 10,
fontFamily: 'Roboto',
},
}],
yAxes: [{
gridLines: {
color: '#eef1f2',
drawBorder: false,
zeroLineColor: '#eef1f2',
},
ticks: {
fontColor: "#bbb",
stepSize: 200,
padding: 20,
fontFamily: 'Roboto',
}
}]
},
},
});

$(document).on('SIDEBAR_CHANGED_WIDTH', function() {
chart.resize();
});

$(window).on('resize', function() {
chart.resize();
});
},
giderChartJs: function() {
var ctx = document.getElementById("chartJsGider");
if ( ctx === null ) return;
ctx = ctx.getContext('2d');

var gradient = ctx.createLinearGradient(0,20,20,270);
gradient.addColorStop(0,'rgba(130,83,235,0.6)');
gradient.addColorStop(1,'rgba(130,83,235,0)');

var data = {
labels: @json($expenseLabel),
datasets: [
{
label: 'Gelir',
lineTension: 0,
data: @json($expenseData),
backgroundColor: gradient,
hoverBackgroundColor: gradient,
borderColor: '#8253eb',
borderWidth: 2,
pointRadius: 4,
pointHoverRadius: 4,
pointBackgroundColor: 'rgba(255,255,255,1)'
}
]
};

var chart = new Chart(ctx, {
type: 'line',
data: data,
responsive: true,
options: {
maintainAspectRatio: false,
legend: {
display: false,
},
scales: {
xAxes: [{
gridLines: {
display: false,
drawBorder: false,
tickMarkLength: 20,
},
ticks: {
fontColor: "#bbb",
padding: 10,
fontFamily: 'Roboto',
},
}],
yAxes: [{
gridLines: {
color: '#eef1f2',
drawBorder: false,
zeroLineColor: '#eef1f2',
},
ticks: {
fontColor: "#bbb",
stepSize: 1000,
padding: 20,
fontFamily: 'Roboto',
}
}]
},
},
});

$(document).on('SIDEBAR_CHANGED_WIDTH', function() {
chart.resize();
});

$(window).on('resize', function() {
chart.resize();
});
},


};
$(document).ready( function() {
Custom.init();
});
})(jQuery);

@endsection