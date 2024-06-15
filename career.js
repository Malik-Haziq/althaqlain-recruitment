// Modules 

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('applyModal');
    const applyButtons = document.querySelectorAll('.apply-btn');
    const closeModalButton = modal.querySelector('.close-btn');

    applyButtons.forEach(button => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        modal.classList.remove('hidden');
      });
    });

    closeModalButton.addEventListener('click', () => {
      modal.classList.add('hidden');
    });
  });