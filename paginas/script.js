;(function(window,document,undefined){
    window.onload = function ()
    {
        function validate()
        {
            return vMail && vName && vLastName && vPass && vConfirmPass
        }

        function isUserSet(mail)
        {
            var req = new XMLHttpRequest()
            var res = ''
            req.onreadystatechange = function()
            {
                if (this.readyState === 4 && this.status === 200) {
                    res = JSON.parse(this.responseText)
                }
            }
            req.open('GET', '/ecoticket/helpers/sign-up.controller.php?mail='+mail)
            req.send()
            console.log(res);
            return res
        }

        var mailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        var form = document.forms[0]
        var mail = form.mail
        var name = form.name
        var lastName = form.lastName
        var pass = form.pass
        var confirmPass = form.confirmPass
        var req = new XMLHttpRequest()
        var vMail = false
        var vName = false
        var vLastName = false
        var vPass = false
        var vConfirmPass = false
        var processing = false

        form.onsubmit = function (e) {
            e.preventDefault()
            if (validate() && !processing) {
                processing = true
                var data = new FormData(form)
                req.open('POST', '/ecoticket/helpers/sign-up.controller.php')
                req.send(data)
            }
        }

        req.onreadystatechange = function()
        {
            if (this.readyState === 4)
            {
                if (this.status === 200)
                {
                    console.log(this.responseText);
                    processing = false
                }else {
                    var errors = JSON.parse(this.responseText)
                    console.log(errors);
                    processing = false
                }
            }

        }

        mail.onblur = function () {
            // console.log(typeof(isUserSet(this.value)));
            // console.log(isUserSet(this.value) == "NULL");
            if (this.value.match(mailRegex) && isUserSet(this.value) == 'NULL'){
                vMail = true
                mail.className = 'has-success'
            } else {
                mail.className = 'has-error'
            }
        }

        name.onblur = function () {
            if (this.value.match(/[A-z]+$/) != null && this.value.length < 30){
                vName = true
                name.className = 'has-success'
            } else {
                name.className = 'has-error'
            }
        }
        lastName.onblur = function () {
            if (this.value.match(/[A-z]+$/) && this.value.length < 30){
                vLastName = true
                lastName.className = 'has-success'
            } else {
                lastName.className = 'has-error'
            }
        }
        pass.onblur = function () {
            if (this.value.match(/^\w+$/) && this.value.length >= 6 && this.value.length <= 12){
                vPass = true
                pass.className = 'has-success'
            } else {
                pass.className = 'has-error'
            }
        }
        confirmPass.onblur = function()
        {
            if (this.value == pass.value){
                vConfirmPass = true
                confirmPass.className = 'has-success'
            } else {
                confirmPass.className = 'has-error'
            }
        }
        pass.onchange = function(e) {
            if (confirmPass.value == pass.value){
                vConfirmPass = true
                confirmPass.className = 'has-success'
            } else {
                confirmPass.className = 'has-error'
            }
        }

    }
}(window,document));
