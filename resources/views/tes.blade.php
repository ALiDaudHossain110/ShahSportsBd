<div class="row circular_scroll_first ">

<div class="col">
<div class="verticle_col_first left" data-scroll>
    <span><a href="">Bikes</a></span>
    <span><a href="">Ellipticals</a></span>

</div>
<div class="verticle_col_first right" data-scroll>

    <span><a href="">Cross</a></span>
    <span><a href="">Trainers</a></span>

</div>
</div>
<div class="col ">
    <img class="image_left" src="image/elliptical.png" alt="Elliptical" data-scroll>
    <img class="image_right" src="image/bike.jpg" alt="Bike" data-scroll>

</div>

</div>
<style>
.circular_scroll{
    display:inline-block;
    position:relative;
    width:100%;

}
.circular_scroll_first img{
    width:60vw;

}

.circular_scroll_first .image_right{
    transform: rotate(-45deg);
    position: absolute;
    left:35vw;
    top:80vh;

}
.circular_scroll_first .image_left {
    transform: rotate(45deg);
    position: absolute;
    left:20vw;
    top:20vh;

}

.verticle_col_first{
    position: absolute;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100px;


}

.verticle_col_first span a{
    text-decoration:none;
    writing-mode: vertical-rl;
    font-size: clamp(1.2rem, 1vw, 1.8rem); 
    font-weight: bold;
    color: #333; /* Classic link blue */
    letter-spacing: 2px;
    border-bottom: 2px solid transparent;
    border-bottom-color:rgb(32, 37, 41);
    white-space: nowrap;
    text-orientation: mixed;
    padding: 8px 4px;
    display: inline-block;

    transition: all 0.3s ease;


}

.verticle_col_first span a:hover {
        color: #335; /* Darker blue on hover */
        border-bottom-color: #0066cc;
        transform: translateY(-2px);
    }

.verticle_col_first span a:active {
    color: #002266; /* Even darker on click */
}

.verticle_col_first.left{
    left:19vw;
    top:77vh;
    
}
.verticle_col_first.right{
    left:28vw;
    top:102vh;

}

[data-scroll] {
        opacity: 0;
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .verticle_col_first.left {
        transform: translateX(-50px) translateY(-50%);
    }

    .verticle_col_first.right {
        transform: translateX(50px) translateY(-50%);
    }

    .image_left, .image_right {
        transform: scale(0.8) rotate(0deg);
    }

    [data-scroll].is-visible {
        opacity: 1;
        transform: translateY(-50%) !important;
    }
    
    .image_right.is-visible {
        transform: rotate(-45deg) scale(1) !important;
    }

    .image_left.is-visible {
        transform: rotate(45deg) scale(1) !important;
    }
    .verticle_col_first.left.is-hidden {
        transform: translateX(-100px) translateY(-50%);
        opacity: 0;
    }

    .verticle_col_first.right.is-hidden {
        transform: translateX(-100px) translateY(-50%); /* Move left instead of right */
        opacity: 0;
    }

    .image_right.is-hidden {
        transform: translateX(-100px) rotate(-45deg) scale(0.8);
        opacity: 0;
    }
    
    .image_left.is-hidden {
        transform: translateX(-100px) rotate(45deg) scale(0.8);
        opacity: 0;
    }

    /* Active visible state */
    .verticle_col_first.left.is-visible {
        transform: translateX(0) translateY(-50%);
        opacity: 1;
    }

    .verticle_col_first.right.is-visible {
        transform: translateX(0) translateY(-50%);
        opacity: 1;
    }

    .image_right.is-visible {
        transform: translateX(0) rotate(-45deg) scale(1);
        opacity: 1;
    }
    
    .image_left.is-visible {
        transform: translateX(0) rotate(45deg) scale(1);
        opacity: 1;
    }
    /* Add exit animation states */
    .verticle_col_first.left:not(.is-visible) {
        transform: translateX(-50px) translateY(-50%);
    }

    .verticle_col_first.right:not(.is-visible) {
        transform: translateX(50px) translateY(-50%);
    }

    .image_left:not(.is-visible) {
        transform: rotate(-45deg) scale(0.8) !important;
    }

    .image_right:not(.is-visible) {
        transform: rotate(45deg) scale(0.8) !important;
    }


</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.35,
        rootMargin: '-100px'
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

    document.querySelectorAll('[data-scroll]').forEach(el => {
        el.classList.add('is-hidden'); // Start with hidden state
        observer.observe(el);
    });
});
</script>
