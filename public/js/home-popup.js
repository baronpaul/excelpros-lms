
const tasksWrap = document.querySelector('#dark_skin');
const popupWrap = document.querySelector('.popup_wrap');
const loginBtn = document.querySelector('.login_btn');
const closePopup = document.querySelector('.close_popup');

if(loginBtn != null) {
    loginBtn.addEventListener('click', (e) => {
        e.preventDefault();
        //console.log(e);
        tasksWrap.style.display = "block";
        tasksWrap.style.zIndex = "10000";
        tasksWrap.style.opacity = "1";
        popupWrap.classList.remove('fadeout');
        popupWrap.classList.add('fadein');
    });
}

if(closePopup != null) {
    closePopup.addEventListener('click', () => {
        popupWrap.classList.remove('fadein');
        popupWrap.classList.add('fadeout');
        tasksWrap.style.display = "none";
        tasksWrap.style.zIndex = "-1";
        
    });
}
