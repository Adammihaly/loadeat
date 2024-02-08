document.getElementById('megye').addEventListener('change', () => {

    var dropdown = document.getElementById('megye');
    if(dropdown.options[0].value === "placeholder")
    {
        dropdown.removeChild(dropdown.options[0]);
    }
    
})

document.getElementById('ido').addEventListener('change', () => {

    var dropdown = document.getElementById('ido');
    if(dropdown.options[0].value === "placeholder")
    {
        dropdown.removeChild(dropdown.options[0]);
    }
    
})