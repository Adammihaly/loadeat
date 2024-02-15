const elso = document.getElementById("1");
const masodik = document.getElementById("2");
const harmadik = document.getElementById("3");
const negyedik = document.getElementById("4");
const otodik = document.getElementById("5");

var szam = 0;
const feladat_szama = document.getElementById("oldal_szam")

const tomb = [elso, masodik, harmadik, negyedik,otodik];

const elore_gomb = document.getElementById("elore");
const hatra_gomb = document.getElementById("hatra");
const submit = document.getElementById("submit");
submit.style.display = 'none'

function szamlalo()
{
   for (let i =0;i<tomb.length; i++)
    {
      
        if(szam===i)
        {
            tomb[i].style.width = "100%";
            tomb[i].style.height = "100%";
            tomb[i].style.padding = "2%";
            tomb[i].style.opacity = "1";
        }
        else
        {
            tomb[i].style.width = "0";
            tomb[i].style.height = "0";
            tomb[i].style.padding = "0";  
        }

    }

    hatra_gomb.disabled = szam === 0;
    elore_gomb.disabled = szam === tomb.length - 1;

    if(szam === tomb.length-1)
    {
        elore_gomb.style.display = 'none';
        submit.style.display = 'block';
    }
    else
    {
        elore_gomb.style.display = 'block';
        submit.style.display = 'none';
    }

}

elore_gomb.onclick = function ()
{
    szam++;
    feladat_szama.textContent = szam +1;
    szamlalo();

}

hatra_gomb.onclick = function (){
   
    szam--;
    feladat_szama.textContent = szam +1;
    szamlalo();

}

function validateForm() {

    var form = document.querySelector('form');
    var elements = form.elements;

    for (var i = 0; i < elements.length; i++) {
        if (elements[i].hasAttribute('required') && elements[i].value.trim() === '') {
            alert("A(z) " + elements[i].name + " nincs kitöltve. Kérlek töltsd ki a csillagozott mezőket!");
            return false;
        }
    }

    return true;
}


szamlalo();
