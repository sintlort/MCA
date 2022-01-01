<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
</head>

<body>
<div id="app">
    @include('layout.sidebar')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>API Page - Alphavantage</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">API Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="api-dynamic-address">API Dinamis</label>
                            <input class="form-control" id="api-dynamic-address" value="{{route('api-dynamic-alpha-sort')}}" disabled>
                        </div>
                        <p>API Dinamis ini dapat menggunakan satu atau lebih inputan string category untuk melakukan sorting</p>
                        <p>Inputan sorting berupa Array<br> category[] yaitu PER/EPS/ROA/ROE/PBV<br> type[] yaitu <=, >=, == <br>dan value[] berupa angka</p>
                        <p>Semua dikirimkan pada API address diatas dan akan diberikan data berikut, contoh : </p>
                        <div class="row field_wrapper">
                            <div class="col-md-10">
                                <div class="dynamic-wrap">
                                    <form role="form" id="dynamic-form" autocomplete="off">
                                        <div class="entry input-group">
                                            <select name="category[]" class="form-control input_name">
                                                <option value="per">PER</option>
                                                <option value="eps">EPS</option>
                                                <option value="roa">ROA</option>
                                                <option value="roe">ROE</option>
                                                <option value="pbv">PBV</option>
                                            </select>
                                            <select name="type[]" class="form-control type">
                                                <option value="<=">Smaller Than</option>
                                                <option value=">=">Bigger than</option>
                                                <option value="=">Equals To</option>
                                            </select>
                                            <input class="form-control value_data" name="value" type="number"
                                                   placeholder="Angka"/>
                                            <span class="input-group-btn"><button class="btn btn-success btn-add"
                                                                                  type="button"><span
                                                        class="bi bi-plus-circle"></span></button></span>
                                        </div>
                                </div>
                                <button class="btn btn-primary btn-submit"> Submit</button>
                                <a href="#" type="reset" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="hasil_dinamis" class="form-label"> Hasil</label>
                            <textarea class="form-control" id="hasil_dinamis" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="api-dynamic-address">API Dinamis dengan Tanggal</label>
                            <input class="form-control" id="api-dynamic-address" value="{{route('api-dynamic-alpha-sort-date')}}" disabled>
                        </div>
                        <p>API Dinamis ini dapat menggunakan satu atau lebih inputan string category untuk melakukan sorting</p>
                        <p>Inputan sorting berupa Array<br> category[] yaitu PER/EPS/ROA/ROE/PBV<br> type[] yaitu <=, >=, == <br>dan value[] berupa angka dan variabel tanggal yaitu date1 dan date2</p>
                        <p>Semua dikirimkan pada API address diatas dan akan diberikan data berikut, contoh : </p>
                        <div class="row field_wrapper">
                            <div class="col-md-10">
                                <div class="dynamic-wrap">
                                    <form role="form" id="dynamic-form-date" autocomplete="off">
                                        <div class="entry input-group">
                                            <select name="category[]" class="form-control input_name_date">
                                                <option value="per">PER</option>
                                                <option value="eps">EPS</option>
                                                <option value="roa">ROA</option>
                                                <option value="roe">ROE</option>
                                                <option value="pbv">PBV</option>
                                            </select>
                                            <select name="type[]" class="form-control type_date">
                                                <option value="<=">Smaller Than</option>
                                                <option value=">=">Bigger than</option>
                                                <option value="=">Equals To</option>
                                            </select>
                                            <input class="form-control value_data_date" name="value" type="number"
                                                   placeholder="Angka"/>
                                            <span class="input-group-btn"><button class="btn btn-success btn-add"
                                                                                  type="button"><span
                                                        class="bi bi-plus-circle"></span></button></span>
                                        </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group">
                                        <label class="form-label" for="date1">Date 1</label>
                                        <input type="date" name="date1" id="date1" class="form-control dynamic_date1_input">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="date2">Date 2</label>
                                        <input type="date" name="date2" id="date2" class="form-control dynamic_date2_input">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-submit"> Submit</button>
                                <a href="#" type="reset" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="hasil_dinamis" class="form-label"> Hasil</label>
                            <textarea class="form-control" id="hasil_dinamis_date" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="api-dynamic-address">API Statis</label>
                            <input class="form-control" id="api-dynamic-address" value="{{route('api-static-alpha-sort')}}" disabled>
                        </div>
                        <p>API Statis ini menggunakan satu inputan string category untuk melakukan sorting</p>
                        <p>Inputan sorting berupa value <br> category yaitu PER/EPS/ROA/ROE/PBV<br> type yaitu <=, >=, == <br>dan value berupa angka</p>
                        <p>Semua dikirimkan pada API address diatas dan akan diberikan data berikut, contoh : </p>
                        <div class="row field_wrapper">
                            <div class="col-md-10">
                                <div class="dynamic-wrap">
                                    <form role="form" id="static-form" autocomplete="off">
                                        <div class="entry input-group">
                                            <select name="category" class="form-control static_input_name" required>
                                                <option value="per">PER</option>
                                                <option value="eps">EPS</option>
                                                <option value="roa">ROA</option>
                                                <option value="roe">ROE</option>
                                                <option value="pbv">PBV</option>
                                            </select>
                                            <select name="type" class="form-control static_type" required>
                                                <option value="<=">Smaller Than</option>
                                                <option value=">=">Bigger than</option>
                                                <option value="=">Equals To</option>
                                            </select>
                                            <input class="form-control static_value_data" name="value" type="number"
                                                   placeholder="Angka" required/>
                                        </div>
                                </div>
                                <button class="btn btn-primary btn-submit"> Submit</button>
                                <a href="#" type="reset" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="hasil_statis" class="form-label"> Hasil</label>
                            <textarea class="form-control" id="hasil_statis" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="api-dynamic-address">API Statis dengan Tanggal</label>
                            <input class="form-control" id="api-dynamic-address" value="{{route('api-static-alpha-sort-date')}}" disabled>
                        </div>
                        <p>API Statis ini menggunakan satu inputan string category untuk melakukan sorting</p>
                        <p>Inputan sorting berupa value <br> category yaitu PER/EPS/ROA/ROE/PBV<br> type yaitu <=, >=, == <br>dan value berupa angka dan variabel tanggal yaitu date1 dan date2</p>
                        <p>Semua dikirimkan pada API address diatas dan akan diberikan data berikut, contoh : </p>
                        <div class="row field_wrapper">
                            <div class="col-md-10">
                                <div class="dynamic-wrap">
                                    <form role="form" id="static-form-date" autocomplete="off">
                                        <div class="entry input-group">
                                            <select name="category" class="form-control static_input_name_date" required>
                                                <option value="per">PER</option>
                                                <option value="eps">EPS</option>
                                                <option value="roa">ROA</option>
                                                <option value="roe">ROE</option>
                                                <option value="pbv">PBV</option>
                                            </select>
                                            <select name="type" class="form-control static_type_date" required>
                                                <option value="<=">Smaller Than</option>
                                                <option value=">=">Bigger than</option>
                                                <option value="=">Equals To</option>
                                            </select>
                                            <input class="form-control static_value_data_date" name="value" type="number"
                                                   placeholder="Angka" required/>
                                        </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group">
                                        <label class="form-label" for="date1">Date 1</label>
                                        <input type="date" name="date1" id="date1" class="form-control static_date1_input">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="date2">Date 2</label>
                                        <input type="date" name="date2" id="date2" class="form-control static_date2_input">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-submit"> Submit</button>
                                <a href="#" type="reset" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="hasil_statis_date" class="form-label"> Hasil</label>
                            <textarea class="form-control" id="hasil_statis_date" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>

