;(function(window,document,undefined)
{
    window.addEventListener('load', function()
    {
        const fields = ['send', 'barcode', 'name', 'short_desc', 'price']

// ==================== Factories =================== //

        function input()
        {
            var input = document.createElement('input')
            input.type = 'text'
            input.name = 'barcode'

            return input
        }

        function sendButton()
        {
            var span = document.createElement('span')
            span.className = 'icon ion-android-send'

            var button = document.createElement('button')
            button.type = 'button'
            button.append(span)
            button.addEventListener('click', function ()
            {
                var req = new XMLHttpRequest
                req.onreadystatechange = function ()
                {
                    var row = document.querySelector('.active-row')
                    if (this.readyState === 4)
                    {
                        if (this.status === 200)
                        {
                            var data = JSON.parse(this.responseText)
                            hidrateRow(row, data)
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
            res.innerHTML = "<span class='icon ion-ios-close' style='color:red'></span>"
            res.setAttribute('data-target', rowId)

            res.addEventListener('click', function ()
            {
                modifyTotal(-price)
                document.getElementById(this.getAttribute('data-target')).remove()
            })
            return res
        }

// ===================== Controll functions =================== //

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

// ====================== Variables ========================== //

        var addProduct = document.querySelector('#add-prod')
        var tbody = document.querySelector('#tk-gen-tbody')
        var addable = true

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

    })
}(window,document));
