const containt_setting = document.querySelector('.containt-setting');
const parametre = document.querySelector('.parametre');
const users_list = document.querySelector('.business-list');
parametre.addEventListener('click', () =>{
  containt_setting.classList.toggle('active');
  users_list.classList.toggle('active');
})