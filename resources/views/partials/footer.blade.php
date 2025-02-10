<footer id="uc-footer" class="uc-footer panel uc-dark">
    <div class="footer-outer py-4 lg:py-6 bg-gray-300 bg-opacity-10 dark:bg-gray-800 dark:bg-opacity-100">
        <div class="container max-w-xl">
            <div class="footer-inner vstack gap-4 lg:gap-6">

                <!-- Верхняя часть футера -->
                <div class="uc-footer-top">
                    <div class="row child-cols lg:child-cols-2 justify-between g-4" data-uc-grid>
                        
                        <!-- Логотип и описание -->
                        <div class="col-12 lg:col-5">
                            <div class="vstack gap-3 dark:text-white">
                                <a href="{{ route('home') }}">
                                    <img class="uc-transition-scale-up uc-transition-opaque uc-logo w-80px" src="{{ asset('assets/images/demo-two/common/logo.svg') }}" alt="News5">
                                </a>
                                <p class="fs-6 me-8">A comprehensive electronic newspaper that deals with all issues that concern national public opinion.</p>
                                <ul class="nav-x gap-2">
                                    <li><a class="hover:text-gray dark:hover:text-gray-200" href="#fb"><i class="icon icon-2 unicon-logo-facebook"></i></a></li>
                                    <li><a class="hover:text-gray dark:hover:text-gray-200" href="#x"><i class="icon icon-2 unicon-logo-x-filled"></i></a></li>
                                    <li><a class="hover:text-gray dark:hover:text-gray-200" href="#in"><i class="icon icon-2 unicon-logo-instagram"></i></a></li>
                                    <li><a class="hover:text-gray dark:hover:text-gray-200" href="#yt"><i class="icon icon-2 unicon-logo-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Ссылки на категории -->
                        <div>
                            <div class="widget links-widget vstack gap-3">
                                <div class="widgt-title">
                                    <h4 class="fs-7 fw-medium text-uppercase text-dark dark:text-white text-opacity-50">Topics</h4>
                                </div>
                                <div class="widgt-content">
                                    <ul class="nav-y gap-2 fs-6 fw-medium text-dark dark:text-white">
                                        <li><a href="{{ route('category.show', ['id' => 1]) }}">Social</a></li>
                                        <li><a href="{{ route('category.show', ['id' => 2]) }}">Politics</a></li>
                                        <li><a href="{{ route('category.show', ['id' => 3]) }}">Economy</a></li>
                                        <li><a href="{{ route('category.show', ['id' => 4]) }}">World</a></li>
                                        <li><a href="{{ route('category.show', ['id' => 5]) }}">Sports</a></li>
                                        <li><a href="{{ route('category.show', ['id' => 6]) }}">Arts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Популярные темы -->
                        <div>
                            <div class="widget links-widget vstack gap-3">
                                <div class="widgt-title">
                                    <h4 class="fs-7 fw-medium text-uppercase text-dark dark:text-white text-opacity-50">Trending now</h4>
                                </div>
                                <div class="widgt-content">
                                    <ul class="nav-y gap-2 fs-6 fw-medium text-dark dark:text-white">
                                        <li><a href="#">Podcasts</a></li>
                                        <li><a href="#">News TV</a></li>
                                        <li><a href="#">National</a></li>
                                        <li><a href="#">Global</a></li>
                                        <li><a href="#">Dialogues</a></li>
                                        <li><a href="#">Opinions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- О сайте -->
                        <div class="d-none lg:d-block">
                            <div class="widget links-widget vstack gap-3">
                                <div class="widgt-title">
                                    <h4 class="fs-7 fw-medium text-uppercase text-dark dark:text-white text-opacity-50">About</h4>
                                </div>
                                <div class="widgt-content">
                                    <ul class="nav-y gap-2 fs-6 fw-medium text-dark dark:text-white">
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Career</a></li>
                                        <li><a href="#">Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <hr class="m-0 dark:border-gray-100">

                <!-- Нижняя часть футера -->
                <div class="uc-footer-bottom panel hstack gap-2 justify-between fs-6 dark:text-white">
                    <div class="footer-copyright vstack sm:hstack gap-1 lg:gap-2">
                        <p>News5 © {{ date('Y') }}, All rights reserved.</p>
                        <div class="vr d-none lg:d-block"></div>
                        <ul class="nav-x gap-2 fw-medium">
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms of use</a></li>
                        </ul>
                    </div>

                    <!-- Выбор языка -->
                    <div class="footer-lang d-inline-block">
                        <a href="#lang_switcher" class="hstack gap-1 text-none fw-medium">
                            <i class="icon icon-1 unicon-earth-filled"></i>
                            <span>English</span>
                            <span data-uc-drop-parent-icon=""></span>
                        </a>
                        <div class="p-2 bg-white dark:bg-gray-800 shadow-xs rounded w-150px" data-uc-drop="mode: click;">
                            <ul class="nav-y gap-1 fw-medium">
                                <li><a href="#en">English</a></li>
                                <li><a href="#ar">العربية</a></li>
                                <li><a href="#ch">中文</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
