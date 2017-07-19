;(function (window,document,undefined)
{
    window.addEventListener('load', function()
    {
        function getChartData()
        {
            // fetch('http://localhost:8000/seller/test-datos').then(response => response.json()).then(data => {
            //     lava.loadData('Ventas', data, chart => console.log(chart))
            // }).then(setTimeout(getChartData(), 15000))
            var req = new XMLHttpRequest
            req.onreadystatechange = function()
            {
                if (this.readyState === 4 && this.status === 200) {
                    var data = JSON.parse(this.responseText)
                    lava.loadData('Ventas', data, chart => console.log(chart))
                    setTimeout(getChartData(), 30000)
                }
            }
            req.open('GET', '/seller/test-datos')
            req.send()
        }
        getChartData()

    })
}(window,document));
