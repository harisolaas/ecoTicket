;(
function(window,document,undefined)
{
    window.onload = function()
    {
        var modal = document.querySelector('#reqResponse')
        var form = document.forms[0]
        var data = new FormData(form)
        var req = new XMLHttpRequest()
        var token = form.token.value

        form.onsubmit = function(e)
        {
            e.preventDefault()
            req.open('POST', '/products')
            req.setRequestHeader('X-CSRF-TOKEN', token)
            req.setRequestHeader('Content-Type', 'multipart/form-data')            
            req.send(data)
            var modalTitle = document.querySelector('.modal-title')
            var modalBody = document.querySelector('.modal-body')
            var mButton1 = document.querySelector('#modalButton1')
            var mButton2 = document.querySelector('#modalButton2')
            req.onreadystatechange = function()
            {
                console.log(this.status);
                console.log(this.readyState);
                console.log(this.responseText);
                var div = document.createElement('div')
                div.innerHTML = this.responseText
                document.body.append(div)
                // if (this.readyState == 4 && this.status == 200) {
                // // modalTitle.innerText = 'Producto cargado con éxito'
                // // modalBody.innerHTML = "<table><tbody><td>Código de barras</td><td>"+form.barcode.value+"</td></tr><tr><td>Nombre</td><td>"+form.name.value+"</td></tr><tr><td>Precio</td><td>"+form.price.value+"</td></tr><tr><td>Marca</td><td>!!</td></tr></tbody></table>"
                // // mButton1.innerText = 'Cargar otro producto'
                // // mButton1.innerText = 'Volver al inicio'
                // // modal.show()
                // }else {
                //     modalTitle.innerText = 'Producto cargado con éxito'
                //     modalBody.innerHTML = "Ooops... Hubo un error mientras intentabamos cargar el producto en la base de datos."
                //     mButton1.innerText = 'Reintentar'
                //     mButton1.setAttribute('data-dismiss', 'modal')
                //     mButton1.innerText = 'Cerrar'
                //     modal.show()
                // }
            }
        }
    }
}
(window,document));
