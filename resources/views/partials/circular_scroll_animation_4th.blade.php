<div class="row">
    <!-- Image Column -->

    <!-- Text Column -->
    <div class="col text-col_forth" data-scroll_4th>
        <h3>Outdoor GYM</h3>
        <p>Build your dream Outdoor Gym at Park, backyard with top-notch equipment designed for strength, flexibility, and endurance.</p>
        <a href="#" class="btn">Explore Now</a>
    </div>

    <div class="col image-col" data-scroll_4th>
        <img class="HomeGYmImg_forth" src="image/OutdoorGym.png" alt="Home Gym">
    </div>

</div>

<style>
    /* ===========================
       GLOBAL STYLING
    ============================ */
    /* .row {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5vw;
        padding: 50px;
        max-width: 1200px;
        margin: 0 auto;
        overflow: hidden;
    }

    .col {
        flex: 1;
        position: relative;
    } */

    /* ===========================
       IMAGE STYLING
    ============================ */
    .HomeGYmImg_forth {
        width: 50vw;
        height: auto;
        /* margin-left: 5vw; */
        border-radius: 16px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    /* Hover Effect */
    .HomeGYmImg_forth:hover {
        transform: scale(1.08) translateY(-10px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        cursor: pointer;
    }

    /* ===========================
       TEXT STYLING
    ============================ */
    .text-col_forth {
        margin-left: -30vw;

    }
    .text-col_forth h3 {
        font-size: 2.8rem;
        margin-bottom: 20px;
        color: #333;
    }

    .text-col_forth p {
        font-size: 1.2rem;
        line-height: 1.6;
        color: #555;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* ===========================
       SCROLL IN/OUT EFFECTS
    ============================ */
    [data-scroll_4th] {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.7s ease-out, transform 0.7s ease-out;
    }

    [data-scroll_4th].is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    [data-scroll_4th].is-hidden {
        opacity: 0;
        transform: translateY(50px);
    }

    /* ===========================
       RESPONSIVE DESIGN
    ============================ */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
            padding: 20px;
            text-align: center;
        }

        .HomeGYmImg_forth {
            width: 85vw;
            margin: 0 auto;
        }

        .text-col_forth h3 {
            font-size: 2rem;
        }

        .text-col_forth p {
            font-size: 1rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = {
        threshold: 0.2
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                entry.target.classList.remove('is-hidden');
            } else {
                entry.target.classList.add('is-hidden');
                entry.target.classList.remove('is-visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-scroll_4th]').forEach(el => {
        el.classList.add('is-hidden'); // Initial hidden state
        observer.observe(el);
    });
});
</script>
