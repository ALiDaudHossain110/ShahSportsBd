<div class="row">
        <!-- Image Column -->
        <div class="col image-col" data-scroll_3rd>
            <img class="HomeGYmImg" src="image/HomeGym1.png" alt="Home Gym">
        </div>

        <!-- Text Column -->
        <div class="col text-col" data-scroll_3rd>
            <h3>HOME GYM</h3>
            <p>Build your dream gym at home with top-notch equipment designed for strength, flexibility, and endurance.</p>
            <a href="#" class="btn">Explore Now</a>
        </div>
    </div>
    <style>
        /* ===========================
           BASIC STYLING
        ============================ */

        /* ===========================
           ENHANCED SCROLL EFFECTS
        ============================ */
        [data-scroll_3rd] {
            opacity: 0;
            transform: translate3d(0, 50px, 0) scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            will-change: transform, opacity;
        }

        .image-col[data-scroll_3rd] {
            transform: translate3d(-60px, 50px, 0) scale(0.95);
        }

        .text-col[data-scroll_3rd] {
            transform: translate3d(60px, 50px, 0) scale(0.95);
        }

        [data-scroll_3rd].is-visible {
            opacity: 1;
            transform: translate3d(0, 0, 0) scale(1);
        }

        [data-scroll_3rd].is-hidden {
            opacity: 0;
            transform: translate3d(0, 50px, 0) scale(0.95);
            transition: opacity 0.6s ease-in, transform 0.6s ease-in;
        }

        /* ===========================
           PARALLAX DEPTH EFFECT
        ============================ */
        [data-scroll_3rd].is-visible img {
            transform: translateZ(20px) scale(1.02);
            transition: transform 0.8s ease-out;
        }

        /* ===========================
           IMAGE STYLING
        ============================ */
        .HomeGYmImg {
            width: 65vw;
            height: auto;
            margin-left: -15vw;

            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.16);
            transition: transform 0.6s cubic-bezier(0.19, 1, 0.22, 1), 
                        box-shadow 0.6s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .HomeGYmImg:hover {
            transform: scale(1.05) translateY(-8px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.24);
        }

        /* ===========================
           TEXT STYLING
        ============================ */
        .text-col {
            margin-left: 20vw;
            position: relative;
            z-index: 1;
        }

        .text-col h3 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        .text-col p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #007bff;
            color: white;
            font-size: 1rem;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        /* ===========================
           RESPONSIVE DESIGN
        ============================ */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                text-align: center;
            }

            .text-col {
                margin-left: 0;
                padding: 0 5vw;
            }

            .HomeGYmImg {
                width: 85vw;
                margin: 0 auto;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const element = entry.target;
                    if (entry.isIntersecting) {
                        element.style.transitionDelay = `${element.dataset.delay || '0'}s`;
                        element.classList.add('is-visible');
                        element.classList.remove('is-hidden');
                    } else {
                        element.classList.add('is-hidden');
                        element.classList.remove('is-visible');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('[data-scroll_3rd]').forEach((el, index) => {
                el.classList.add('is-hidden');
                el.dataset.delay = (index * 0.1).toFixed(2); // More natural delay
                observer.observe(el);
            });
        });
    </script>