<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker();
    });
</script>

<script>
    $('#basic-addon1').on('click', function (e) {
        if ($('#basic-addon1').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon1').html('<i class="bi bi-arrow-down-short"></i>');
            $('#pertype').val('<=');
        } else {
            $('#basic-addon1').html('<i class="bi bi-arrow-up-short"></i>');
            $('#pertype').val('>=');
        }
    });

    $('#basic-addon2').on('click', function (e) {
        if ($('#basic-addon2').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon2').html('<i class="bi bi-arrow-down-short"></i>');
            $('#epstype').val('<=');
        } else {
            $('#basic-addon2').html('<i class="bi bi-arrow-up-short"></i>');
            $('#epstype').val('>=');
        }
    });

    $('#basic-addon3').on('click', function (e) {
        if ($('#basic-addon3').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon3').html('<i class="bi bi-arrow-down-short"></i>');
            $('#roatype').val('<=');
        } else {
            $('#basic-addon3').html('<i class="bi bi-arrow-up-short"></i>');
            $('#roatype').val('>=');
        }
    });

    $('#basic-addon4').on('click', function (e) {
        if ($('#basic-addon4').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon4').html('<i class="bi bi-arrow-down-short"></i>');
            $('#roetype').val('<=');
        } else {
            $('#basic-addon4').html('<i class="bi bi-arrow-up-short"></i>');
            $('#roetype').val('>=');
        }
    });

    $('#basic-addon5').on('click', function (e) {
        if ($('#basic-addon5').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon5').html('<i class="bi bi-arrow-down-short"></i>');
            $('#dertype').val('<=');
        } else {
            $('#basic-addon5').html('<i class="bi bi-arrow-up-short"></i>');
            $('#dertype').val('>=');
        }
    });

    $('#basic-addon6').on('click', function (e) {
        if ($('#basic-addon6').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon6').html('<i class="bi bi-arrow-down-short"></i>');
            $('#dytype').val('<=');
        } else {
            $('#basic-addon6').html('<i class="bi bi-arrow-up-short"></i>');
            $('#dytype').val('>=');
        }
    });

    $('#basic-addon7').on('click', function (e) {
        if ($('#basic-addon7').html() == '<i class="bi bi-arrow-up-short"></i>') {
            $('#basic-addon7').html('<i class="bi bi-arrow-down-short"></i>');
            $('#pbvtype').val('<=');
        } else {
            $('#basic-addon7').html('<i class="bi bi-arrow-up-short"></i>');
            $('#pbvtype').val('>=');
        }
    });

