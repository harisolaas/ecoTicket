;(function(window,document,undefined)
{
    window.onload = function(){
        var details = document.getElementsByClassName('details')
        for (var i = 0; i < details.length; i++) {
            details[i].onclick = function (e){
                e.preventDefault()
                document.getElementById(this.getAttribute('data-toggle')).classList.toggle('hidden')
            }
        }
    }
}(window,document));
