//* makes a variable for the hamburger menu img it can't be changed
const navMenu = document.querySelector('img.menu');

//* makes a variable for the nav element
const pages = document.querySelector('nav');

//* it listens for when the users clicks on the hamburger menu img
navMenu.addEventListener("click", () => {
    //* this toggles a class named: "active" on/off on the nav element
    pages.classList.toggle('active');
});