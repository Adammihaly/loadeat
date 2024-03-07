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


etterem_hozzaadasa_gomb.addEventListener('click' , ()=>{
  window.location.href = 'etteremreg.php'
})

kezelopult_gomb.addEventListener('click', () =>{
  kezelopult.style.display = 'flex';
  foglalasok.style.display = 'none'
  elozmenyek.style.display = 'none'
})

elozmenyek_gomb.addEventListener('click', () =>{
  kezelopult.style.display = 'none';
  foglalasok.style.display = 'none'
  elozmenyek.style.display = 'flex'
})

foglalasok_gomb.addEventListener('click', () =>{
  kezelopult.style.display = 'none';
  foglalasok.style.display = 'flex'
  elozmenyek.style.display = 'none'
})


for (const seeMoreIcon of seeMoreIcons) {
  seeMoreIcon.addEventListener('click', () => {
    seeMoreIcon.classList.toggle('active');
  });
}

if(elozmenyek_foglalasWrappers.length === 0)
{
  elozmenyek_nincsFoglalas.style.display = 'flex';
  
}
else{
  elozmenyek_nincsFoglalas.style.display = 'none'
}

if(foglalas_foglalasWrappers.length === 0)
{
  foglalas_nincsFoglalas.style.display = 'flex';
}
else
{
  foglalas_nincsFoglalas.style.display = 'none';
}