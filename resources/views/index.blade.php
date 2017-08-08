@extends('master')

@section('title')
    Home
@endsection

@section('main')
    <main class="container-fluid">
        <div class="home-img">
            <div class="jumbotron">
                <div class="container">
                    <h1>Soluciones digitales a problemas cotidianos</h1>
                    <p><strong>El ticket digital ya llegó</strong> y es tan simple como pedir tu versión digital en locales adheridos.</p>
                    <br>
                    <p><a class="btn btn-primary btn-lg" target="_blank" href="{{ url('register') }}" role="button">Crear mi cuenta de ecoTicket</a> <a class="btn btn-primary btn-lg" target="_blank" href="{{ url('seller/register')}}" role="button">Registrar a mi empresa</a></p>
                </div>
            </div>
        </div>

        <div class="container">
                <div class="row value-proposal">
                    <div class="col-md-4">
                        <div class="md-circle">
                            <span class="home icon ion-leaf"></span>
                        </div>
                        <h2>Ayudá a preservar el planeta</h2>

                      <div><p>Miles de toneladas de papel se desperdician todos los días en recibos que pronto terminan en la basura. </p><strong>Cada vez que usas ecoTicket ayudás a reducir el consumo de papel</strong></div>

                    </div>
                    <div class="col-md-4">
                        <div class="md-circle">
                            <span class="home icon ion-ios-paper"></span>
                        </div>
                        <h2>Llevá tus cuentas al día</h2>

                        <div><strong>Accedé al registro de todas tus compras desde la plataforma de ecoTicket</strong><p> y organizate como más te guste</p></div>

                    </div>
                    <div class="col-md-4">
                        <div class="md-circle">
                            <span class="home fa fa-shopping-bag" style="font-size:4em;    padding-top:12px;"></span>
                        </div>
                      <h2>Asegurá tus compras</h2>

                      <div><strong>La fidelidad de ecoTicket permite que revises cualquier transacción</strong><p> que hayas realizado en caso de que necesites fundamentar un reclamo</p></div>
                    </div>

                </div>
        </div>

        <div class="create-account-img">
             <div class="create-account">
                 <div class="create-account-content">
                     <article>
                         <h2>Creá tu cuenta de ecoTicket</h2>
                         <ul>
                             <li>Agrupá todos tus comprobantes y promos en un sólo lugar.</li>
                             <li>Accedé a ofertas especiales en el momento que las necesitas.</li>
                             <li>Sos comerciante? Lleva registro de todas tus transacciones por local y cliente.</li>
                         </ul>
                         <p style="margin-bottom: 20px">Creá tu cuenta por única vez y comenzá a disfrutar de los beneficios e ecoTicket.</p>
                         <a class="btn btn-primary" href="/register">Sumate a nuestra comunidad!</a>
                     </article>
                 </div>
             </div>
         </div>

         <div class="faqs-container">
              <p class="faqs-p">¿Tenés alguna duda?</p>
              <a class="faqs-a" href="/faqs">Preguntas frecuentes</a>
          </div>
    </main>
@endsection
