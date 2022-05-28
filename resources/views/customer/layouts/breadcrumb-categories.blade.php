@if ($parent)
    <section>
        <i class="icofont-rounded-left"></i>
        <a href="{{ 
                route(
                    'customer.product.search', 
                    ['category' => $parent->id] + 
                    request()->except('category', 'attributes','attribute-values')
                ) 
            }}" class="a-hover">{{ $parent->name }}</a>
    </section>
    @include('customer.layouts.breadcrumb-categories', [
        'parent' => $parent->parent
    ])
@endif                        