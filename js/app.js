let menu = document.querySelector('#menu-icon');
let navlist = document.querySelector('.navlist');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
};

const sr = ScrollReveal ({
    distance: '50px',
    duration: 2550,
    reset: true
});

sr.reveal('.home-text span',{delay:300});
sr.reveal('.home-text h1',{delay:400, origin: 'left'});
sr.reveal('.home-text p',{delay:510, origin: 'left'});
sr.reveal('.icons',{delay:620, origin: 'top'});
sr.reveal('.main-btnn',{delay:720, origin: 'bottom'});
sr.reveal('.home-img',{delay:820, origin: 'right'});
sr.reveal('.social',{delay:920, origin: 'top'});

function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

    document.getElementById('toggle-password').addEventListener('change', function() {
        const passwordFields = [
            document.getElementById('ww'),
            document.getElementById('ww-h')
        ];

        passwordFields.forEach(field => {
            if (this.checked) {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        });
    });

   
