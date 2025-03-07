const words = ["Data scientist ",
"Artificial intelligence Developer",
"Full stack Developer ",
"DevOps Engineer ",
"Product Management ",
"Blockchain Engineer ",
"Architectural engineering ",
"Cybersecurity Engineer ",
"Database Administrator "];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typingElement = document.querySelector(".typing");

function type() {
    const currentWord = words[wordIndex];
    if (isDeleting) {
        typingElement.innerHTML = currentWord.substring(0, charIndex--);
    } else {
        typingElement.innerHTML = currentWord.substring(0, charIndex++);
    }
    
    let speed = isDeleting ? 100 : 150;
    
    if (!isDeleting && charIndex === currentWord.length) {
        speed = 1000; // Wait before deleting
        isDeleting = true;
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        speed = 500; // Pause before typing next word
    }
    
    setTimeout(type, speed);
}

type();




var sidenav = document.querySelector(".side-navbar")


function showNavbar()
{
sidenav.style.left="0"
}
function closeNavbar()
{

sidenav.style.left="-60%"
}