</script>

<script type="text/javascript">
    $(function () {
        var i = 1;
        var max = 7;
        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();
            if (i < max) {
                var dynaForm = $('.dynamic-wrap form:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(dynaForm);

                newEntry.find('input').val('');
                dynaForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="bi bi-x-circle"></span>');
                i++;
            }
        }).on('click', '.btn-remove', function (e) {
            $(this).parents('.entry:first').remove();
            i--;
            e.preventDefault();
            return false;
        });
    });
</script>

<script>
    $('#dynamic-form').submit(function(e) {
        e.preventDefault();
        console.log('gile');
        var input_name = $(this).find('.input_name').map(function(i, el) {
            return el.value;
        }).get();
        var type = $(this).find('.type').map(function(i, el) {
            return el.value;
        }).get();
        var value = $(this).find('.value_data').map(function(i, el) {
            return el.value;
        }).get();
        $.ajax({
            type : 'POST',
            url : '{!! route('api-dynamic-alpha-sort') !!}',
            data : {
                'category[]' : input_name,
                'type[]' : type,
                'value[]' : value,
            },
            success: function (result) {
                $('#hasil_dinamis').val(JSON.stringify(result, null, 10));
            }
        });
    });

    $('#dynamic-form-date').submit(function (e) {
        e.preventDefault();
        var input_name = $(this).find('.input_name_date').map(function (i, el) {
            return el.value;
        }).get();
        var type = $(this).find('.type_date').map(function (i, el) {
            return el.value;
        }).get();
        var value = $(this).find('.value_data_date').map(function (i, el) {
            return el.value;
        }).get();
        var date1 = $('.dynamic_date1_input').val();
        var date2 = $('.dynamic_date2_input').val();
        $.ajax({
            type: 'POST',
            url: '{!! route('api-dynamic-alpha-sort-date') !!}',
            data: {
                'category[]': input_name,
                'type[]': type,
                'value[]': value,
                'date1' : date1,
                'date2' : date2,
            },
            success: function (result) {
                $('#hasil_dinamis_date').val(JSON.stringify(result, null, 10));
            }
        });
    });

    $('#static-form').submit(function(e) {
        e.preventDefault();
        console.log('giles');
        var input_name = $('.static_input_name').val();
        var type = $('.static_type').val();
        var value = $('.static_value_data').val();
        $.ajax({
            type : 'POST',
            url : '{!! route('api-static-alpha-sort') !!}',
            data : {
                'category' : input_name,
                'type' : type,
                'value' : value,
            },
            success: function (result) {
                $('#hasil_statis').val(JSON.stringify(result, null, 10));
            }
        });
    });

    $('#static-form-date').submit(function (e) {
        e.preventDefault();
        console.log('giles');
        var input_name = $('.static_input_name_date').val();
        var type = $('.static_type_date').val();
        var value = $('.static_value_data_date').val();
        var date1 = $('.static_date1_input').val();
        var date2 = $('.static_date2_input').val();

        $.ajax({
            type: 'POST',
            url: '{!! route('api-static-alpha-sort-date') !!}',
            data: {
                'category': input_name,
                'type': type,
                'value': value,
                'date1' : date1,
                'date2' : date2,
            },
            success: function (result) {
                $('#hasil_statis_date').val(JSON.stringify(result, null, 10));
            }
        });
    });
</script>

<script src="assets/js/main.js"></script>
</body>

</html>
