function validaSenha(){
    var senha = document.getElementById('senha').value;
    var login = document.getElementById('login').value;
    var email = document.getElementById('email').value;
    var enviarButtom = document.getElementById('enviar');
    if (senha != "" & login != "" & email != ""){
        enviarButtom.disabled = false;
    } else{
        enviarButtom.disabled = true;
    }
}
function mostrarSenha(){
    var lugar = document.getElementById("senha");
    if(lugar.type == "password"){
        lugar.type = "text";
    }
    else if(lugar.type == "text"){
        lugar.type = "password";
    }
}

function gerar(){
    var bg = document.getElementById("bodyroxo")
    var navbar = document.getElementById("header")
    var form = document.getElementById("form")
    var formpass = document.getElementById("formpass")
    var footer = document.getElementById("footer")

    var leng = document.querySelector('#lenght').value
    var caracEspecial = document.querySelector('input[name="caractEsp"]:checked').value
    var passw = document.querySelector('#passw')

    const numbers = [48, 57]
    const upperchars = [65, 90]
    const lowerchars = [97, 122]
    const especialchars = [33, 35, 36, 37, 38, 40, 41, 42, 45, 46, 47, 63, 64, 91, 93, 94, 95, 123, 124, 125, 126]

    

    if(leng >= 6 && leng <= 40) {
        bg.classList.toggle("bgpurple")
        navbar.classList.toggle("none")
        form.classList.toggle("none")
        formpass.classList.toggle("none")
        footer.classList.toggle("none")
        if (caracEspecial == "1") {
            const ascii = [numbers, upperchars, lowerchars, especialchars]
            let pass = ''
            for (let c = 0; c < leng; c++) {
                let type = parseInt(Math.random() * ascii.length)
                if (type === 3) {
                    pass += String.fromCharCode(especialchars[parseInt(Math.random() * especialchars.length)])
                } else {
                    pass += String.fromCharCode(Math.floor(Math.random()*(ascii[type][1]-ascii[type][0]))+ascii[type][0])
                }
            }
            passw.innerHTML = pass
            document.getElementById('passwordsenha').value = pass
        } else {
            const ascii = [numbers, upperchars, lowerchars]
            let pass = ''
            for (let c = 0; c < leng; c++) {
                let type = parseInt(Math.random() * ascii.length)
                    pass += String.fromCharCode(Math.floor(Math.random()*(ascii[type][1]-ascii[type][0]))+ascii[type][0])
            }
            passw.innerHTML = pass
            document.getElementById('passwordsenha').value = pass
        }
    } else {
        document.getElementById('errorNumber').classList.remove('none')  
        let errorNumber = setTimeout(function() {
                document.getElementById('errorNumber').classList.add('animate__fadeOut')
            let quit = setTimeout(() => {
                document.getElementById('errorNumber').classList.add('none')
            }, 1000)
        }, 3000)
        document.getElementById('errorNumber').classList.remove('animate__fadeOut')
    }
}
function copiar() {
    try {
        var senha = document.getElementById('passwordsenha')
        senha.select()
        var ok = document.execCommand('copy')
        if (ok) {
            document.getElementById('sucess').classList.remove('none')  
            let sucess = setTimeout(function() {
                document.getElementById('sucess').classList.add('animate__fadeOut')
                let quit = setTimeout(() => {
                    document.getElementById('sucess').classList.add('none')
                }, 1000)
            }, 3000)
            document.getElementById('sucess').classList.remove('animate__fadeOut')
        }
        
    } catch (e) {
        document.getElementById('errorCopy').classList.remove('none')  
        let errorCopy = setTimeout(function() {
            document.getElementById('errorCopy').classList.add('animate__fadeOut')
            let quit = setTimeout(() => {
                document.getElementById('errorCopy').classList.add('none')
            }, 1000)
        }, 3000)
        document.getElementById('errorCopy').classList.remove('animate__fadeOut')
    }
    var bg = document.getElementById("bodyroxo")
    var navbar = document.getElementById("header")
    var form = document.getElementById("form")
    var formpass = document.getElementById("formpass")
    var footer = document.getElementById("footer")


    bg.classList.toggle("bgpurple")
    navbar.classList.toggle("none")
    form.classList.toggle("none")
    formpass.classList.toggle("none")
    footer.classList.toggle("none")
}
