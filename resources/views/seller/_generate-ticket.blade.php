{{-- @section('panels') --}}
    <div id="create-ticket">
        <table>
            <thead>
                <tr>
                    <th>Código de barras</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody data-table='tbody'>
                <tr data-row="current">
                    <td>
                        <form data-form='current' action="" method="post">
                            <input type="text" name="barcode" value="">
                        </form>
                    </td>
                    <td data-field='name'></td>
                    <td data-field='short_desc'></td>
                    <td data-field='price'>$ </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="{{ asset('js/seller/create-ticket.js') }}"></script>
{{-- @endsection --}}
