import { settings } from "./settings.js"

const btnAction = document.querySelector('#btnAction')
btnAction.addEventListener('click', removeSelected, false)

function removeSelected() {
    const action = document.querySelector('#action')
    if (action.value === "") {
        alert("Select an action, please!")
        return
    }
    const checkboxesMarked = new Array()

    checkboxList.forEach(element => {
        if (element.checked)
            checkboxesMarked.push(element.getAttribute('data-checkboxes-id'))
    })
    if (checkboxesMarked.length === 0) {
        alert("Select at least a value, please!")
        return
    }

    deleteSelected(checkboxesMarked)
}

async function deleteSelected(checkboxesMarked) {
    let h = new Headers()
    h.append("Content-Type", "application/json")
    h.append("Accept", "application/json")
    h.append("X-CSRF-TOKEN", settings.token)

    let response = await fetch(`${settings.urlCurrent}/destroySelected`,
    {
        method: 'DELETE',
        headers: h,
        body: JSON.stringify({id: checkboxesMarked})
    })
    window.location.href = settings.urlCurrent
}
