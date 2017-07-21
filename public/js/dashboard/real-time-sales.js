;(function (window,document,undefined)
{
    window.addEventListener('load', function()
    {
        (function poll()
        {
            setTimeout(function(){
                fetch('http://localhost:8000/seller/test-datos').then(response => response.json()).then(data => {
                    lava.loadData('Ventas', data, chart => console.log(chart))
                })
            }, 1000)
        })()

    })
}(window,document));
