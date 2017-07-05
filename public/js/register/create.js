;(function(window,document,undefined){
    window.onload = function ()
    {
        function hasError(input, errMessage)
        {
            var formGroup = input.parentNode.parentNode
            if (formGroup.className.includes('has-success')) {
                formGroup.className = formGroup.className.replace('has-success', 'has-error')
            }else {
                formGroup.className += ' has-error'
            }
            var inputCont = input.parentNode
            var errors = inputCont.getElementsByClassName('help-block')
            if (errors.length != 0) {
                for (var i = 0; i <= errors.length; i++)
                {
                    errors[0].remove()
                }
            }
            var error = document.createElement('span')
            error.innerHTML = errMessage
            error.className = 'help-block'
            inputCont.append(error)
        }

        function hasSuccess(input)
        {
            var formGroup = input.parentNode.parentNode
            console.log(formGroup.className.includes('has-error'));
            if (formGroup.className.includes('has-error')) {
                formGroup.className = formGroup.className.replace('has-error', 'has-success')
            }else {
                formGroup.className += ' has-success'
            }
            var inputCont = input.parentNode
            var errors = inputCont.getElementsByClassName('help-block')
            if (errors.length != 0) {
                for (var i = 0; i <= errors.length; i++)
                {
                    errors[0].remove()
                }
            }
        }

        function validate()
        {
            return vEmail && vName && vLastName && vPass && vConfirmPass
        }

        function checkEmailAvailability(input, email, callback)
        {
            var req = new XMLHttpRequest()
            var res = ''
            req.onreadystatechange = function()
            {
                if (this.readyState === 4 && this.status === 200)
                {
                    if (JSON.parse(this.responseText)) {
                        callback(input, true)
                    }else {
                        callback(input, false)
                    }
                }
            }
            req.open('GET', '/ecoticket/helpers/sign-up.controller.php?email='+email)
            req.send()
        }

        var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        var form = document.forms[0]
        var email = form.email
        var name = form.name
        var lastName = form.lastName
        var pass = form.password
        var confirmPass = form.passwordConfirm
        var req = new XMLHttpRequest()
        var vEmail = false
        var vName = false
        var vLastName = false
        var vPass = false
        var vConfirmPass = false
        var processing = false
        var token = form._token.value
        var button = document.querySelector('#submitButton')


        form.onsubmit = function (e) {
            e.preventDefault()
            if (validate() && !processing) {
                processing = true

                var data = new FormData(form)
                req.open('POST', '/my')
                req.setRequestHeader('X-CSRF-TOKEN', token)
                req.send(data)

                button.innerHTML = "<span id='spinner' class='fa fa-spinner fa-spin'></spinner>"
            }
        }

        req.onreadystatechange = function()
        {
            if (this.readyState === 4)
            {
                if (this.status === 200)
                {
                    // console.log(this.responseText);
                    processing = false
                    spinner.remove()
                }else {
                    var errors = JSON.parse(this.responseText)
                    // console.log(errors);
                    processing = false
                    spinner.remove()
                }
            }

        }

        email.onblur = function () {
            checkEmailAvailability(this, this.value, function(input, res)
            {
                if (res) {
                    hasError(input, 'Este correo ya está registrado! <a href="#">Recuperar contraseña</a>')
                }else {
                    hasSuccess(input)
                }
            })
            if (this.value.match(emailRegex)){
                vEmail = true
                hasSuccess(this)
            } else {
                hasError(this, "El correo ingresado es inválido!")
            }
        }

        name.onblur = function () {
            if (this.value.match(/[A-z]+$/) != null && this.value.length < 30){
                vName = true
                hasSuccess(this)
            } else {
                hasError(this, 'Este campo es obligatorio y debe tener un máximo de 30 caracteres!')
            }
        }
        lastName.onblur = function () {
            if (this.value.match(/[A-z]+$/) && this.value.length < 30){
                vLastName = true
                hasSuccess(this)
            } else {
                hasError(this, 'Este campo es obligatorio y debe tener un máximo de 30 caracteres!')
            }
        }
        pass.onblur = function () {
            if (this.value.match(/^\w+$/) && this.value.length >= 6 && this.value.length <= 12){
                vPass = true
                hasSuccess(this)
            } else {
                hasError(this, "Este campo es obligatorio y debe tener entre 6 y 12 números o letras!")
            }
        }
        confirmPass.onblur = function()
        {
            if (this.value == pass.value){
                vConfirmPass = true
                hasSuccess(this)
            } else {
                hasError(this, 'Las contraseñas no coinciden!')
            }
        }
        pass.onchange = function(e) {
            if (confirmPass.value == pass.value){
                vConfirmPass = true
                hasSuccess(confirmPass)
            } else {
                hasError(confirmPass, 'Las contraseñas no coinciden!')
            }
        }

    }
}(window,document));
