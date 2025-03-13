{{-- resources/views/components/sidebar-categories.blade.php --}}
<div class="sidebar-categories">
    <div class="sidebar-widget bg-white dark:bg-gray-800 p-4 rounded-md shadow-sm mb-4">
        <h3 class="fs-5 fw-bold mb-3">{{ __('categories.all_categories') }}</h3>
        <ul class="categories-tree nav-y gap-1">
            @foreach($rootCategories as $rootCategory)
                <li class="category-item {{ request()->is('blog/category/' . $rootCategory->id) ? 'active' : '' }}">
                    <a href="{{ route('blog.category', $rootCategory->id) }}" class="category-link d-flex justify-content-between align-items-center py-1">
                        <span class="category-name">{{ $rootCategory->getTranslation('name', app()->getLocale()) }}</span>
                        <span class="category-count badge bg-light text-dark">{{ $rootCategory->posts_count }}</span>
                    </a>
                    
                    @if($rootCategory->children->count() > 0)
                        <ul class="subcategories-tree nav-y gap-1 pl-3 mt-1">
                            @foreach($rootCategory->children as $child)
                                <li class="subcategory-item {{ request()->is('blog/category/' . $child->id) ? 'active' : '' }}">
                                    <a href="{{ route('blog.category', $child->id) }}" class="subcategory-link d-flex justify-content-between align-items-center py-1">
                                        <span class="subcategory-name">{{ $child->getTranslation('name', app()->getLocale()) }}</span>
                                        <span class="subcategory-count badge bg-light text-dark">{{ $child->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>