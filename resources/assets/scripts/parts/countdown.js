document.addEventListener('DOMContentLoaded', function () {
    const countdownElements = document.querySelectorAll('[data-countdown]');

    countdownElements.forEach(el => {
        const targetDate = new Date(el.getAttribute('data-countdown')).getTime();
        const displayEl = el.querySelector('div') ? el : document.createElement('div');
        if (!el.querySelector('div')) el.appendChild(displayEl);

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance <= 0) {
                displayEl.innerHTML = `<div>Event Started</div>`;
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            displayEl.innerHTML = `
                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                    <div class="roboto-medium font30 leading26 space-03 text-white">${days}</div>
                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Days</div>
                </div>
                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                    <div class="roboto-medium font30 leading26 space-03 text-white">${hours}</div>
                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Hours</div>
                </div>
                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                    <div class="roboto-medium font30 leading26 space-03 text-white">${minutes}</div>
                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Mins</div>
                </div>
                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                    <div class="roboto-medium font30 leading26 space-03 text-white">${seconds}</div>
                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Secs</div>
                </div>`;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
});
