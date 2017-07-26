@php
    $modal = [
        'title' => 'Destinatario',
        'body' => 'E-mail del cliente:',
        'inputs' => [
            'name' => 'email'
        ]
    ];
@endphp
<div id="create-ticket" class="tab-pane fade">
    <form action="#" method="post">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Enviar/<br>Eliminar</th>
                    <th>Código de barras</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody id='tk-gen-tbody'>
            </tbody>
            <tfoot>
                <tr class="alert alert-info">
                    <td colspan="5">
                        <a id='add-prod' href=""><span class="icon ion-plus-circled"></span>  Agregar producto...</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td style="text-align:right">$ </td>
                    <td id='total'>0.00</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center">
                        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Enviar Ticket</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        @include('_modal', compact($modal))
    </form>
</div>
