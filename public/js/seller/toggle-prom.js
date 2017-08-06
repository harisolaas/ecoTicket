;(function (window,document,undefined)
{
    window.addEventListener('load', function ()
    {
        var forms = document.querySelectorAll('[data-form=promotion-toggle]')
        var processing = false
        var success = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" style="text-align:center;"><p>La nueva operación fue realizada con éxito!</p><a class="btn btn-primary" href="" name="ok">Ok</a></div></div></div>'

        function sendForm(form, callback)
        {
            processing = true
            var data = new FormData(form)
            var req = new XMLHttpRequest()
            req.onreadystatechange = function ()
            {
                if (this.readyState === 4)
                {
                    if (this.status === 200)
                    {
                        callback()
                    }else if (window.confirm('Hubo un error mientras procesábamos la operación ¿Desea volver a intentarlo?'))
                    {
                        sendForm(form)
                    }else
                    {
                        processing = false
                    }
                }
            }
            req.open('POST', '/seller/promotion/toggle')
            req.setRequestHeader('X-CSRF-TOKEN', form._token.value)
            req.send(data)
        }

        forms.forEach(function (form)
        {
            form.addEventListener('submit', function (e)
            {
                e.preventDefault()
                sendForm(this, function ()
                {
                    var modal = document.getElementById('modal')
                    modal.innerHTML = success
                })
            })
        })
    })
}(window,document));
