
const loginPopup = document.getElementById('loginPopup');
const closeLogin = document.getElementById('closeLogin');
const log_regis = document.getElementById('log_regis');
const registerPopup = document.getElementById('registerPopup');
const regis = document.getElementById('regis');
const closeRegister = document.getElementById('closeRegister');
const openLoginFromRegister = document.getElementById('openLoginFromRegister');

log_regis.addEventListener('click', ()=> {

    loginPopup.classList.remove('hidden');
})
closeLogin.addEventListener('click', ()=> {
    loginPopup.classList.add('hidden');
})

regis.addEventListener('click', ()=> {
    registerPopup.classList.remove('hidden');
    loginPopup.classList.add('hidden');
})

closeRegister.addEventListener('click', ()=> {
    registerPopup.classList.add('hidden');
})

openLoginFromRegister.addEventListener('click', () => {
    registerPopup.classList.add('hidden');
    loginPopup.classList.remove('hidden');
})


