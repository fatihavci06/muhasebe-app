@section('title', 'Customer List')
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
@section('module1')Customer @endsection
@section('module2')List @endsection
<!-- /.navbar -->
@extends('layouts.master')
<!-- SIDEBAR -->
@section('content')
    <div class="widget-list" style="background-color:#fff">
        <div class="row">

            <div class="col-md-12 ">
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
                <div class="container  m-4 mb-4">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Company</th>
                                <th>Income</th>
                                <th>Expense</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('includes')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
@section('jquery')
let myDataTable; // DataTable değişkenini burada tanımlayın

$(function() {
    myDataTable = $('#dataTable').DataTable({
        lengthMenu: [[5, 25, 50, -1], [5, 25, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "http://127.0.0.1:8000/customer",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'surname', name: 'surname' },
            { data: 'company_name', name: 'company_name' },
            { data: 'income', name: 'income' },
            { data: 'expense', name: 'expense' },
            { data: 'balance', name: 'balance' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});

function silmedenSor(gidilecekLink) {
    swal({
        title: "Silmek istediğine emin misin?",
        text: "Silinen kayıt geri alınamaz.",
        icon: "warning",
        buttons: {
            cancel: "İptal",
            confirm: "Evet",
        },
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: gidilecekLink, // Silme işlemi yapılacak route'u belirtin
                method: 'GET',
                success: function(result) {
                    console.log(result);
                    // Silme işlemi başarılıysa, DataTable'ı yeniden çiz
                    myDataTable.ajax.reload();
                    swal("Silme işlemi başarılı!", {
                        icon: "success",
                        button: "Tamam",
                    });
                },
                error: function(err) {
                    console.error(err);
                    swal("Silme işlemi sırasında bir hata oluştu.", {
                        icon: "error",
                        button: "Tamam",
                    });
                }
            });
        } else {
            swal({ title: "Silme işleminden vazgeçtiniz", icon: "warning", button: "Tamam" });
        }
    });
}


@endsection
