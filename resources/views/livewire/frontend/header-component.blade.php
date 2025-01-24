<div>
  <style>
    .goog-te-combo {
      background-color: transparent;
      border: none;
      color: #222222;
      font-family: "Montserrat", sans-serif;
      font-size: 13px;
      font-weight: 600;
    }
    .goog-te-gadget .goog-te-combo {
        margin: 1px 0;
    }
    .menu-dropdown {
      font-size: 1.8em;
      padding: 0 15px;
    }
    .dropdown-menu.show {
      margin-left: 5px !important;
      position: absolute;
      transform: translate3d(33px, 102px, 0px) !important;
      top: 0px;
      left: 0px;
      will-change: transform;
      min-width: 24rem !important;
    }
    .close-menu-button {
      display: none;
    }
    @media (max-width: 991px) {
      .mobile-nav {
        padding-right: 27px;
      }
    }

    @media (max-width: 991px) {
      .close-menu-button {
        float: right;
        font-size: x-large;
        padding: 0px 10px;
        display: block;
      }
      .top-menu {
        margin-top: 33px !important;
      }
    }
 @media (max-width: 480px) {
     #topbar input[type="text"] {
        padding: 6px;
        margin-bottom: 26px;
        font-size: 17px;
        width: 80px;
        height: 30px;

    }
    #topbar .search-container button {
    margin-right: -25px;
}
 }
  </style>
  <link
    href="{{ asset('assets/css/menu.css') }}"
    rel="stylesheet"
  />
  <header class="header trans_200">

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
         <div id="google_translate_element" style="margin-top: 67px;"></div>
      </div>
      <div class="social-links d-md-flex align-items-center pt-2">
        <div class="contact-links">
          <span class="pl-2"><i class="fa fa-phone-square"></i> +254 726 634 673</span>
          <span class="pl-2"><i class="fa fa-envelope-square"></i> info@pullmanexcavatorskenya.com</span>
        </div>

        <div class="social">
          <a href="#" target="_blank" rel="noopener noreferrer"class="facebook ml-5"><i class="fab fa-facebook" style="color: white;"></i></a>
          <a href="#"target="_blank" rel="noopener noreferrer" class="twitter"><i class="fab fa-twitter" style="color: white;"></i></a>
          <a href="https://wa.me/254726634673?text=Hello.+I+got+your+contacts+from+your+website+and+I%27m+interested+in+your+services." target="_blank" rel="noopener noreferrer"class="instagram"><i class="fab fa-whatsapp" style="color: white;"></i></a>
          <a href="#"target="_blank" rel="noopener noreferrer" class="linkedin mr-5"><i class="fab fa-linkedin" style="color: white;"></i></i></a>
        </div>

          <div class="search-container">
            <form wire:submit.prevent="search">
              <input type="text" wire:model="query" class="media_title" placeholder="Search..." style="color: white; !important" required>
              @error('query')
                  <span
                      class="error text-danger"
                      >{{ $message }}</span
                  >
              @enderror
              <button type="submit" ><i class="fa fa-search"></i></button>
            </form>
          </div>
      </div>
      </div>
    </section>
  <!-- Header Content -->
  <div class="header_container">
  <div class="container">
  <div class="row">
    <div class="container d-flex align-items-center justify-content-between">

       <h2 class="logo"><a href="{{route('homepage.index')}}">
            <img style="height:60px; width:150px;" src="{{ asset('images/logo_pullman-rsz.png') }}">
          </a></h2>
          <div class="mobile-nav hamburger ml-auto"><i class="open-menu fa fa-bars" aria-hidden="true"></i></div>
          <nav id="navbar" class="navbar">
            <div class="close-menu-button">
              <i class="fa fa-times" aria-hidden="true"></i>
            </div>

            <ul class="top-menu">
              <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('home') }}" href="{{route('homepage.index')}}">Home</a></li>
              <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('aboutUs') }}" href="{{route('frontend.aboutus')}}">About Us</a></li>
              <li class="menu-item has-sub-menu dropdown nav-item">
                <a href="{{route('frontend.whatWeDo')}}" class="nav-link {{ $this->checkActivePage('whatWeDo') }}" ><span>What We Do</span>
                  <span class="show-sub-menu"><i class="fa fa-plus"></i></span>
                  <span class="close-sub-menu"><i class="fa fa-times"></i></span>
                </a>
                <ul class="sub-menu">
                  @forelse ($whatWeDos as $whatWeDo)
                    <li class="menu-item"><a href="{{route('frontend.whatWeDo.page', ['slug'=>$whatWeDo->slug])}}" >{{$whatWeDo->title}}</a></li>
                  @empty
                  @endforelse
                </ul>
              </li>
              <li class="menu-item has-sub-menu dropdown nav-item">
                <a href="{{route('frontend.latest')}}" class="nav-link {{ $this->checkActivePage('latest') }}" ><span>Latest</span>
                  <span class="show-sub-menu"><i class="fa fa-plus"></i></span>
                  <span class="close-sub-menu"><i class="fa fa-times"></i></span>
                </a>
                <ul class="sub-menu">
                  @forelse ($categories as $category)
                    <li class="menu-item"><a href="{{route('frontend.blog.categories',['categorySlug'=>$category->slug])}}" >{{$category->name}}</a></li>
                  @empty

                  @endforelse
                  <!-- <li class="menu-item"><a href="{{route('frontend.events')}}">Events</a></li> -->
                </ul>
              </li>

              <!-- <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('cop27') }}" href="{{route('frontend.cop27')}}" class="nav-link scrollto">COP28</a>
              </li>  <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('ACED') }}" href="#" class="nav-link scrollto">ACED</a>
              </li>
               <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('publications') }}" href="{{route('frontend.publications')}}" class="nav-link scrollto">Publications</a>
              </li>
              <li class="menu-item nav-item"><a class="nav-link {{ $this->checkActivePage('media') }}" href="{{route('frontend.media')}}"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
              </li>
              <li class="menu-item dropdown nav-item"><a class="nav-link {{ $this->checkActivePage('joinUs') }}" href="{{route('frontend.careers')}}"><span>Join Us</span> <i class="bi bi-chevron-down"></i></a>
              </li> -->
              <!-- <li class="menu-item dropdown nav-item"><a class="nav-link {{ $this->checkActivePage('contactUs') }}" href="{{route('frontend.contactUs')}}"><span>Get a Quote</span> <i class="bi bi-chevron-down"></i></a>
              </li> -->
              <li class="menu-item dropdown nav-item"><a class="nav-link {{ $this->checkActivePage('contactUs') }}" href="{{route('frontend.contactUs')}}"><span>Contact Us</span> <i class="bi bi-chevron-down"></i></a>
              </li>
            </ul>

          </nav>
        </div>
  </div>
  </div>
  </div>
  </header>
  <script>
    const open_menu = document.querySelector('.open-menu');
    const close_menu = document.querySelector('.close-menu-button');
    const navbar = document.querySelector('.navbar');

    open_menu.addEventListener('click', toggleMenu);
    close_menu.addEventListener('click', toggleMenu);


    function toggleMenu () {
      navbar.classList.toggle('is-active');
    }

    const show_sub_menu = document.querySelectorAll('.show-sub-menu');
    show_sub_menu.forEach(function(item){
      item.addEventListener('click', function(e){
        e.preventDefault();
        const grandParent = this.parentNode.parentNode;
        this.parentNode.querySelector('.show-sub-menu').style.display = 'none';
        this.parentNode.querySelector('.close-sub-menu').style.display = 'block';
        let sub_menu = grandParent.querySelector('.sub-menu');
        sub_menu.style.display = 'block';
      })
    })

    const close_sub_menu = document.querySelectorAll('.close-sub-menu');
    close_sub_menu.forEach(function(item){
      item.addEventListener('click', function(e){
        e.preventDefault();
        this.parentNode.querySelector('.show-sub-menu').style.display = 'block';
        this.parentNode.querySelector('.close-sub-menu').style.display = 'none';
        this.parentNode.parentNode.querySelector('.sub-menu').style.display = 'none';
      })
    })
  </script>
</div>
