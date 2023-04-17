var inputs = document.getElementsByClassName("vaildate_input");
var form = document.getElementById("vaildate_group_form");
var inputsArray = Object.values(inputs);
console.log(inputs)
var patterns = {
    group_name: /^[a-zA-z\s_-]{5,20}$/i,
    group_desc: /^[A-Za-z0-9\-_.,!?;:()\[\]\'"\s]{1,1500}$/i,
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
    if (form.getAttribute('data-form-type') == "edit") {
        validate(input, patterns[input.attributes.name.value]);
    }
    input.addEventListener('keyup', (e) => {
        validate(e.target, patterns[e.target.attributes.name.value]);
    });
}
form.addEventListener("submit", (e) => {
    if (!inputsArray.every(checkVaildate)) {
        e.preventDefault();
    }
})

function checkVaildate(element) {
    return element.classList.contains("is-valid");
}