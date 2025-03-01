@if(isset($Data))

<nav class="navbar navbar-expand-lg main-navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/image/ShahLogo.png" alt="Shahsports Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active top_link" href="#">Find All Stores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link phone-link top_link" href="tel:+880177777777">+880177777777</a>
        </li>
        <li class="nav-item">
          <a class="nav-link phone-link top_link" href="#"> 24 International Brands </a>
        </li>
        <li class="nav-item">
          <a class="nav-link top_link" href="#">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link top_link" href="#">Cart</a>
        </li>
      </ul>
      <form class="d-flex search-form" role="search">
        <input class="form-control me-2" type="search" placeholder="Search products...">
        <button class="btn search-btn text-white" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg secondary-navigation">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#secondaryNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="secondaryNav">
      <ul class="navbar-nav sec_list">
        
        <!-- <li class="nav-item">
          <a class="nav-link active" href="#">New Arrivals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sale</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li> -->


        @foreach($Data['producttypes'] as $producttype)
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{ $producttype->name }}
    </a>
    <ul class="dropdown-menu mega-dropdown p-3">
      <li>
        <div class="row">
          @if(is_array($producttype->foreignkey_subcategory_iD))
            @foreach($producttype->foreignkey_subcategory_iD as $prodsubcat)
              @php
                  $subcat = $Data['subcategories']->find($prodsubcat);
              @endphp
              <div class="col-md-4">
                <a href="/Product_list/sub_cat/{{$subcat->id}}"><h6 class="dropdown-header">{{ $subcat ? $subcat->name : 'Subcategory Not Found' }}</h6></a>
                <ul class="list-unstyled">
                  @if($subcat && is_array($subcat->foreignkey_productsegment_iD))
                    @foreach($subcat->foreignkey_productsegment_iD as $prodsegment)
                      @php
                          $segment = $Data['productSegment']->find($prodsegment);
                      @endphp
                      <li class="d-flex align-items-center gap-2">
                        @if($segment)
                        <img src="{{ asset('storage/' . $segment->image) }}" alt="{{ $segment->name }}" class="segment-img">
                        <a class="dropdown-item" href="/Product_list/prod_seg/{{$segment->id}}">{{ $segment->name }}</a>
                        @else
                          <span class="dropdown-item">Segment Not Found</span>
                        @endif
                      </li>
                    @endforeach
                  @else
                    <li><span class="dropdown-item">No Segments</span></li>
                  @endif
                </ul>
              </div>
            @endforeach
          @else
            <div class="col-md-12">
              <h6 class="dropdown-header">No Subcategories</h6>
            </div>
          @endif
        </div>
      </li>
    </ul>
  </li>
@endforeach

      </ul>
    </div>
  </div>
</nav> 
<nav class="navbar navbar-expand-lg tertiary-navigation">
  <div class="container d-flex justify-content-center">
    <div class="nav-container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tertiaryNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="tertiaryNav">
        <ul class="navbar-nav">
        @foreach($Data['productgenres'] as $productgenre)
          <li class="nav-item"><a class="nav-link " href="">{{ $productgenre->name }}</a></li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
</nav>

@endif
<style>

/* Mega dropdown full-width */
/* Mega dropdown full-width */
/* Mega dropdown full-width */
.mega-dropdown {
  width: auto;
  min-width: 600px; /* Adjust as needed */
  max-width: none; /* Removes width cap */
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 1rem;
  border: none;
  position: absolute; /* Absolute positioning */
  left: 50%; /* Position from the left of the viewport */
  top: 100%; /* Make sure it drops below the parent */
  transform: translateX(-50%); /* Shift the dropdown back by half of its width */
  z-index: 9999; /* Ensure the dropdown is above other elements */
}

/* Flex container for subcategories */
.mega-dropdown .row {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto; /* Scroll if content overflows */
}

/* Subcategory columns */
.mega-dropdown .col-md-4 {
  min-width: 250px; /* Wider columns */
  padding: 0 15px;
}

