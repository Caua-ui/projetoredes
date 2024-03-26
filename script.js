
const form = document.getElementById("form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const number = document.getElementById("number");
const address = document.getElementById("address");
const locality = document.getElementById("locality");
const postalcode = document.getElementById("postalcode");
const sexo = document.getElementById("sexo");
const date = document.getElementById("date");

form.addEventListener("submit", (event) => {
    event.preventDefault();

    checkForm();
})

username.addEventListener("blur", () =>{
    checkInputUsername();
})

email.addEventListener("blur", () =>{
    checkInputEmail();
})

number.addEventListener("blur", () =>{
    checkInputNumber();
})

address.addEventListener("blur", () =>{
    checkInputAddress();
})

locality.addEventListener("blur", () =>{
    checkInputLocality();
})

postalcode.addEventListener("blur", () =>{
    checkInputPostalcode();
})

function checkInputUsername(){
    const usernameValue = username.value;

    if(usernameValue === ""){
        errorInput(username, "Preencha este campo")
    }else{
        const formItem = username.parentElement;
        formItem.className = "form-content"
    }
    
    
}

function checkInputEmail(){
    const emailValue = email.value;

    if(emailValue === ""){
        errorInput(email, "O email é obrigatório")
    }else{
        const formItem = email.parentElement;
        formItem.className = "form-content"
    }
}

function checkInputNumber(){
    const numberValue = number.value;

    if(numberValue === ""){
        errorInput(number, "O número de telefone é obrigatório")
    }else if (numberValue.length < 9){
        errorInput(number, "O número de telefone deve ter 9 dígitos")
    }else if (!(/^\d+$/.test(numberValue))){
        errorInput(number, "Neste campo deve ter apenas números!")
    }else
        {
        const formItem = number.parentElement;
        formItem.className = "form-content"
    }
}

function checkInputAddress(){
    const addressValue = address.value;

    if(addressValue === ""){
        errorInput(address, "O endereço é obrigatório")
    }else{
        const formItem = address.parentElement;
        formItem.className = "form-content"
    }
}

function checkInputLocality(){
    const localityValue = locality.value;

    if(localityValue === ""){
        errorInput(locality, "A localidade é obrigatório")
    }else{
        const formItem = locality.parentElement;
        formItem.className = "form-content"
    }
}

function checkInputPostalcode(){
    const postalcodeValue = postalcode.value;

    if(postalcodeValue === ""){
        errorInput(postalcode, "O código postal é obrigatório")
    }else if (postalcodeValue.length < 7){
        errorInput(postalcode, "O código postal deve ter 7 dígitos")

    }else if (!(/^\d+$/.test(numberValue))){
        errorInput(number, "Neste campo deve ter apenas números!")
    }

    else{
        const formItem = postalcode.parentElement;
        formItem.className = "form-content"
    }
}

    

function checkInputDate(){
    const dateInput = document.getElementById("date");
    const dateValue = new Date(dateInput.value); // Convertendo o valor para um objeto de data

    if(dateValue.toString() === "Invalid Date"){
        errorInput(dateInput, "A Data de Nascimento é obrigatória");
    } else {
        const today = new Date();
        const twelveYearsAgo = new Date(today.getFullYear() - 12, today.getMonth(), today.getDate());

        if (dateValue > twelveYearsAgo) {
            errorInput(dateInput, "Você deve ter pelo menos 12 anos de idade");
        } else {
            const formItem = dateInput.parentElement;
            formItem.className = "form-content";
        }
    }
}
   

function checkForm(){
    checkInputUsername();
    checkInputEmail();
    checkInputNumber();
    checkInputAddress();
    checkInputLocality();
    checkInputPostalcode();
    checkInputDate();

    const formItems = form.querySelectorAll(".form-content")

    const isValid = [...formItems].every( (item) => {
        return item.className === "form-content"
    });

    if(isValid){
        alert("Contacto Guardado queridinha(o)")
    }else{
        alert("Preencha todos os campos!")
    }
}


function errorInput(input, message){
    const formItem = input.parentElement;
    const textMessage = formItem.querySelector("a")

    textMessage.innerText = message;

    formItem.className = "form-content error"
}

