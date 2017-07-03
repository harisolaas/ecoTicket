;(function(window,document,undefined)
{
    window.onload = function()
    {
        document.forms[0].onsubmit = function(e)
        {
            e.preventDefault()
            var data = new FormData(this)
            var token = this.token.value
            var req = new XMLHttpRequest()
            req.open('POST', '/brands')
            req.setRequestHeader('X-CSRF-TOKEN', token)
            req.send(data)
            req.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) {
                    console.log('bien');
                }else {
                    console.log(this.responseText);
                }
            }
        }
    }
}(window,document));
