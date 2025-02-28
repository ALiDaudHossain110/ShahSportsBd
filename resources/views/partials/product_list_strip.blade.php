
<x-layout>
    <div class="my-5 strip flex justify-center items-center flex-col text-center px-6">
        <section class="team-section max-w-6xl w-full">
            <div class="team_card-wrapper flex justify-center">
                <div class="team_grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <article class="team-member flex justify-center">
                            <li style="list-style: none;">
                                <x-product_card :product="$product"></x-product_card>
                            </li>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>
<style>
    .strip {
        display:block;
        position:relative;

        width: 100%;
        height: auto;
        overflow-x: auto; /* Enables horizontal scrolling */
        white-space: nowrap; /* Prevents wrapping */
        background: #f8f9fa;
        border-top: 2px solid #e0e0e0;
        border-bottom: 2px solid #e0e0e0;
        padding: 10px;
        scrollbar-width: none; /* Hides scrollbar in Firefox */
        -ms-overflow-style: none; /* Hides scrollbar in IE/Edge */

    }

    .team_card-wrapper {
        display: inline-flex; /* Ensures cards are in a row */
        gap: 1rem; /* Adjust spacing */
    }

    .team_grid {
        display: flex;
        flex-wrap: nowrap; /* Prevents wrapping */
        gap: 1rem;
    }


    </style>
