@if(isset($Data))
    <div class="nav navbod flex-column">
        <h3 class="navbod-h3">Shop by Category</h3>

        <!-- Brands Section -->
        <div class="sub-menu">
            <a href="#" class="nav-link navbod-link" data-bs-toggle="collapse" data-bs-target="#brandsMenu" aria-expanded="false" aria-controls="brandsMenu">
                <span class="icon">
                </span>
                <span class="description">Brands <i class="bi bi-caret-down-fill"></i> </span>
            </a>
            <div class="collapse navbod-collapse" id="brandsMenu">
                @foreach($Data['Brand'] as $Brand)
                    <div href="#" class="form-check navbod-link">
                        <input class="form-check-input brand-checkbox" type="checkbox" value="{{ $Brand->id }}" id="brand{{ $Brand->id }}">

                        <span class="icon">
                            <img src="{{ asset('storage/' . $Brand->image) }}" alt="{{ $Brand->name }}" class="navbod-segment-img">
                        </span>
                        <span class="description">{{ $Brand->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Subcategories and Segments -->
        <div class="sub-menu">
            @foreach($Data['subcategories'] as $index => $subcats)
                <a href="#" class="nav-link navbod-link" data-bs-toggle="collapse" data-bs-target="#submenu{{$index}}" aria-expanded="false" aria-controls="submenu{{$index}}">
                    <span class="icon">
                        <img src="{{ asset('storage/' . $subcats->image) }}" alt="{{$subcats->name}}">
                    </span>
                    <span class="description">{{$subcats->name}} <i class="bi bi-caret-down-fill"></i> </span>
                </a>

                <div class="collapse navbod-collapse" id="submenu{{$index}}">
                    @foreach($subcats->foreignkey_productsegment_iD as $prodsegment)
                        @php
                            $segment = $Data['productSegment']->find($prodsegment);
                        @endphp
                        @if($segment)
                            <div href="#" class="form-check navbod-link">
                                
                            <input class="form-check-input segment-checkbox" 
                                type="checkbox" 
                                value="{{ $segment->id }}" 
                                id="segment{{ $segment->id }}"  
                                {{ in_array($segment->id, array_map(function($item) { return $item->id; }, $Data['segmentlist'])) ? 'checked' : '' }}>

                                <span class="icon">
                                    <img src="{{ asset('storage/' . $segment->image) }}" alt="{{ $segment->name }}" class="navbod-segment-img">
                                </span>
                                <span class="description">{{ $segment->name }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
@endif

<style>
/* Basic reset for padding, margin */

/* Navigation container */
.navbod {
    padding: 20px 20px 20px 0px;
}

/* Submenu styling */
.sub-menu {
    margin-bottom: 20px;
}

/* Styling the main menu link */
.navbod-link {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    color: #ecf0f1; /* Lighter color for text */
    font-size: 5px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.2s ease, color 0.3s;
    position: relative;
}

/* Hover effect on menu links */
.navbod-link:hover {
    background-color: #34495e; /* Subtle dark blue-gray for hover effect */
    transform: scale(1.05);
    color: #3498db; /* Highlighted color on hover */
}

/* Icon styling */
.navbod-link .icon {
    margin-right: 12px;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Description text styling */
.navbod-link .description {
    flex-grow: 1;
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 500;
}

/* Submenu collapse styling */
.navbod-collapse {
    margin-left: 20px;
    padding-left: 20px;
    border-left: 3px solid #34495e; /* Slightly thicker divider for submenu */
}

/* Submenu link styling */
.collapse .navbod-link {
    font-size: 14px;
    color: #bdc3c7; /* Lighter color for submenu links */
}

.collapse .navbod-link:hover {
    color: #3498db; /* Highlight submenu items on hover */
    background-color: #34495e; /* Same hover background as main links */
}

/* Dropdown icon */
.navbod-link .bi-caret-down-fill {
    margin-left: 5px;
    font-size: 12px;
    color: #bdc3c7; /* Light icon color */
}

/* Add transition effect on collapsing */
.collapse {
    transition: all 0.3s ease-in-out;
}

/* Optional: Adjusted link for active states */
.navbod-link.active {
    background-color: #3498db; /* Blue highlight for active link */
    color: white;
}

/* Optional: Adjusting color on hover for submenu */
.collapse .navbod-link:hover {
    color: #ffffff; /* White color for hover effect on submenu */
}

/* Styling the images to look like icons */
.navbod-link .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px; /* Set width for icon size */
    height: 40px; /* Set height for icon size */
    border-radius: 50%; /* Makes the image circular */
    overflow: hidden; /* Ensures the image fits within the circle */
    background-color: #ecf0f1; /* Light background for icon */
    margin-right: 15px; /* Space between icon and description */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Optional: subtle shadow for better design */
}

/* Make the image fill the circle while maintaining aspect ratio */
.navbod-link .icon img {
    width: 100%; /* Image takes full width of its container */
    height: 100%; /* Image takes full height of its container */
    object-fit: cover; /* Ensures the image covers the area without distortion */
}

/* Hover effect for nav links */
.navbod-link:hover .icon {
    background-color: rgb(212, 244, 68); /* Change background on hover */
    box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3); /* Optional: subtle shadow on hover */
}

.navbod-link:hover .description {
    color: #3498db; /* Change text color on hover */
}

/* Styling for segment images */
.navbod-segment-img {
    width: 100%; /* Make the image fill its container */
    height: 100%; /* Ensure the image takes the full height of the container */
    object-fit: cover; /* Crop and cover the container area */
    border-radius: 4px; /* Rounded corners for the segment image */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Optional: subtle shadow for segment image */
}

/* Styling for header */
.navbod-h3 {
    /* top:5vh; */
    font-size: 16px; /* Slightly larger size for emphasis */
    font-weight: 600; /* Semi-bold font weight for clarity */
    color: #ecf0f1; /* Light text color to contrast with dark background */
    text-transform: uppercase; /* Uppercase letters for a more professional look */
    letter-spacing: 1px; /* Slight spacing between letters for clarity */
    margin-bottom: 15px; /* Space below the header */
    padding-left: 20px; /* Padding to align with the content */
    border-left: 4px solid #3498db; /* Blue accent line to the left of the header */
    font-family: 'Arial', sans-serif; /* Clean, modern font */
    /* position: sticky; */
}

/* Optional: Adding a hover effect for a more interactive feel */
.navbod-h3:hover {
    color: #3498db; /* Blue color on hover for a professional touch */
    border-left-color: #2ecc71; /* Change the border color to green on hover */
    transition: all 0.3s ease-in-out; /* Smooth transition for the hover effect */
}

.form-check-input{
    margin-right:5px;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Arrays to hold the selected values
    const selectedBrands = [];
    const selectedSegments = [];

    // Function to update filters
    function updateFilters() {
        // Clear previous selections
        selectedBrands.length = 0;
        selectedSegments.length = 0;

        // Get the values of checked brand checkboxes
        document.querySelectorAll('.brand-checkbox:checked').forEach(checkbox => {
            selectedBrands.push(checkbox.value);
        });

        // Get the values of checked segment checkboxes
        document.querySelectorAll('.segment-checkbox:checked').forEach(checkbox => {
            selectedSegments.push(checkbox.value);
        });

        // Filter the product cards based on current selections
        filterProducts();
    }

    // Function to show/hide product cards
    function filterProducts() {
        document.querySelectorAll('.product-card').forEach(card => {
            const cardBrand = card.getAttribute('data-brand');
            // Use a fallback in case data-segment is missing or malformed
            const cardSegments = JSON.parse(card.getAttribute('data-segment') || '[]');

            // Determine if the card should be shown
            const isBrandSelected = selectedBrands.length === 0 || selectedBrands.includes(cardBrand);
            const isSegmentSelected = selectedSegments.length === 0 || cardSegments.some(segment => selectedSegments.includes(segment));

            // Show or hide the card
            card.style.display = (isBrandSelected && isSegmentSelected) ? '' : 'none';
        });
    }

    // Attach change listeners to checkboxes
    document.querySelectorAll('.brand-checkbox, .segment-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateFilters);
    });

    // Run the filter on page load (to catch any pre-checked boxes)
    updateFilters();
});

</script>