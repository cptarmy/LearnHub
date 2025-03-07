document.addEventListener('DOMContentLoaded', function() {
    const reviewCards = document.querySelectorAll('.review-card');
    let currentCardIndex = 0;

    function showCard(index) {
        reviewCards.forEach(card => card.classList.remove('active'));
        reviewCards[index].classList.add('active');
    }

    function nextCard() {
        currentCardIndex = (currentCardIndex + 1) % reviewCards.length;
        showCard(currentCardIndex);
    }

    showCard(currentCardIndex); // Show the first card initially
    setInterval(nextCard, 5000); // Change card every 5 seconds
});