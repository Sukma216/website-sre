const container = document.querySelector('.activity-conten');
const cards = document.querySelectorAll('.ac-card');

container.addEventListener('scroll', () => {
  let containerCenter = container.scrollLeft + container.offsetWidth / 2;

  let closestCard = null;
  let closestDistance = Infinity;

  cards.forEach(card => {
    const cardCenter = card.offsetLeft + card.offsetWidth / 2;
    const distance = Math.abs(containerCenter - cardCenter);

    if (distance < closestDistance) {
      closestDistance = distance;
      closestCard = card;
    }
  });

  cards.forEach(card => card.classList.remove('active'));
  if (closestCard) closestCard.classList.add('active');
});

// Trigger once on load
window.addEventListener('load', () => {
  container.dispatchEvent(new Event('scroll'));
});


