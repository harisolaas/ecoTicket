;(function(window,document,undefined)
{
    window.addEventListener('load', function()
    {
        const fields = ['send', 'barcode', 'name', 'short_desc', 'price']

// ====================== Factories ====================== //

        function input()
        {
            var input = document.createElement('input')
            input.type = 'text'
            input.name = 'barcode'
            input.className = 'form-control'
            input.style = 'width:inherit'

            return input
        }

        function hiddenInput(value)
        {
            var input = document.createElement('input')
            input.type = 'hidden'
            input.name = 'products[]'
            input.value = value

            return input
        }

        function sendButton()
        {
            var span = document.createElement('span')
            span.className = 'icon ion-android-send'

            var button = document.createElement('button')
            button.type = 'button'
            button.className = 'btn'
            button.append(span)
            button.addEventListener('click', function ()
            {
                var req = new XMLHttpRequest
                req.onreadystatechange = function ()
                {
                    var row = document.querySelector('.active-row')
                    if (this.readyState === 4)
                    {
                        if (this.status === 200 && this.responseText !== 'null')
                        {
                            var data = JSON.parse(this.responseText)
                            hidrateRow(row, data)
                        } else
                        {
                            setErr(row)
                        }
                    }
                }
                req.open('GET', '/request/product?barcode='+document.querySelector('.active-row input').value)
                req.send()
            })

            return button
        }

        function newRow()
        {
            var tr = document.createElement('tr')
            tr.className += ' active-row'
            var td = {}
            fields.forEach(function (data)
            {
                td = document.createElement('td')
                td.setAttribute('data-field', data)
                tr.append(td)
            })
            var barcode = tr.querySelector('[data-field=barcode]')
            barcode.append(input())

            var send = tr.querySelector('[data-field=send]')
            send.append(sendButton())

            return tr
        }

        function deleteButton(rowId, price)
        {
            var res = document.createElement('button')
            res.type = 'button'
            res.className = 'btn'
            res.innerHTML = "<span class='icon ion-ios-close' style='color:red'></span>"
            res.setAttribute('data-target', rowId)

            res.addEventListener('click', function ()
            {
                modifyTotal(-price)
                document.getElementById(this.getAttribute('data-target')).remove()
            })
            return res
        }

// ====================== Controll functions ====================== //

        function hidrateRow(row, data)
        {
            var id = Date.now()
            row.id = id
            row.querySelector('[data-field=send] button').remove()
            row.querySelector('[data-field=send]').append(deleteButton(id, data.price))
            row.querySelector('[data-field=name]').innerText = data.name
            row.querySelector('[data-field=short_desc]').innerText = data.short_desc
            row.querySelector('[data-field=price]').innerText = data.price
            row.querySelector('[data-field=barcode] input').disabled = true
            row.querySelector('[data-field=barcode] p') ? row.querySelector('[data-field=barcode] p').remove() : undefined
            row.append(hiddenInput(data.id))

            row.classList.toggle('active-row')

            addable = true

            modifyTotal(data.price)

            tbody.append(newRow())
            addable = false

            document.querySelector('.active-row input').focus()
        }

        function modifyTotal(number)
        {
            var total = document.querySelector('#total')
            var modifier = Number(number)
            var res = Number(total.innerText)
            res += modifier
            if (res == 0) {
                res = '0.00'
            }else {
                res.toFixed(2)
            }
            total.innerText = res
        }
        function setErr(row)
        {
            if (!row.querySelector('[data-field=barcode] p')) {
                var err = document.createElement('p')
                err.style = 'font-size:0.8em;color:#f00;'
                err.innerText = 'El código ingresado no figura en base de datos.'
                row.querySelector('[data-field=barcode]').append(err)
            }
            row.querySelector('[data-field=barcode] input').focus()
        }
        function sendForm(form, callback)
        {
            processing = true
            var data = new FormData(form)
            data.append('total_amount', Number(document.querySelector('#total').innerText))
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
                        form.submit.innerHTML = 'Enviar'
                        processing = false
                    }
                }
            }
            req.open('POST', '/seller/send-ticket')
            req.setRequestHeader('X-CSRF-TOKEN', form._token.value)
            req.send(data)
        }

// ====================== Global Variables ====================== //

        var addProduct = document.querySelector('#add-prod')
        var tbody = document.querySelector('#tk-gen-tbody')
        var addable = true
        var form = document.getElementById('create-ticket-form')
        var processing = false

// ====================== Listeners ====================== //

        addProduct.addEventListener('click', function (e)
        {
            e.preventDefault()
            if (addable) {
                tbody.append(newRow())
                addable = false
            }else {
                document.querySelector('.active-row input').focus()
            }
        })

        form.addEventListener('submit', function (e)
        {
            e.preventDefault()
            if (!processing)
            {
                this.submit.innerHTML = "<span id='spinner' class='fa fa-spinner fa-spin'></spinner>"
                sendForm(this, function ()
                {
                    console.log('algo');
                })
            }
        })

    })
}(window,document));
