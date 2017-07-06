;
(function (window,document,undefined)
{
        var body = document.body;
        var mainNav = document.getElementById("main-nav")
        var nav = document.getElementById("navbar").firstElementChild
        var list = document.createElement("li")
        var button = document.createElement("a")
        var ul = document.createElement("ul")
        var colors =
        {
            normal : ["Normal", "", ""],
            mar : ["Mar","#79D1C3","#C9FDD7"],
            boquita : ["Boquita","#0B409C","#FDBE34"],
            andy : ["Andy","#F1684E", "#D3E0E2"],
        }

        list.className = "dropdown"

        button.className = "dropdown-toggle"
        button.href = "#"
        button.setAttribute("data-toggle", "dropdown");
        button.innerHTML = "Cambiar color <span class='caret'></span>"
        list.append(button)

        ul.className = "dropdown-menu"
        for (var color in colors)
            {
                console.log(color);
                 var li = document.createElement("li")
                 li.innerHTML = "<a id="+colors[color][0]+" href='#'>"+colors[color][0]+"</a>"
                 ul.append(li)
            }

        list.append(ul)

        nav.prepend(list)

        var normal = document.getElementById("Normal")
        var mar = document.getElementById("Mar")
        var andy = document.getElementById("Andy")
        var boquita = document.getElementById("Boquita")

        normal.onclick = function (e) {
            body.style.background = colors.normal[1]
            mainNav.style.background = colors.normal[2]
        }
        mar.onclick = function (e) {
            body.style.background = colors.mar[1]
            mainNav.style.background = colors.mar[2]
        }
        andy.onclick = function (e) {
            body.style.background = colors.andy[1]
            mainNav.style.background = colors.andy[2]
        }
        boquita.onclick = function (e) {
            body.style.background = colors.boquita[1]
            mainNav.style.background = colors.boquita[2]
        }
}
(window,document))
;
