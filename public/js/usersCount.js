;(function(window,document,undefined)
{
    setInterval(function()
    {
        var req = new XMLHttpRequest;
        var res = ''
        req.onreadystatechange = function()
        {
            if (this.readyState === 4 && this.status === 200 ) {
                res = this.responseText
            }
        }
        req.open('GET', '/usersCount')
        req.send()
    })
}(window,document));
