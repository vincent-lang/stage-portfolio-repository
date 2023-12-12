const modalElement = document.querySelector('div#modal');

const openButtons = document.querySelectorAll('button#open-modal');

const closeButton = document.querySelector("#close-modal");

closeButton.addEventListener('click', () => {
  modalElement.style.display = 'none';
  setTimeout(() => { modalElement.classList.remove('visible') }, 10000);
});

openButtons.forEach(openButtons => {
  openButtons.addEventListener('click', () => {
    modalElement.style.display = 'flex';
    setTimeout(() => { modalElement.classList.add('visible') }, 5);
  });
});