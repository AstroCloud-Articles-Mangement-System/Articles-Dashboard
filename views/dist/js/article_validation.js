var inputs = document.getElementsByClassName("vaildate_input");
var form = document.getElementById("validate_article_form");
var inputsArray = Object.values(inputs);
console.log(inputs)
var patterns = {
    article_title: /^[a-zA-Z ]{3,20}$/,
    article_summary: /^[\w\W ]{3,50}$/,
    article_content: /^[\w\W ]{3,5000}$/,
    article_image: /\.(jpg|jpeg|png|gif)$/i 
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