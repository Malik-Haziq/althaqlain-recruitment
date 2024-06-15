function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
}

const visted = document.querySelector('.visted');

// Function to handle the active link color change
function handleNavLinkClick(event) {
    // Remove 'active' class from all links
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => link.classList.remove('visted'));

    // Add 'active' class to the clicked link
    event.target.classList.add('visted');
}

// Add event listeners to all navigation links
const navLinks = document.querySelectorAll('.nav-links a');
navLinks.forEach(link => {
    link.addEventListener('click', handleNavLinkClick);
});
