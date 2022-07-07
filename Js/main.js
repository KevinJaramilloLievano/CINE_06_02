const Col= document.querySelector('.centrado3-carousel');
const peliculas= document.querySelector('.pelicula');


const flechaIzquierda=document.getElementById('flecha-izquierda')
const flechaDerecha=document.getElementById('flecha-derecha')


flechaDerecha.addEventListener('click', () => {
 Col.scrollLeft += Col.offsetWidth;
});

flechaIzquierda.addEventListener('click', () => {
    Col.scrollLeft -= Col.offsetWidth;
});



const Col2= document.querySelector('.centrado4-carousel');
const Actor= document.querySelector('.Actor');


const flechaIzquierda2=document.getElementById('flecha-izquierdaa')
const flechaDerecha2=document.getElementById('flecha-derechaa')


flechaDerecha2.addEventListener('click', () => {
 Col2.scrollLeft += Col2.offsetWidth;
});

flechaIzquierda2.addEventListener('click', () => {
    Col2.scrollLeft -= Col2.offsetWidth;
});


const Col3= document.querySelector('.centrado5-carousel');
const Director= document.querySelector('.Director');


const flechaIzquierda3=document.getElementById('flecha-izquierdaaa')
const flechaDerecha3=document.getElementById('flecha-derechaaa')


flechaDerecha3.addEventListener('click', () => {
 Col3.scrollLeft += Col3.offsetWidth;
});

flechaIzquierda3.addEventListener('click', () => {
    Col3.scrollLeft -= Col3.offsetWidth;
});