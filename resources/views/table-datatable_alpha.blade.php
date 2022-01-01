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
                        <h3>Alphavantage</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alphavantage</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row field_wrapper">
                            <div class="col-md-10">
                                    <div class="dynamic-wrap">
                                        <form role="form" autocomplete="off" action="{{route('alpha_sort')}}" method="POST">
                                            @csrf
                                        <div class="entry input-group">
                                            <select name="input_name[]" class="form-control">
                                                <option value="per">PER</option>
                                                <option value="eps">EPS</option>
                                                <option value="roa">ROA</option>
                                                <option value="roe">ROE</option>
                                                <option value="pbv">PBV</option>
                                            </select>
                                            <select name="type[]" class="form-control">
                                                <option value="<="><=</option>
                                                <option value=">=">>=</option>
                                                <option value="==">==</option>
                                            </select>
                                            <input class="form-control" name="value[]" type="text"
                                                   placeholder="Type something"/>
                                            <span class="input-group-btn"><button class="btn btn-success btn-add"
                                                                                  type="button"><span
                                                        class="bi bi-plus-circle"></span></button></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"> Submit</button>
                                    <a href="{{route('alpha_index')}}" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                        </div>
                        {{--<form action="#">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">PER (Price Earning Ratio)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="per" value="">
                                            <input type="hidden" name="pertype" id="pertype" value=">=">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">EPS (Earning Per Share)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="eps">
                                            <input type="hidden" name="epstype" id="epstype" value=">=">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">ROA (Return on Assets)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon3"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="roa">
                                            <input type="hidden" name="roatype" id="roatype" value=">=">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">ROE (Return on Equity)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon4"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="roe">
                                            <input type="hidden" name="roetype" id="roetype" value=">=">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">DER (Debt to Equity Ratio)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon5"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="der">
                                            <input type="hidden" name="dertype" id="dertype" value=">=">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">DY (Dividend Yield)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon6"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="dy">
                                            <input type="hidden" name="dytype" id="dytype" value=">=">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">PBV (Price Book Value)</label>
                                        <small class="text-muted">eg.<i>0, 0.2, 5.1</i></small>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon7"><i
                                                    class="bi bi-arrow-up-short"></i></span>
                                            <input type="text" class="form-control" name="pbv">
                                            <input type="hidden" name="pbvtype" id="pbvtype" value=">=">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">Date</label>
                                        <input type="text" class="form-control" name="daterange"/>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <button type="reset" class="btn btn-lg btn-secondary mx-2">Reset</button>
                                    <button class="btn btn-lg btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>--}}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>PER</th>
                                <th>EPS</th>
                                <th>ROA</th>
                                <th>ROE</th>
                                <th>PBV</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->relation_symbol->symbol}}</td>
                                    <td>{{$d->per}}</td>
                                    <td>{{$d->eps}}</td>
                                    <td>{{$d->roa}}</td>
                                    <td>{{$d->roe}}</td>
                                    <td>{{$d->pbv}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
