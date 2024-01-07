@section('title', 'Financial Create')
@section('module1')Financial Statement @endsection
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
                        <form action="{{ route('financial.store') }}" method="POST" enctype="multipart/form-data"
                            id="financialForm">
                            @csrf



                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="" class="col-form-label">Kalem Tipi</label>
                                    <div>
                                        <input type="radio" checked {{ old('type') == '0' ? 'checked' : '' }}
                                            name="type" value="0"> Gelir
                                    </div>
                                    <div>
                                        <input type="radio" {{ old('type') == '1' ? 'checked' : '' }} name="type"
                                            value="1"> Gider
                                    </div>
                                </div>
                            </div>





                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">Kalem Adı</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="l0">KDV</label>
                                    <input class="form-control" name="kdv" type="text" value="{{ old('kdv') }}">
                                </div>
                            </div>




                            <div class="form-actions">
                                <div class="form-group row">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <a class="btn btn-primary btn-rounded" style="color:#fff"
                                            id="saveFinancial">Kaydet</a>
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

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '#saveFinancial', function(e) {
    e.preventDefault();

    var err = '';

    // Formdaki input alanlarından değerleri almak
    var name = $('input[name="name"]').val();
    var type = $('input[name="type"]:checked').val();
    var kdv = $('input[name="kdv"]').val();

    // AJAX isteği gönderme
    $.ajax({
        type: 'POST',
        url: "{{ route('financial.store') }}",
        data: { name: name, type: type, kdv: kdv },
        success: function(data) {
            console.log(data);
            $('#error').hide();
            $('#success').show();
            $('#success').html(data.success);
            $('#saveFinancial').prop('disabled', true);

            setTimeout(function() {
                $('#saveFinancial').prop('disabled', false);
                $('#financialForm').trigger("reset");
            }, 2000);

        },
        error: function(error) {
            // İstek hata döndüğünde burası çalışır
            if (error.responseJSON) {
                // Sunucunun döndüğü JSON hatası
                console.error('Response data:', error.responseJSON);

                $('#error').show();
                $('#success').hide();

                $.each(error.responseJSON.errors, function(key, value) {
                    err += '<li>' + value + '</li>';
                });

                $('#error').html(err);



            } else {
                // Diğer hata durumları
                console.error('Error:', error.statusText);

                $('#error').show();
                $('#error').html('<li>' + error.statusText + '</li>');
            }
        }
    });
});



@endsection