/* Subcategory header */
.mega-dropdown .dropdown-header {
  font-weight: 600;
  font-size: 1.1rem;
  border-bottom: 1px solid #dee2e6;
  margin-bottom: 0.5rem;
}

/* Segment items */
.mega-dropdown .dropdown-item {
  padding: 0.25rem 0;
  font-size: 0.95rem;
}
/* Segment image */
.segment-img {
  width: 30px;
  height: 30px;
  object-fit: cover;
  border-radius: 4px;
}

/* Hover effect */
.mega-dropdown .dropdown-item:hover {
  background-color: #f8f9fa;
  color: #007bff;
}

/* Image style within the dropdown */
.mega-dropdown img {
  max-width: 100%; /* Make sure images don’t overflow */
  height: auto; /* Maintain aspect ratio */
  display: block; /* Prevent any unwanted inline spacing */
  margin-bottom: 5px; /* Space between image and text */
}

/* Scrollbar for overflow */
.mega-dropdown .row::-webkit-scrollbar {
  height: 6px;
}

.mega-dropdown .row::-webkit-scrollbar-thumb {
  background-color: #007bff;
  border-radius: 4px;
}

/* Adjust dropdown alignment */
.nav-item.dropdown .dropdown-menu {
  left: 0;
  right: 0;
}

    /* First Navigation Styles */
    .main-navigation {
        background: #ffffff;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        padding: 0.2rem 0;
        position: sticky; /* Make it sticky */
        top: 0; /* Stick to the top */
    z-index: 1000; /* Ensure it stays above other content */

    }

    .main-navigation .navbar-brand img {
        height: 40px;
        width: auto;
        transition: transform 0.3s ease;
    }

    .main-navigation .nav-item {
        display: flex;
        align-items: center;
    }
    .top_link{

      color: #333 !important;
        font-weight: 500;
        font-size: 0.8rem; /* Smaller font size */
        padding: 0.2rem 2rem !important;
        transition: all 0.2s ease;
        display: inline-block;

    }
    .main-navigation .nav-link {
    }

    .main-navigation .nav-link:hover {
        color: #007bff !important;
        transform: translateY(-1px);
    }

    .main-navigation .nav-item:not(:last-child)::after {
        content: "|";
        color: #dee2e6;
        margin: 0 0.5rem;
        display: inline-block;
        vertical-align: middle;
        height: 10px;
        line-height: 10px;
    }

    .main-navigation .search-form {
        min-width: 300px;
    }

    /* Second Navigation Styles */
    .secondary-navigation {
        background: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        padding: 0.3rem 0; /* Reduced vertical padding */
        position: sticky; /* Make it sticky */
    top: 56px; /* Stick below the first navigation (adjust based on the height of the first nav) */
    z-index: 999; /* Ensure it stays below the first nav but above other content */

    }

    .secondary-navigation .nav-link {
        color: #495057 !important;
        font-weight: 500;
        padding: 0.1rem 1rem !important; /* Smaller padding */
        font-size: 0.9rem; /* Smaller font size */
        transition: all 0.2s ease;
        position: relative;
    }

    .secondary-navigation .nav-link.active::after {
        content: "";
        position: absolute;
        bottom: -0.3rem; /* Adjusted position */
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 2px;
        background: #007bff;
    }
/* Tertiary Navigation Styles */
.tertiary-navigation {
  background:transparent;
  margin: 0 auto;
  position: relative;
  z-index: 1;
  top: -10px; /* Moves the nav upward */
}

.tertiary-navigation .nav-container {
  background: #fff;
  border-radius: 0 0 15px 15px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.tertiary-navigation .navbar-nav {
  display: inline-flex;
  gap: 2rem;
  padding: 0 0rem;
}

.tertiary-navigation .nav-link {
  color: #495057 !important;
  font-weight: 500;
  padding: 0.8rem 0 !important;
  font-size: 0.9rem;
  position: relative;
  transition: all 0.3s ease;
}

/* Hover Effect */
.tertiary-navigation .nav-link:hover {
  color: #007bff !important;
  transform: translateY(-2px);
}

/* Active Link */
.tertiary-navigation .nav-link.active {
  color: #007bff !important;
  font-weight: 600;
}

.tertiary-navigation .nav-link.active::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 70%;
  height: 2px;
  background: #007bff;
  transition: all 0.3s ease;
}

