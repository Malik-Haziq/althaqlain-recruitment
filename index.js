function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
}

document.getElementById('whatsapp-button').addEventListener('click', function() {
    const phoneNumber = '1234567890'; // Replace with your WhatsApp number
    const message = 'Hello, I would like to know more about your services.'; // Replace with your custom message
    const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');
  });



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