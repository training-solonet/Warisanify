document.addEventListener('click', e => {
    console.log("cek");
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


let content = document.querySelector('.content');
let descHead = document.querySelector('#desc-head');
let detailHead = document.querySelector('#detail-head');


function changeDescription(){
    let descriptionContent = document.querySelector('.description-content').innerHTML;
    console.log(descriptionContent)
    content.innerHTML = descriptionContent;
    descHead.classList = 'active';
    detailHead.classList.remove('active');
}

function changeDetailProduct(){
    let dimensionContent = document.querySelector('.product-detail-information').innerHTML;

    content.innerHTML = dimensionContent;
    detailHead.classList = 'active';
    descHead.classList.remove('active');

}