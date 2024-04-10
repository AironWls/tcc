const checkboxToggle = document.querySelector('[data-checkbox-toggle]')

const checkboxList = document.querySelectorAll('[data-checkboxes-id]')

checkboxToggle.addEventListener('click', (event) =>
    checkboxList.forEach(element => element.checked = event.target.checked)
)
