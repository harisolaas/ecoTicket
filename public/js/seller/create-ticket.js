;(function(window,document,undefined)
{
    window.addEventListener('load', function()
    {
        function hidrateRow(row, data)
        {
            var field = row.querySelectorAll('td')
            field.querySelector('[data-field=name]').innerText = data.name
            field.querySelector('[data-field=short_desc]').innerText = data.short_desc
            field.querySelector('[data-field=price]').innerText = data.price
        }
        var row = document.querySelector('[data-row=current]')
        var newRow = row.cloneNode(true)
        var currentRow = document.querySelector('[data-row=current]')
        var body = document.querySelector('[data-table=tbody]')
        var form = document.querySelector('[data-form=current]')
        // body.appendChild(newRow)

        form.addEventListener('submit', function (e)
        {
            e.preventDefault()
            fetch('/request/product', {
                method: 'POST',
                body: new FormData(form)
            }).then(response=>response.json()).then(data => {
                console.log(data);
                // hidrateRow(row, data);
            })
        })

    })
}(window,document));
