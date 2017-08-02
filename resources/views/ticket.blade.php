<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="row" style="font-size:3em;margin:10px;width:22cm;background-size:contain;">
    <div class="col-xs-12" style="box-shadow: 2px 1px 2px grey;border:1px solid grey;margin-left:10px;padding:25px;">
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
                    <h3 style="font-size:1.5em">TOTAL</h3>
                </div>
                <div class="col-xs-6" style="text-align:right;">
                    <h3 style="font-size:1.5em">$ {{ $transaction->total_amount }}</h3>
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
