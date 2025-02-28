<div class="circular_scroll">

    <div class="row ">
        <div class="col">
            <img class="image_left" src="image/elliptical.png" alt="Elliptical"  >
        </div>

        <div class="col">
            <div class="vertical_col left"  >
                <span><a href="">Bikes</a></span>
                <span><a href="">Ellipticals</a></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="vertical_col right "  >
                <span><a href="">Cross</a></span>
                <span><a href="">Trainers</a></span>
            </div>
        </div>
        <div class="col">
            <img class="image_right" src="image/bike.jpg" alt="Bike"  >
        </div>
    </div>


    <div class="row">
        <div class="col">
            <img class="image_left" src="image/elliptical.png" alt="Elliptical"  >
        </div>

        <div class="col">
            <div class="vertical_col left"  >
                <span><a href="">Trademill</a></span>
                <span><a href="">Cardio</a></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="vertical_col right"  >
                <span><a href="">Home Appliance</a></span>
            </div>
        </div>
        <div class="col">
            <img class="image_right" src="image/bike.jpg" alt="Bike"  >
        </div>
    </div>


</div>

<style>
.circular_scroll {
  display: inline-block;
  position: relative;
  width: 100%;
  padding: 0px;
  height: clamp(50vw, 160vw, 400vw);
  top: clamp(2vh, 5vh, 50px);
}
.circular_scroll .row{
    margin-top:2vh;
    margin-bottom:2vh;
    margin-left:0vh;
    margin-right:0vh;
    position: relative;

}
.circular_scroll .col{
    margin-left:0vh;
    margin-right:0vh;
    /* position: relative; */
    padding:0px;

}
.circular_scroll img {
  width: clamp(40vw, 65vw, 80vw);
  height: auto;
  object-fit: cover;
}
.vertical_col{
    position: absolute;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: clamp(20px, 4vh, 40px);
  width: clamp(80px, 10vw, 100px);

}

.vertical_col span a {
  text-decoration: none;
  writing-mode: vertical-rl;
  font-size: clamp(1.2rem, 2vw, 1.8rem);
  font-weight: bold;
  color: #333;
  letter-spacing: 2px;
  border-bottom: 2px solid rgb(32, 37, 41);
  white-space: nowrap;
  text-orientation: mixed;
  padding: clamp(4px, 1vw, 8px) clamp(2px, 0.5vw, 4px);
  display: inline-block;
  transition: all 0.3s ease;
}

.vertical_col span a:hover {
        color: #335; /* Darker blue on hover */
        border-bottom-color: #0066cc;
        transform: translateY(-2px);
    }

.vertical_col span a:active {
    color: #002266; /* Even darker on click */
}

.vertical_col.left {
  /* left: clamp(10vw, 19vw, 228px); */
  right: clamp(2vw, 15vw, 40vw);
  top: clamp(10vw, 20vw, 444px);
}

.circular_scroll.image_left {
  /* left: clamp(10vw, 19vw, 228px); */
  left: clamp(0vw, 15vw, 40vw);
  top: clamp(10vw, 20vw, 444px);
}

.vertical_col.right {
  left: clamp(2vw, 15vw, 40vw);
  top: clamp(10vw, 20vw, 444px);
}
.circular_scroll.image_right {
  /* left: clamp(10vw, 19vw, 228px); */
  right: clamp(0vw, 3vw, 4vw);
  top: clamp(10vw, 20vw, 444px);
}
</style>




