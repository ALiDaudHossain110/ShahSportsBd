@props(['Data'])

<x-layout :Data="$Data">
    <div class="fullbody">
        <div class="verticle_search_bar sidebar-content">
        @include('partials.sidebar',['Data' => $Data])






        </div>
        <div class="sidebar-content">
    <div class="prod_display_area">
        @foreach($Data['products'] as $product)
            
            <article class="team-member flex justify-center product-card" data-brand="{{ $product->foreignkey_brand_iD }}" data-segment="{{ json_encode($product->foreignkey_productsegment_iD) }}">
                <li style="list-style: none;">
                    <x-product_card :product="$product"></x-product_card>
                </li>
            </article>
        @endforeach
    </div>
</div>
    </div>
</x-layout>

<style>
..fullbody {
    display: grid;
    height: 100vh;
    overflow: hidden; /* Prevent the body from scrolling */
    margin:0px;
    padding: 0px;
}

.verticle_search_bar {
    font-family: 'Arial', sans-serif;

    height: 100vh;
    position: fixed;
    left: 0vw;
    top: 15vh; /* Adjust if necessary */
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #2c3e50;
    border-radius: 8px; /* Rounded corners */
    padding: 20px 20px 20px 0px;
    margin:0px;
    box-sizing: border-box;
    overflow-y: auto;
    transition: all 0.3s ease; /* Smooth transition */
    width: 20%; /* Sidebar takes 1 part of the 4-part grid */
    z-index: 10; /* Ensure the sidebar is above the content */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */

}


.prod_display_area {
    margin-left: 25%; /* Leaves space for the sidebar */
    width: 80%; /* The remaining 3 parts for the product display area */
    height: 100vh;
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    padding: 15px;
    overflow-y: auto;
    transition: all 0.3s ease; /* Smooth transition for margin change */
}

.sidebar-content {
    height: 100%;
    overflow-y: auto;
    padding:0px 20px 0px 0px;
    
    
    /* Hide scrollbar for different browsers while maintaining functionality */
    scrollbar-width: none; /* For Firefox */
    -ms-overflow-style: none; /* For Internet Explorer and Edge */
}

/* Hide scrollbar for Chrome, Safari, and Opera */
.sidebar-content::-webkit-scrollbar {
    display: none;
}

.filter-checkbox {
    margin-right: 10px;
}

label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

input[type="checkbox"]:checked + label {
    background-color: #e2e2e2;
    font-weight: bold;
    color: #333;
}

</style>

