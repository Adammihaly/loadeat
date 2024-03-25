const seeMoreIcons = document.querySelectorAll('#see_more');
const elozmenyek_foglalasWrappers = document.querySelectorAll('.elozmenyek .foglalas_wrapper');
const elozmenyek_nincsFoglalas = document.querySelector('.elozmenyek .nincs_foglalas');
const foglalas_foglalasWrappers = document.querySelectorAll('.foglalasok .foglalas_wrapper');
const foglalas_nincsFoglalas = document.querySelector('.foglalasok .nincs_foglalas');

const foglalasok = document.querySelector('.foglalasok');
const elozmenyek = document.querySelector('.elozmenyek');
const kezelopult = document.querySelector('.kezelopult');

const kezelopult_gomb = document.getElementById('kezelopult_gomb');
const foglalasok_gomb = document.getElementById('foglalasok_gomb');
const elozmenyek_gomb = document.getElementById('elozmenyek_gomb');
const etterem_hozzaadasa_gomb = document.getElementById('etterem_hozzaadasa_gomb');
const etterem_szerkesztese = document.getElementById('etterem_szerkesztese');




function linketteremreg()
{
    window.location.href = 'etteremreg.php'
}

function linketteremmodositas()
{
  window.location.href = 'etteremmodositas.php'
}

function kezelopultgomb()
{
  console.log("fos")
  kezelopult.style.display = 'flex';
  foglalasok.style.display = 'none';
  elozmenyek.style.display = 'none';
}

function elozmenyekgomb()
{
   kezelopult.style.display = 'none';
  foglalasok.style.display = 'none';
  elozmenyek.style.display = 'flex';

}

function foglalasokgomb()
{
   kezelopult.style.display = 'none';
  foglalasok.style.display = 'flex';
  elozmenyek.style.display = 'none';

}


const kezelopult_gomb1 = document.getElementById('kezelopult_gomb1');
const foglalasok_gomb2 = document.getElementById('foglalasok_gomb2');
const elozmenyek_gomb3 = document.getElementById('elozmenyek_gomb3');
const etterem_hozzaadasa_gomb4 = document.getElementById('etterem_hozzaadasa_gomb4');
const etterem_szerkesztese5 = document.getElementById('etterem_szerkesztese5');


etterem_hozzaadasa_gomb4.addEventListener('click' , ()=>{
  window.location.href = 'etteremreg.php'
})

etterem_szerkesztese5.addEventListener('click' , ()=>{
  window.location.href = 'etteremmodositas.php'
})


function tablamegjelenit(szam)
{
    seeMoreIcons[szam].classList.toggle('active');
  
}


function SeeMore()
{
   seeMoreIcon.classList.toggle('active');
}


var szam = 0;

function hamburger()
{
    if(szam===0)
  {
    document.querySelector('.telefonos_menu').style.transform = 'translate(0)';
    szam++;
  }
  else
  {
    document.querySelector('.telefonos_menu').style.transform = 'translate(105%)';
    szam=0;
  }
}
