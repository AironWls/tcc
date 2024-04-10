import { settings } from "./settings.js"

const btnDeleteList = document.querySelectorAll('[data-button-delete]')

btnDeleteList.forEach((element) => element.addEventListener('click', destroy, false))

async function destroy(event) {

    const tr = event.target.closest("tr")
    const id = tr.children[1].textContent
    const td = event.target.closest("td")

    fetch(`${settings.urlCurrent}/${id}`)

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json");
    myHeaders.append("Accept", "text/json");
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'DELETE',
        headers: myHeaders,
    }

    tr.innerHTML = loadSpinner()

    const response = await fetch(`${settings.urlCurrent}/${id}`, myInit)
    if (response.ok) {
        const json = await response.json()
        tr.remove()
    } else {
        alert('Something wrong happened')
        td.innerHTML = ''
        td.innerHTML = `<button data-button-status class="btn btn-sm btn-success" title="" aria-label=""></button>`
    }
}


function loadSpinner() {
    return `
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    `;
}
