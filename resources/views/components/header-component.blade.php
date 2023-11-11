  <header class="header">
      <nav class="navbar">
          <div class="front_container">
              <div class="navbar__wrapper">
                  <div class="navbar__logo">
                      <a href="{{route('front.home')}}">
                          <img src="{{ url('storage/' . $settings->logo) }}" alt="" />
                      </a>
                  </div>
                  <div class="navbar__center">
                      <div class="navbar__links">
                          <ul>
                              <li><a href="{{route('front.home')}}">{{__('nav-links.home')}}</a></li>
                              <li><a href="{{route('front.blogs')}}">{{__('nav-links.blogs')}}</a></li>
                              <li><a href="{{route('front.write')}}">{{__('nav-links.write')}}</a></li>
                              <li><a href="{{route('front.contact')}}">{{__('nav-links.contact')}}</a></li>
                              @guest
                              <li><a href="{{route('front.user.login')}}">{{__('nav-links.login')}}</a></li>
                              @endguest
                              @auth
                              <li><a href="{{route('front.user')}}">{{__('nav-links.account')}}</a></li>
                              <li><a id="exit-button" href="{{route('front.user.logout')}}">{{__('nav-links.exit')}}</a></li>
                              @endauth
                              <li class="language">
                                  @foreach(LaravelLocalization::getSupportedLocales() as $localeKey => $properties)
                                  <a href="{{ LaravelLocalization::getLocalizedURL($localeKey) }}">
                                      {{ $localeKey }}
                                  </a>
                                  @endforeach


                              </li>

                          </ul>
                      </div>
                      <div class="navbar__last">
                          <form action="{{route('front.search')}}" class="navbar__last__search">
                              <div>
                                  <input name="q" type="text" />
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                      <path d="M6.90906 2C5.93814 2 4.98903 2.28791 4.18174 2.82733C3.37444 3.36674 2.74524 4.13343 2.37368 5.03045C2.00213 5.92746 1.90491 6.91451 2.09433 7.86677C2.28375 8.81904 2.75129 9.69375 3.43783 10.3803C4.12438 11.0668 4.99909 11.5344 5.95135 11.7238C6.90362 11.9132 7.89067 11.816 8.78768 11.4444C9.6847 11.0729 10.4514 10.4437 10.9908 9.63639C11.5302 8.8291 11.8181 7.87998 11.8181 6.90906C11.818 5.60712 11.3008 4.35853 10.3802 3.43792C9.45959 2.51731 8.211 2.00008 6.90906 2Z" stroke="#52525B" stroke-width="1.5" stroke-miterlimit="10" />
                                      <path d="M10.5715 10.5716L14 14" stroke="#52525B" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" />
                                  </svg>
                              </div>
                          </form>

                      </div>
                  </div>
                  <div class="navbar__hamburger">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </div>
          </div>
      </nav>
      @yield('headbody')
  </header>
