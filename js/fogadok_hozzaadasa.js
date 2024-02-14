const elso = document.getElementById("1");
const masodik = document.getElementById("2");
const harmadik = document.getElementById("3");
const negyedik = document.getElementById("4");
const otodik = document.getElementById("5");
const hatodik = document.getElementById("6");
const hetedik = document.getElementById("7");
var szam = 0;
const feladat_szama = document.getElementById("oldal_szam")

const tomb = [elso, masodik, harmadik, negyedik,otodik,hatodik,hetedik];

const elore_gomb = document.getElementById("elore");
const hatra_gomb = document.getElementById("hatra");

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

szamlalo();