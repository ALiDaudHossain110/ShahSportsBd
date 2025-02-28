@if(isset($product))
    <div class="team-member">
    <p class="hide_p">{{$product->discount_percentage}}</p>
    @if($product->discount_percentage !== 0)
            <div class="discount-label">-{{$product->discount_percentage}}% OFF</div>
        @endif
        <div class="image-container">
            <img src="{{ asset('storage/' . $product->image1) }}" alt="{{$product->name}}" class="member-image">
        </div>
        <div class="member-info">
            <a href="#" class="member-link">
                <h4 class="brand-name">{{$product->brand}}</h4>
                <h4 class="product-name">{{$product->name}}</h4>
                <h4 class="product-name">{{$product->discount_percentage}}</h4>
                <h4 class="price">
                    TK: 
                    @if($product->discount_rate !== null)
                        <span class="original-price">TK {{$product->sell_price}}</span>
                        TK {{ $product->sell_price - ($product->sell_price * $product->discount_rate / 100) }}
                    @else
                        {{$product->sell_price}}
                    @endif
                </h4>
            </a>
        </div>
    </div>
@endif
<style>
    .hide_p{
        /* display:none; */
    }
    .team-member {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    flex: 0 0 280px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    position: relative;
    padding-bottom: 1.5rem;
}

.image-container {
    width: 100%;
}

.member-image {
    width: 100%;
    height: 320px;
    object-fit: cover;
    clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
    transition: clip-path 0.3s ease;
}

.member-info {
    padding: 1.5rem;
    position: relative;
    text-align: center;
}

.brand-name {
    font-size: 0.9rem;
    font-weight: 600;
    color: #ff6b6b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}

.product-name {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2b2d42;
    margin-bottom: 8px;
}

.price {
    font-size: 1.2rem;
    font-weight: 600;
    color: #000;
}

.original-price {
    text-decoration: line-through;
    color: #a0a0a0;
    margin-right: 8px;
    font-size: 1rem;
}

.member-info a {
    text-decoration: none;
    display: block;
}

/* Discount Label */
.discount-label {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ff3b30;
    color: white;
    font-size: 0.85rem;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
}

/* Hover Effects */
.team-member:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
}

.team-member:hover .member-image {
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}

</style>