let addCiderBtn = document.getElementById('addCiderBtn');
if (addCiderBtn) {
    addCiderBtn.addEventListener('click', function(){
        let createCider = new XMLHttpRequest();
        createCider.open("POST", "http://localhost/wordpress/wp-json/wp/v2/")
    })
}