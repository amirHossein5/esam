<section class="absolute top-0 left-0 right-0 h-full overflow-y-auto bg-white cursor-pointer menus">
    @foreach ($children as $child)
        @if ($child->children->isNotEmpty())
            <div class="flex justify-between px-2 py-4 text-gray-600 bg-hover show-children" data-open="false"
                id="{{ $child->id }}">
                <span>{{ $child->name }}</span>
                <i class="icofont-simple-down"></i>

                <div class="hidden children">
                    @include('customer.layouts.children-menu', [
                        'children' => $child->children
                    ])
                </div>
            </div>
        @else
            <div class="text-gray-600 bg-hover">
                <a class="block px-2 py-4" href="{{ route('customer.product.search', ['category' => $child->id]) }}">{{ $child->name }}</a>
            </div>
        @endif
    @endforeach
</section>
