document.forms[0].onsubmit = function () {
    formulario = false;
    form = document.forms[0].name;
    console.log(form);

    if (form == 'login') {
        console.log('aqui');
        formulario = true;
    }

    if (form == 'form-car') {
        var placa = document.getElementById("placa");
        if (placa.value.length <= 0 || placa.value.length > 20) {
            document.querySelector("#msgPlaca").innerHTML = "Nome não pode estar em branco e deve ter menos de 20 caracteres";
            document.querySelector("#msgPlaca").classList.add("border-danger");
            
        } else {
            console.log('Valido');
            document.querySelector("#msgPlaca").innerHTML = "";
            document.querySelector("#msgPlaca").classList.remove("border-danger");
            formulario = true;
            
        }

    }

    if (form == 'form-client'){

        formulario = true;
        var nome = document.getElementById("nome");
        var telefone = document.getElementById("telefone");
        var cpf = document.getElementById("cpf");

        if (nome.value.length <= 0 || nome.value.length > 20) {
            document.querySelector("#msgNome").innerHTML = "Nome não pode estar em branco e deve ter menos de 20 caracteres";
            document.querySelector("#msgNome").classList.add("border-danger");
            formulario = false;
        } else {
            document.querySelector("#msgNome").innerHTML = "";
            document.querySelector("#msgNome").classList.remove("border-danger");

        } if (telefone.value.length <= 0 || telefone.value.length > 20) {
            document.querySelector("#msgTelefone").innerHTML = "Nome não pode estar em branco e deve ter menos de 20 caracteres";
            document.querySelector("#msgTelefone").classList.add("border-danger");
            formulario = false;
        } else {
            document.querySelector("#msgTelefone").innerHTML = "";
            document.querySelector("#msgTelefone").classList.remove("border-danger");
           

        } if (cpf.value.length <= 0 || cpf.value.length > 11 || cpf.value.length < 11) {
            document.querySelector("#msgCpf").innerHTML = "Nome não pode estar em branco e deve ter menos de 11 caracteres";
            document.querySelector("#msgCpf").classList.add("border-danger");
            formulario = false;
        } else {
            document.querySelector("#msgCpf").innerHTML = "";
            document.querySelector("#msgCpf").classList.remove("border-danger");
            
        }
    }

    if (form == 'form-tipo'){
        var preco = document.getElementById("preco");
        var descr = document.getElementById("descr");
        formulario = false;
        if (preco.value.length <= 0 || preco.value.length > 20) {
            document.querySelector("#msgPreco").innerHTML = "Nome não pode estar em branco e deve ter menos de 20 caracteres";
            document.querySelector("#msgPreco").classList.add("border-danger");
            formulario = false;
        } else {
            document.querySelector("#msgPreco").innerHTML = "";
            document.querySelector("#msgPreco").classList.remove("border-danger");
            
        } if (descr.value.length <= 0 || descr.value.length > 20) {
            document.querySelector("#msgDescr").innerHTML = "Nome não pode estar em branco e deve ter menos de 20 caracteres";
            document.querySelector("#msgDescr").classList.add("border-danger");
            formulario = false;
        } else {
            document.querySelector("#msgDescr").innerHTML = "";
            document.querySelector("#msgDescr").classList.remove("border-danger");
            
        }

    }
    return formulario;
}

