// resources/js/custom-scripts.js

// Example: A simple function to log a message
function greetUser(name) {
    console.log(`Hello, ${name}! Welcome to our sports website.`);
}

// Example: Code for your mobile menu closing (if you put it here)
document.addEventListener('DOMContentLoaded', function() {
    var navbarCollapse = document.getElementById('navbarNav');
    if (navbarCollapse) { // Check if the element exists
        var navLinks = navbarCollapse.querySelectorAll('.nav-link');
        var bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });

        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Only close if the navbar is currently open
                if (navbarCollapse.classList.contains('show')) {
                    bsCollapse.hide();
                }
            });
        });
    }
});

// You can export functions if you want to use them in other JS files
// export { greetUser };