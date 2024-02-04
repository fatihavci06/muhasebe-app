
function addRow() {
    var selectedValue = $("#invoice_type").val();
    if(selectedValue==''){
        alert('Tip Seçiniz...');
        return false;
    }
    $.ajax({
        type: 'GET',
        url: invoiceRoutes.financialGetData,
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
    calculateTotal(selectElement);
}

function calculateTotal(input) {

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
                $("#updateInvoice").fadeOut("slow", function(){
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
