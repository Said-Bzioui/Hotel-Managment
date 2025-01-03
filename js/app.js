
// ajouter un chambre
let addBtn = document.querySelector('.add_btn');
let popup_ajouter = document.querySelector('.popup-ajouter');
let cuncelBtn = document.querySelector('.cuncel');

addBtn.addEventListener('click', () => {
    popup_ajouter.classList.remove('hidden');
});
cuncelBtn.addEventListener('click', () => {
    popup_ajouter.classList.add('hidden');
});


// // update un chambre
// let updateBtn = document.querySelectorAll('.update_btn');
// let popup_update = document.querySelector('.popup-update');
// let up_cuncelBtn = document.querySelector('.up-cuncel');

// updateBtn.forEach((btn) => {
//     btn.addEventListener('click', () => {
//         console.log(btn.dataset.id);
//         popup_update.classList.toggle('hidden');
//         let up_room_id = document.getElementById('up_room_id');
//         up_room_id.value = btn.dataset.id;
//     });
// })
// up_cuncelBtn.addEventListener('click', () => {
//     popup_update.classList.add('hidden');
// });


// ------------------ zone -----------------

const toasts = document.querySelectorAll('.toast');
toasts.forEach((toast, index) => {
    setTimeout(() => {
        toast.classList.add('fade-out'); 
        setTimeout(() => {
            toast.remove(); 
        }, 1000); 
    }, 4000); 
});

