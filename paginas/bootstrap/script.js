;(function(window,document,undefined)
{
    window.onload = function ()
    {
        function setProductRow(product)
            {
                prodNameField.innerText = product.name
                priceField.innerText = product.price
            }

        var prodNumbField = document.getElementById('prodNumbField')
        var prodNameField = document.getElementById('prodNameField')
        var priceField = document.getElementById('priceField')

        prodNumbField.onchange = function ()
            {
                var prodN = this.getAttribute('innerText')

                var req = new XMLHttpRequest()
                req.onReadyStateChange = function ()
                    {
                        if (this.onreadystate == 4 && this.status == 200) {
                            var res = JSON.parse(this.responseText)
                            setProductRow(res)
                        }else {
                            alert('Código inválido')
                        }
                    }
                req.open('GET','url.com?prod_id='+prodN)
                req.send()
            }
    }
}
(window,document));
