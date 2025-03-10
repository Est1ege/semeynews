<header class="uc-header header-two uc-navbar-sticky-wrap z-999" data-uc-sticky="sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
            <nav class="uc-navbar-container shadow-xs bg-white dark:bg-gray-900 fs-6 z-1">
                <div class="uc-center-navbar panel z-2">
                    <div class="container max-w-xl">
                        <div class="uc-navbar min-h-72px lg:min-h-100px text-gray-900 dark:text-white" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                            <div class="uc-navbar-left">
                            </div>
                            <div class="uc-navbar-center">
                                <div class="uc-logo text-black dark:text-white">
                                    <a href="{{ route('home') }}">
                                        <img class="w-80px text-dark dark:text-white" src="{{ asset('assets/images/demo-two/common/logo.svg') }}" alt="News5" data-uc-svg>
                                    </a>
                                </div>
                            </div>
                            <div class="uc-navbar-right">
                                <div class="uc-navbar-item">
                                    <!-- <a class="uc-account-trigger btn btn-sm gap-narrow border-0 p-0 duration-0 dark:text-white" href="#uc-favorites-modal" data-uc-toggle>
                                        <i class="icon icon-1 fw-medium unicon-bookmark"></i>
                                        <span class="cstack w-24px h-24px bg-primary text-black fs-7 rounded-circle">0</span>
                                    </a> -->
                                </div>
                                <div class="footer-lang d-inline-block">
                        <a href="#lang_switcher" class="hstack gap-1 text-none fw-medium">
                            <i class="icon icon-1 unicon-earth-filled"></i>
                            <span>{{ strtoupper(app()->getLocale()) }}</span>
                            <span data-uc-drop-parent-icon=""></span>
                        </a>
                        <div class="p-2 bg-white dark:bg-gray-800 shadow-xs rounded w-150px" data-uc-drop="mode: click;">
                            <ul class="nav-y gap-1 fw-medium">
                                <li><a href="{{ route('locale.switch', 'ru') }}">Русский</a></li>
                                <li><a href="{{ route('locale.switch', 'kk') }}">Қазақша</a></li>
                            </ul>
                        </div>
                    </div>
                                <ul class="nav-x gap-1 d-none lg:d-flex">
                                    <li>
                                        <a href="#tw" class="w-32px h-32px cstack border rounded-circle hover:bg-gray-25 transition-colors duration-200"><i class="icon icon-1 unicon-logo-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#in" class="w-32px h-32px cstack border rounded-circle hover:bg-gray-25 transition-colors duration-200"><i class="icon icon-1 unicon-logo-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#yt" class="w-32px h-32px cstack border rounded-circle hover:bg-gray-25 transition-colors duration-200"><i class="icon icon-1 unicon-logo-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uc-bottom-navbar panel hstack z-1 min-h-48px lg:min-h-56px bg-gray-800 border-top border-bottom" data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="container max-w-xl">
                        <div class="hstack">
                            <div class="uc-navbar-left gap-2 lg:gap-3 d-none lg:d-flex">
                                <div class="uc-navbar-item">
                                    <a class="uc-search-trigger mb-narrow" href="#uc-search-modal" data-uc-toggle>
                                        <img class="text-white" src="{{ asset('assets/images/common/icons/search.svg') }}" alt="Search" data-uc-svg style="width: 20px">
                                    </a>
                                </div>
                            </div>
                            <div class="uc-navbar-center gap-2 lg:gap-3">
                                <div class="uc-navbar-item" style="--uc-nav-height: 48px">
                                <ul class="nav-x gap-1 fw-semibold flex-nowrap overflow-x-auto hide-scrollbar uc-horizontal-scroll w-screen md:w-auto md:mask-end-0 mx-n2 px-2 text-white">
                                    <li class="{{ request()->is('/') ? 'uc-active' : '' }}">
                                        <a href="{{ route('home') }}">{{ __('navigation.home') }}</a>
                                    </li>
                                    @foreach($categories ?? [] as $category)
                                        <li class="{{ request()->is('blog/category/' . $category->id) ? 'uc-active' : '' }}">
                                            <a href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                    <li class="nav-divider vr"></li>
                                </ul>
                                </div>
                            </div>
                            <div class="uc-navbar-right gap-2 lg:gap-3 d-none lg:d-flex">
                                <div class="uc-navbar-item">
                                    <div class="uc-modes-trigger icon-1 text-white" data-darkmode-toggle="">
                                        <label class="switch">
                                            <span class="sr-only">Dark toggle</span>
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>