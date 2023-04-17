var inputs = document.getElementsByClassName("vaildate_input");
var form = document.getElementById("vaildate_user_form");
var inputsArray = Object.values(inputs);
var patterns = {
    name: /^[a-zA-Z]{5,20}$/i,
    user_name: /^[a-z\d]{5,20}$/i,
    phone: /^(010|011|012|015)\d{8}$/,
    email: /^([\w\.-]+)@([a-z\d]+)\.([a-z]{3,5})(\.[a-z]{2,5})?$/, //yourname @ domain.com(.uk)
    user_password: /^(?=.*[A-Z])(?=.*\d)(?=.*[@!#%&_])[\w@!#%&]{8,}$/
}

function validate(field, pattern) {
    var text = document.querySelector(`#${field.id}+div`);
    if (pattern.test(field.value)) {
        text.classList.add("d-none");
        field.classList.remove("is-invalid");
        field.classList.add("is-valid");
    } else {
        text.classList.remove("d-none");
        field.classList.add("is-invalid");
        field.classList.remove("is-valid");
    }
}
for (var input of inputs) {
    if(form.getAttribute('data-form-type')=="edit" && input.attributes.name.value!="user_password")
    {
        validate(input, patterns[input.attributes.name.value]);
    }
    input.addEventListener('keyup', (e) => {
        validate(e.target, patterns[e.target.attributes.name.value]);
        if (e.target.attributes.name.value == "user_password") {
            vaildatePassStyle(e.target.value)
            regex = new RegExp(`${e.target.value}`);
        }
    });
}
function replace(elementClass, vaild) {
    var icon = document.querySelector(`${elementClass} i`);
    var text = document.querySelector(elementClass);
    if (vaild) {
        icon.classList.replace("bi-x-lg", "bi-check-lg")
        text.classList.replace("text-danger", "text-success")
    } else {
        icon.classList.replace("bi-check-lg", "bi-x-lg")
        text.classList.replace("text-success", "text-danger")
    }
}
function vaildatePassStyle(pass) {
    if (containsUppercase(pass)) {
        replace(".big-letter", true);
    } else {
        replace(".big-letter", false);
    }
    if (containsSpecialChar(pass)) {
        replace(".special-char", true);
    } else {
        replace(".special-char", false);
    }
    if (containsDigit(pass)) {
        replace(".num", true);
    } else {
        replace(".num", false);
    }
    if (pass.length >= 8) {
        replace(".leng", true);
    } else {
        replace(".leng", false);
    }
}

function containsUppercase(str) {
    return /[A-Z]/.test(str);
}

function containsSpecialChar(str) {
    return /[@!#%&_]/.test(str);
}

function containsDigit(str) {
    return /[\d]/.test(str);
}

form.addEventListener("submit", (e) => {
    if (!inputsArray.every(checkVaildate)) {
        e.preventDefault();
    }
})

function checkVaildate(element) {
    return element.classList.contains("is-valid");
}