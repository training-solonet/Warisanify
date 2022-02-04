document.addEventListener('click', e => {
    const isDropdownLink = e.target.matches("[data-dropdown-link]")
    if (!isDropdownLink && e.target.closest('[data-dropdown]') != null) return
    let currentDropdown
    if (isDropdownLink){
        currentDropdown = e.target.closest('[data-dropdown]')
        currentDropdown.classList.toggle('active')
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        if (dropdown === currentDropdown ) return
        dropdown.classList.remove("active")
    })
})