/* Inactive Link */
.tertiary-navigation .nav-link:not(.active) {
  opacity: 0.7;
}

.tertiary-navigation .nav-link:not(.active):hover {
  opacity: 1;
}

/* Responsive Design */
@media (max-width: 991.98px) {
  .tertiary-navigation .nav-container {
    width: 100%;
    border-radius: 0;
  }

  .tertiary-navigation .navbar-nav {
    flex-direction: column;
    text-align: center;
    gap: 0;
    padding: 0;
  }

  .tertiary-navigation .nav-item {
    padding: 0.5rem 0;
  }

  .tertiary-navigation .nav-link.active::after {
    display: none;
  }
}
    @media (max-width: 991.98px) {
      .tertiary-navigation {
    max-width: fit-content;
  }

  .tertiary-navigation .nav-container {
    padding: 0 2rem;
  }


        .tertiary-navigation .navbar-nav {
            flex-direction: column;
            text-align: center;
            gap: 0;
            padding: 0;
        }

        .tertiary-navigation .nav-item {
            padding: 0.5rem 0;
        }

        .tertiary-navigation .nav-link.active::after {
            display: none;
        }
    }

    @media (min-width: 992px) {
        .tertiary-navigation {
            max-width: fit-content;
        }

        .tertiary-navigation .nav-container {
            padding: 0 2rem;
        }
    }
    /* Responsive Design */
    @media (max-width: 991.98px) {
        .secondary-navigation .navbar-collapse {
            padding: 0.5rem 0; /* Reduced mobile padding */
        }

        .secondary-navigation .nav-link {
            padding: 0.4rem !important;
            font-size: 0.85rem; /* Smaller mobile font */
        }

        .main-navigation .navbar-collapse {
            padding-top: 1rem;
        }
        
        .main-navigation .nav-item::after {
            display: none !important;
        }

        .main-navigation .search-form {
            width: 100%;
            margin-top: 1rem;
        }

        .secondary-navigation .navbar-collapse {
            padding: 1rem 0;
        }

        .secondary-navigation .nav-link {
            text-align: center;
            padding: 0.8rem !important;
        }

        .secondary-navigation .nav-link.active::after {
            width: 30%;
        }
    }

    @media (min-width: 992px) {
        .main-navigation .navbar-collapse {
            justify-content: space-between;
        }

        .secondary-navigation .navbar-nav {
            width: 100%;
            justify-content: center;
            gap: 0.8rem; /* Tighter gap between items */
        }
    }

    /* Custom Enhancements */
    .phone-link:hover {
        text-decoration: underline !important;
    }

    .search-btn {
        background: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        background: #0056b3;
        transform: translateY(-1px);
    }
</style>


<script>

document.addEventListener('DOMContentLoaded', function () {
  var dropdowns = document.querySelectorAll('.mega-dropdown');

  dropdowns.forEach(function (dropdown) {
    // Function to adjust dropdown position
    function adjustDropdownPosition() {
      var rect = dropdown.getBoundingClientRect();
      var windowWidth = window.innerWidth;

      // Check if the dropdown goes beyond the screen on the right
      if (rect.right > windowWidth) {
        var overflowRight = rect.right - windowWidth;
        dropdown.style.left = `calc(50% - ${overflowRight + 10}px)`; // Adjust by shifting left
      }

      // Check if the dropdown goes beyond the screen on the left
      if (rect.left < 0) {
        var overflowLeft = -rect.left;
        dropdown.style.left = `calc(50% + ${overflowLeft + 10}px)`; // Adjust by shifting right
      }
    }

    // Adjust dropdown position on opening
    dropdown.addEventListener('show.bs.dropdown', adjustDropdownPosition);

    // Adjust on window resize or when the dropdown visibility changes
    window.addEventListener('resize', adjustDropdownPosition);
  });
});

</script>