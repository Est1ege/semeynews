<div id="opinions-posts" class="opinions-posts section panel overflow-hidden">
    <div class="section-outer panel pb-5 sm:pb-6">
        <div class="container max-w-xl">
            <div class="section-inner">
                <div class="row child-cols-12 lg:child-cols col-match g-3" data-uc-grid>

                    <!-- Опрос -->
                    <div class="lg:col-4">
                        <div class="block-layout grid-layout vstack panel overflow-hidden">
                            <div class="block-header panel min-h-40px px-2 py-1 bg-gray-800 text-white uc-dark">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <span class="post-title">Channel survey</span>
                                </h2>
                            </div>
                            <div class="block-content panel vstack gap-3 px-2 py-3 xl:p-3 bg-gray-25 dark:bg-gray-800">
                                <p class="fs-5 fw-semibold">What measures do you think will solve the problem of water shortage in the USA?</p>
                                <form method="POST" action="{{ route('poll.vote') }}">
                                    @csrf
                                    <div class="poll-content vstack gap-1">
                                        <label class="hstack items-start gap-1">
                                            <input class="form-check-input" type="checkbox" name="options[]" value="Rationalization of water consumption">
                                            <span>Rationalization of water consumption</span>
                                        </label>
                                        <label class="hstack items-start gap-1">
                                            <input class="form-check-input" type="checkbox" name="options[]" value="Building new dams">
                                            <span>Building new dams</span>
                                        </label>
                                        <label class="hstack items-start gap-1">
                                            <input class="form-check-input" type="checkbox" name="options[]" value="Seawater desalination">
                                            <span>Seawater desalination</span>
                                        </label>
                                        <label class="hstack items-start gap-1">
                                            <input class="form-check-input" type="checkbox" name="options[]" value="Sewage water treatment">
                                            <span>Sewage water treatment</span>
                                        </label>
                                    </div>
                                    <div class="poll-actions hstack gap-1 mt-3">
                                        <button type="submit" class="poll-vote btn btn-sm btn-primary text-dark">Vote</button>
                                        <a href="{{ route('poll.archive') }}" class="poll-archive btn btn-sm btn-gray-800 dark:bg-white dark:hover:bg-gray-100 dark:text-dark">Poll archive</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Блок мнений -->
                    <div>
                        <div class="block-layout grid-layout vstack gap-4 panel overflow-hidden p-3 bg-gray-25 dark:bg-gray-800">
                            <div class="block-header panel">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <span class="post-title">Opinions and Positions</span>
                                </h2>
                            </div>

                            <div class="block-content panel hstack items-start gap-3 overflow-hidden">
                                <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 gx-3 gy-4 xl:gy-6" data-uc-grid>
                                    @foreach($opinions as $opinion)
                                        <div>
                                            <article class="post type-post panel">
                                                <div class="row child-cols g-2" data-uc-grid>
                                                    <div class="col-auto">
                                                        <div class="post-media panel overflow-hidden w-72px">
                                                            <figure class="featured-image m-0 ratio ratio-1x1 rounded-circle uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                                <img class="uc-transition-scale-up uc-transition-opaque media-cover" src="{{ asset('storage/' . $opinion->author_image) }}" alt="{{ $opinion->author_name }}">
                                                            </figure>
                                                            <a href="{{ route('news.show', $opinion->id) }}" class="position-cover"></a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="post-header panel vstack gap-narrow">
                                                            <span class="fs-7 fw-medium opacity-50">{{ $opinion->author_name }} says:</span>
                                                            <h3 class="post-title h6 m-0 text-truncate-3 hover:text-primary">
                                                                <a href="{{ route('news.show', $opinion->id) }}" class="fs-6 xl:fs-5 text-none hover:text-primary duration-150">
                                                                    {{ $opinion->title }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
