
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
            showAlert(data);
        })
        .catch(error => {
            console.error('Fetch Error:', error);
        });
    });

    function showAlert(message) {
        if (confirm(message)) {
            const inputFields = document.querySelectorAll('.input');
            inputFields.forEach(input => (input.value = ''));
    
            const textarea = document.querySelector('textarea[name="message"]');
            textarea.value = '';
        }
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
