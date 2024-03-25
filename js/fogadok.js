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


document.getElementById('hamburger').addEventListener('click', () => {
    
    document.getElementById('menu').style.display = (document.getElementById('menu').style.display === 'none' || document.getElementById('menu').style.display === "") ? 'flex' : 'none';  
})