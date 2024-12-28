document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.querySelector('#contact-form');

    contactForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(contactForm);
        console.log('Form Data:', formData);

        fetch('contact_us.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response Headers:', response.headers);
            return response.text();
        })
        .then(data => {
            console.log('Server Response:', data);
            displayMessage(data);
        })
        .catch(error => {
            console.error('Fetch Error:', error);
        });
    });

    function displayMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.className = 'message';
        messageElement.textContent = message;

        // Append the message to the contact section or another suitable location.
        const contactSection = document.querySelector('.contact');
        contactSection.appendChild(messageElement);

        // Optionally, you can add a timer to remove the message after a few seconds.
        setTimeout(() => {
            contactSection.removeChild(messageElement);
        }, 5000); // Remove the message after 5 seconds (adjust as needed).
    }
});


let navbar = document.querySelector('.header .navbar');
document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.add('active');
}
document.querySelector('#nav-close').onclick = () => {
    navbar.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.add('active');
}

document.querySelector('#close-search').onclick = () => {
    searchForm.classList.remove('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
    if (window.scrollY > 0) {
        document.querySelector('.header').classList.add('active');
    } else {
        document.querySelector('.header').classList.remove('active');
    }
};

window.onload = () => {
    if (window.scrollY > 0) {
        document.querySelector('.header').classList.add('active');
    } else {
        document.querySelector('.header').classList.remove('active');
    }
};
