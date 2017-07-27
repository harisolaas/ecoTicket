<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="row" style="margin:10px;width:8cm; background-image:url({{ asset('img/secureticket_logo.jpg') }});background-size:contain;">
    <div class="col-xs-12" style="box-shadow: 2px 1px 2px grey;border:0.5px solid grey;margin-left:10px">
            {{ $transaction->created_at->format('d-m-Y H:i:s') }}<br>
            {{ $transaction->seller->name }}<br>
            Test S.A.<br>
            Malachor 4335-Capital Federal<br>
            IVA RESPONSABLE INSCRIPTO<br>
            A CONSUMIDOR FINAL<br>
            <hr>

            @foreach ($transaction->products as $product)
                <div class="row">
                    <div class="col-xs-6">
                        {{ $product->name }}
                    </div>
                    <div class="col-xs-6" style="text-align:right;">
                        $ {{ $product->price }}
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-xs-6">
                    <h3>TOTAL</h3>
                </div>
                <div class="col-xs-6" style="text-align:right;">
                    <h3>$ {{ $transaction->total_amount }}</h3>
                </div>
                <hr>
                <div class="col-xs-6">
                    CF:
                </div>
                <div class="col-xs-6" style="text-align:right;">
                    21.00
                </div>
                <div class="col-xs-6">
                    DGI:
                </div>
                <div class="col-xs-6" style="text-align:right;">
                    Registro xxx-xxx.
                </div>
            </div>
    </div>
</div>
