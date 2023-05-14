            <div class="col-lg-3  siedbar">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    @foreach ($categories as $category)
                        @if ($category->parent_id == 0)
                            <li class="pb-3">
                                <a class="collapsed d-flex
                                 justify-content-between h3 text-decoration-none"
                                    href="{{ route('website/shop/products', $category->id) }}">
                                    {{ $category->name }}
                                    <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                                </a>
                                <ul class="collapse show list-unstyled pl-3">
                                    @foreach ($category->child as $childCategory)
                                        <li><a class="text-decoration-none"
                                                href="{{ route('website/shop/products', $childCategory->id) }}">{{ $childCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
