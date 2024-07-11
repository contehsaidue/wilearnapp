/* ------------------- MENU TABS -------------------------- */
const menuTabs = document.querySelector(".menu-tabs");
menuTabs.addEventListener("click",function(e){
if(e.target.classList.contains("menu-tab-item") && !e.target.classList.contains("active")){
    const target = e.target.getAttribute("data-target");
    menuTabs.querySelector(".active").classList.remove("active");
    e.target.classList.add("active");
    const menuSection = document.querySelector(".menu-section");
    menuSection.querySelector(".menu-tab-content.active").classList.remove("active");
    menuSection.querySelector(target).classList.add("active");
}


});