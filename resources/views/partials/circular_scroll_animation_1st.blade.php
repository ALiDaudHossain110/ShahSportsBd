    <div class="circular_scroll">
        <div class="row">
            <div class="col-6">
                <img class="image_left" src="image/elliptical.png" alt="Elliptical">
            </div>
            <div class="col-6">
                <div class="vertical_col left">
                    <span><a href="#">Bikes</a></span>
                    <span><a href="#">Ellipticals</a></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="vertical_col">
                    <span><a href="#">Cross</a></span>
                    <span><a href="#">Trainers</a></span>
                </div>
            </div>
            <div class="col-6">
                <img class="image_right" src="image/bike.jpg" alt="Bike">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <img class="image_left" src="image/trademill1.jpg" alt="Elliptical">
            </div>
            <div class="col-6">
                <div class="vertical_col">
                    <span><a href="#">Treadmill</a></span>
                    <span><a href="#">Cardio</a></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="vertical_col right">
                    <span><a href="#">Home Appliance</a></span>
                </div>
            </div>
            <div class="col-6">
                <img class="image_right" src="image/trademill2.jpg" alt="Bike">
            </div>
        </div>
    </div>
    <style>
        /* Base layout styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 300vh;
            font-family: Arial, sans-serif;
        }

        .circular_scroll * {
            box-sizing: border-box !important;
        }

        .circular_scroll .row {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            min-height: 300px !important;
            margin-bottom: 100px !important;
        }

        .circular_scroll .row > .col-6 {
            display: block !important;
            flex: 0 0 50% !important;
            max-width: 50% !important;
            width: 50% !important;
            float: none !important;
            margin: 0 !important;
            padding: 10px !important;
            position: relative !important;
        }

        /* Image styles */
        .circular_scroll .row > .col-6 img {
            width: 100% !important;
            height: auto !important;
            display: block !important;
            object-fit: cover !important;
            opacity: 0;
            transform: translateY(100px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        /* Vertical column styles */
        .vertical_col {
            position: relative !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            height: 100% !important;
            width: 100% !important;
            gap: clamp(15px, 3vh, 30px) !important;
            opacity: 0;
            transform: translateY(100px);
        }

        .vertical_col span {
            display: block !important;
            text-align: center !important;
        }

        .vertical_col span a {
            text-decoration: none !important;
            writing-mode: vertical-rl !important;
            text-orientation: mixed !important;
            font-size: clamp(0.8rem, 1.5vw, 1.5rem) !important;
            font-weight: bold !important;
            color: #333 !important;
            letter-spacing: 2px !important;
            border-bottom: 2px solid rgb(32, 37, 41) !important;
            white-space: nowrap !important;
            display: inline-block !important;
            padding: clamp(3px, 0.8vw, 6px) 0 !important;
        }

        /* Enhanced bounce animation */
        @keyframes realBounce {
            0% {
                opacity: 0;
                transform: translateY(-300px) rotate(-180deg);
            }
            25% {
                opacity: 1;
                transform: translateY(50px) rotate(0deg);
            }
            35% {
                transform: translateY(-150px) rotate(0deg);
            }
            45% {
                transform: translateY(0) rotate(0deg);
            }
            55% {
                transform: translateY(-80px) rotate(0deg);
            }
            65% {
                transform: translateY(0) rotate(0deg);
            }
            75% {
                transform: translateY(-40px) rotate(0deg);
            }
            85% {
                transform: translateY(0) rotate(0deg);
            }
            92% {
                transform: translateY(-15px) rotate(0deg);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotate(0deg);
            }
        }

        @keyframes bounceOut {
            0% {
                opacity: 1;
                transform: translateY(0) rotate(0deg);
            }
            20% {
                transform: translateY(-50px) rotate(45deg);
            }
            100% {
                opacity: 0;
                transform: translateY(300px) rotate(180deg);
            }
        }

        /* Animation classes */
        .animate__visible {
            animation: realBounce 2s cubic-bezier(0.36, 0, 0.66, -0.56) forwards !important;
        }

        .animate__gone {
            opacity: 0 !important;
            transform: translateY(200px) !important;
        }

        /* Responsive styles remain the same */
        @media screen and (max-width: 768px) {
            .vertical_col {
                gap: clamp(10px, 2vh, 20px) !important;
            }
            .vertical_col span a {
                font-size: clamp(0.7rem, 1.2vw, 1.2rem) !important;
            }
        }
    </style>


    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Make sure to add the "animate__visible" class when visible
                    entry.target.classList.remove('animate__gone');
                    entry.target.classList.add('animate__visible');
                } else {
                    // When not in the viewport, add the "animate__gone" class
                    if (entry.target.classList.contains('animate__visible')) {
                        entry.target.classList.remove('animate__visible');
                        entry.target.classList.add('animate__gone');
                    }
                }
            });
        }, {
            threshold: 0.38,
            rootMargin: '0px 0px -50px 0px'
        });

        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.image_left, .image_right, .vertical_col');
            elements.forEach(element => observer.observe(element));
        });
    </script>
