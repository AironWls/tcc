import { settings } from "./settings.js";

const btnLogout = document.querySelector(["#btnLogout"])

btnLogout.addEventListener("click", async function() {

    const myHeaders = new Headers()
    myHeaders.append("Content-Type", "text/json");
    myHeaders.append("Accept", "text/json");
    myHeaders.append("X-CSRF-TOKEN", settings.token)

    const myInit = {
        method: 'POST',
        headers: myHeaders,
    }

    const response = await fetch(`http://localhost:8000/logout`, myInit)
    if (!response.ok) {
        const message = `An error has ocurred: ${response.status}`
        throw new Error(message)
    }
    location.replace(location.href)
})
