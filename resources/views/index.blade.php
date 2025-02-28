@props(['Data'])

<x-layout :Data="$Data">
    <div >
        <x-index_carousel :Data="$Data['HomepageCarouselImages']" />
    </div>
    
    <div style="text-align: center; margin-bottom: 40px; position: relative; z-index: 1;">
        <h3 style="font-size: 24px; color: #333; font-weight:bold;">Our Brands, Our Strength</h3>
        <x-index_brandCarousel :Data="$Data['Brand']" />
    </div>
    <div style="text-align: center; z-index: 1; ">
        <h3 style="font-size: 24px; color: #333; font-weight:bold;">Products On Offer</h3>
        @include('partials.product_list_strip', ['products' => $Data['products']])
    </div>
    <div style="text-align: center; z-index: 1; ">
        <h3 style="font-size: 24px; color: #333; font-weight:bold;">Upcoming Products</h3>
        @include('partials.product_list_strip', ['products' => $Data['products']])
    </div>
    <div>
        @include('partials.circular_scroll_animation_1st')
    </div>

    <div style=" text-align: center; z-index: 1; ">
        <h3 style="font-size: 24px; color: #333; font-weight:bold;">Featured Products</h3>
        @include('partials.product_list_strip', ['products' => $Data['products']])
    </div>

    <div style="text-align: center; margin-bottom: 40px; position: relative; z-index: 1;">
        <h3 style="font-size: 24px; color: #333; font-weight:bold;">Our Clients</h3>
        <x-index_clientCarousel :Data="$Data['Brand']" />
    </div>

</x-layout>
<style>
    /* .circular_scroll_first{
    display:inline-block;
    position:relative;
    width:100%;
    height:300vh;
    top:5vh;

} */

</style>