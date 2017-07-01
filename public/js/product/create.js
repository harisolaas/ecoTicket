;(
function(window,document,undefined)
{
    window.onload = function()
    {
        function sendForm()
        {
            var data = new FormData(form)
            req.open('POST', '/products')
            req.setRequestHeader('X-CSRF-TOKEN', token)
            req.send(data)
            req.onreadystatechange = function()
            {
                // if (this.readyState == 4 && this.status == 200) {
                //     stepThree.className += ' hidden'
                // }
            }
        }

        function setActive(crumb, element)
        {
            var text = crumb.innerText
            crumb.removeChild(crumb.firstElementChild)
            crumb.innerText = text
            crumb.className += ' active'

            element.className = element.className.replace('hidden', '')

            activeCrumb = crumb
            activeElement = element
        }

        function unsetActive(element = activeElement)
        {
            var text = activeCrumb.innerText
            activeCrumb.innerText = ''
            activeCrumb.append(document.createElement('a'))
            activeCrumb.firstElementChild.href = '#'
            activeCrumb.firstElementChild.innerText = text
            activeCrumb.className = activeCrumb.className.replace('active', '')

            element.className += ' hidden'
        }

        var form = document.forms[0]
        var token = form.token.value
        var stepOne = document.querySelector('#step1')
        var stepTwo = document.querySelector('#step2')
        var stepThree = document.querySelector('#step3')
        var stepFour = document.querySelector('#step4')
        var button = document.querySelector("#newProdButton")
        var driver = document.querySelector('#newProdDriver')
        var stepOneCrumb = document.querySelector('#step1-crumb')
        var stepTwoCrumb = document.querySelector('#step2-crumb')
        var stepThreeCrumb = document.querySelector('#step3-crumb')
        var stepFourCrumb = document.querySelector('#step4-crumb')
        var driverCrumb = document.querySelector('#newProdDriver-crumb')
        var activeCrumb = stepOneCrumb
        var activeElement = stepOne
        var step = 1
        var req = new XMLHttpRequest()

        stepOneCrumb.onclick = function()
        {
            unsetActive()
            setActive(this, stepOne)
        }
        stepTwoCrumb.onclick = function()
        {
            unsetActive()
            setActive(this, stepTwo)
        }
        stepThreeCrumb.onclick = function()
        {
            unsetActive()
            setActive(this, stepThree)
        }
        stepFourCrumb.onclick = function()
        {
            unsetActive()
            setActive(this, stepFour)
            button.innerText = 'Enviar'
        }
        driverCrumb.onclick = function()
        {
            unsetActive(form)
            setActive(this, driver)
        }
        
        form.onsubmit = function(e)
        {
            e.preventDefault()

            switch (step)
            {
                case 1:
                    unsetActive()
                    setActive(stepTwoCrumb, stepTwo)
                    break
                case 2:
                    unsetActive()
                    setActive(stepThreeCrumb, stepThree)
                    break;
                case 3:
                    unsetActive()
                    setActive(stepFourCrumb, stepFour)
                    button.innerText = 'Enviar'
                    break;
                case 4:
                    sendForm(this)
                    unsetActive(form)
                    setActive(driverCrumb, driver)
                    break;
            }
            step++
        }
    }
}
(window,document));
