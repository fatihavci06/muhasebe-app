
function addRow() {
    var selectedValue = $("#invoice_type").val();
    if (selectedValue == '') {
        alert('Tip Seçiniz...');
        return false;
    }
    $.ajax({
        type: 'GET',
        url: invoiceRoutes.financialGetData,
        data: { type: selectedValue },
        success: function (response) {

            console.log(response.products);
            var option = '';
            $.each(response.data, function (index, item) {
                option = option + '<option  data-kdv="' + item.kdv + '"value="' + item.id + '">' + item.name + '</option>';


                // Option'u selectBox'a ekleyin

            });
            var productList = '';
            $.each(response.products, function (key, val) {
                productList = productList + '<option  value="' + val.id + '">' + val.name + '</option>';
                console.log(productList);

                // Option'u selectBox'a ekleyin

            });
            var newRowHtml = `
            <tr class="kalem">
                <td style="width:15%;"><select class="form-control" id="kalemSec" onchange="setKDV(this)" name="kalem[]">
                        <option value="">Seçiniz</option>`+ option + `
                    </select></td>
                <td style="width:15%;"><select class="form-control" id="urun"  name="urun[]">
                <option value="">Seçiniz</option>`+ productList + `
            </select></td>
             value="{{ old('quantity') }}" min="0"
                <td><input step="any" type="number" min="0"class="form-control" name="adet[]"  oninput="calculateTotalInvoice(this)"></td>
                <td><input type="text" class="form-control" name="tutar[]" oninput="calculateTotalInvoice(this)"></td>
                <td><input type="text" class="form-control" name="toplamTutar[]"></td>
                <td><input type="text" class="form-control" name="kdv[]" oninput="calculateTotalInvoice(this)"></td>
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

function removeRow(button) {
    // Kaldır butonuna basıldığında satırı sil
    $(button).closest('tr').remove();
    calculateToplamGenelTutar();
    calculateKdvToplamTutar();
    calculateAraToplam();
}
function setKDV(selectElement) {
    // Seçilen kalem öğesinin data-kdv değerini al
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var kdvValue = selectedOption.getAttribute('data-kdv');

    // KDV inputuna değeri yaz
    $(selectElement).closest('tr').find('input[name="kdv[]"]').val(kdvValue);
    calculateTotalInvoice(selectElement);
}

function calculateTotalInvoice(input) {

    var row = $(input).closest('tr');
    var adet = parseFloat(row.find('input[name="adet[]"]').val()) || 0;
    var tutar = parseFloat(row.find('input[name="tutar[]"]').val()) || 0;
    var toplamTutar = adet * tutar;


    row.find('input[name="toplamTutar[]"]').val(toplamTutar.toFixed(2));
    var kdv = parseFloat(row.find('input[name="kdv[]"]').val()) || 0;
    console.log(kdv);

    var kdvToplam = toplamTutar * (kdv / 100);
    var genelToplam = toplamTutar + kdvToplam;
    row.find('input[name="kdvToplam[]"]').val(kdvToplam.toFixed(2));
    row.find('input[name="genelToplam[]"]').val(genelToplam.toFixed(2));
    calculateToplamGenelTutar();
    calculateKdvToplamTutar();
    calculateAraToplam();
}
function calculateToplamGenelTutar() {
    // Toplam Genel Tutarı hesapla
    var toplamGenelTutar = 0;


    $('#dynamic-form-body tr').each(function () {
        var genelToplam = parseFloat($(this).find('input[name="genelToplam[]"]').val()) || 0;
        toplamGenelTutar += genelToplam;
    });


    console.log(toplamGenelTutar.toFixed(2));
    $('#toplamGenelTutar').text(toplamGenelTutar.toFixed(2));
}
function calculateKdvToplamTutar() {

    var kdv = 0;
    var toplam = 0;


    $('#dynamic-form-body tr').each(function () {
        var kdv = parseFloat($(this).find('input[name="kdvToplam[]"]').val()) || 0;

        toplam = toplam + kdv;

    });

    $('#toplamKdv').text(toplam.toFixed(2));
}
function calculateAraToplam() {
    // Toplam Genel Tutarı hesapla


    // Her satırdaki Toplam Tutarı değerini alarak topla
    var tutar = 0;
    var toplam = 0;

    // Her satırdaki KDV Toplam değerini alarak topla
    $('#dynamic-form-body tr').each(function () {
        var tutar = parseFloat($(this).find('input[name="toplamTutar[]"]').val()) || 0;

        toplam = toplam + tutar;

    });

    $('#araToplam').text(toplam.toFixed(2));
}

$("#saveInvoice").on("click", function () {
    var formData = $('#formInvoice').serializeArray();
    console.log(22222);



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $.ajax({
        type: 'POST',
        url: invoiceRoutes.storeInvoice,
        data: formData,
        success: function (response) {

            console.log(response);
            $('#success').show();
            $('#error').hide();
            $('#success').html(response.data);
            setTimeout(function () {
                $('#formInvoice').trigger("reset");
                $(".kalem").remove();
            }, 2000);

        },
        error: function (error) {


            var err = '';
            if (error.responseJSON) {

                console.error('Response data:', error.responseJSON);

                $('#error').show();
                $('#success').hide();

                $.each(error.responseJSON.errors, function (key, value) {
                    err += '<li>' + value + '</li>';
                });

                $('#error').html(err);



            } else {

                console.error('Error:', error.statusText);

                $('#error').show();
                $('#error').html('<li>' + error.statusText + '</li>');
            }
        }
    });
});
$("#updateInvoice").on("click", function () {
    var formData = $('#formInvoice').serializeArray();
    console.log(22222);



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $.ajax({
        type: 'PUT',
        url: invoiceRoutes.updateInvoice,
        data: formData,
        success: function (response) {
            $("#updateInvoice").fadeOut();
            console.log(response);
            $('#success').show();
            $('#error').hide();
            $('#success').html(response.data);
            setTimeout(function () {
                $("#success").fadeOut();
                $("#updateInvoice").fadeOut("slow", function () {
                    $(this).fadeIn();
                });
            }, 4000);

        },
        error: function (error) {


            var err = '';
            if (error.responseJSON) {

                console.error('Response data:', error.responseJSON);

                $('#error').show();
                $('#success').hide();

                $.each(error.responseJSON.errors, function (key, value) {
                    err += '<li>' + value + '</li>';
                });

                $('#error').html(err);



            } else {

                console.error('Error:', error.statusText);

                $('#error').show();
                $('#error').html('<li>' + error.statusText + '</li>');
            }
        }
    });
});


$("#invoice_type").change(function () {
    // seçilen değeri al
    $(".kalem").empty();

});

$("#payment_type").change(function () {
    var payment_type = $('#payment_type').val();

    $.ajax({
        type: 'GET',
        url: invoiceRoutes.listWithPaymentType,
        data: { payment_type: payment_type },
        success: function (response) {
            console.log(response);
            $('#invoices').empty();
            $('#invoices').append($('<option>', {
                value: "",
                text: "Seçiniz"
            }));
            $.each(response.invoices, function (index, item) {
                $('#invoices').append($('<option>', {
                    value: item.id,
                    text: item.invoice_no
                }));
            });

        },
        error: function (error) {
            console.log(response);
        }
    });

});

// Yeni ürün ekle butonuna tıklandığında
$("#addProductBtn").click(function () {
    // Yeni satırı oluştur
    var newRow = '<tr class="dynamic-row">' +
        '<td><input type="text" name="name[]" class="form-control product-name" /></td>' +
        '<td><input type="number" name="quantity[]" class="form-control product-quantity" /></td>' +
        '<td><input type="number" name="price[]" class="form-control product-price" /></td>' +
        '<td>0</td>' +
        '<td><button type="button" class="btn btn-danger delete-row">Sil</button></td>' +
        '</tr>';
    // Yeni satırı tabloya ekle
    $("#productTableBody").append(newRow);
});

$(document).on('click', '#deleteAllProduct', function () {

    $(".dynamic-row").remove();
    calculateTotal();
});
// Satır sil butonuna tıklandığında
$(document).on('click', '.delete-row', function () {



    // Tıklanan satırı sil
    $(this).closest('tr').remove();
    // Toplamı hesapla
    calculateTotal();
});

// Ürün fiyatı veya adet değiştiğinde
$(document).on('input', '.product-quantity, .product-price', function () {
    var row = $(this).closest('tr');
    var quantity = parseFloat(row.find('.product-quantity').val());
    var price = parseFloat(row.find('.product-price').val());
    var total = quantity * price || 0;
    row.find('td:nth-child(4)').text(total.toFixed(2));
    // Toplamı hesapla
    calculateTotal();
});

// Toplamı hesapla
function calculateTotal() {

    var totalValue = 0;
    var totalQuantity = 0;
    $("#productTableBody tr").each(function () {
        var rowTotal = parseFloat($(this).find('td:nth-child(4)').text());
        totalValue += isNaN(rowTotal) ? 0 : rowTotal;

        var rowQuantity = parseFloat($(this).find('.product-quantity').val());
        totalQuantity += isNaN(rowQuantity) ? 0 : rowQuantity;
    });
    $("#totalValue").text(totalValue.toFixed(2));
    $("#totalQuantity").text(totalQuantity);
}

$("#offerSave").on("click", function () {
    var formData = $('#formOfferSave').serializeArray();
    console.log(formData);
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $.ajax({
        type: 'POST',
        url: offerRoutes.storeOffer,
        data: formData,
        success: function (response) {
            $("#offerSave").fadeOut();
            console.log(response);
            $('#success').show();
            $('#error').hide();
            $('#success').html(response.data);
            setTimeout(function () {
                $("#success").fadeOut();

            }, 4000);

        },
        error: function (error) {


            var err = '';
            if (error.responseJSON) {

                console.error('Response data:', error.responseJSON);

                $('#error').show();
                $('#success').hide();

                $.each(error.responseJSON.errors, function (key, value) {
                    err += '<li>' + value + '</li>';
                });

                $('#error').html(err);



            } else {

                console.error('Error:', error.statusText);

                $('#error').show();
                $('#error').html('<li>' + error.statusText + '</li>');
            }
        }
    });
});
$("#offerUpdate").on("click", function () {
    var formData = $('#formOfferUpdate').serializeArray();
    console.log(formData);
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $.ajax({
        type: 'PUT',
        url: offerRoutes.updateOffer,
        data: formData,
        success: function (response) {
            console.log(response);
            $('#success').show();
            $('#error').hide();
            $('#success').html(response.data);
            setTimeout(function () {
                $("#success").fadeOut();

            }, 4000);

        },
        error: function (error) {


            var err = '';
            if (error.responseJSON) {

                console.error('Response data:', error.responseJSON);

                $('#error').show();
                $('#success').hide();

                $.each(error.responseJSON.errors, function (key, value) {
                    err += '<li>' + value + '</li>';
                });

                $('#error').html(err);



            } else {

                console.error('Error:', error.statusText);

                $('#error').show();
                $('#error').html('<li>' + error.statusText + '</li>');
            }
        }
    });
});
