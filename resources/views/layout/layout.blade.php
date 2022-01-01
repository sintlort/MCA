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
    @include('sidebar')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @yield('contents')
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">A. Saugi</a></p>
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
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

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

<script src="assets/js/main.js"></script>
</body>

</html>
