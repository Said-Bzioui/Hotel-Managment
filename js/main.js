const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
//---------------------------------------------------
let time = document.querySelector('.time');

setInterval(() => {
  let hour = new Date().getHours();
  let minuts = new Date().getMinutes();
  let seconds = new Date().getSeconds();
  hour = hour < 10 ? `0${hour}` : hour;
  minuts = minuts < 10 ? `0${minuts}` : minuts;
  seconds = seconds < 10 ? `0${seconds}` : seconds;
  // console.log(seconds);
  time.innerHTML = `${hour}:${minuts}:${seconds}`;

}, 1000);

// ----------------------------------------------------

let popUp = document.querySelector('.room-details');
let bookBtn = document.querySelectorAll('.book-btn');
let confirmBtn = document.querySelector('.confirm-btn');

bookBtn.forEach((ele) => {
  ele.addEventListener("click", (e) => {
    popUp.classList.remove('close');
    let prouctId = e.target.dataset.id;
    confirmBtn.setAttribute("name", prouctId)
    console.log(prouctId)

  })
})
// ------------------reasults count -----------------
let roomList = document.querySelectorAll('.list .room__card');
let roomCount = document.querySelector('.res-counter');
roomCount.innerHTML = `${roomList.length} reasults`;
// ------------------user zone -----------------
let userBtn = document.querySelector('.user');
let userToogle = document.querySelector('.usertoogle');

userBtn.addEventListener('click', () => {
  userToogle.classList.toggle("show");

})




