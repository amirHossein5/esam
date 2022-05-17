@extends('admin.layouts.master')

@section('head-tag')
<title>
                     گالری کالای ({{ $product->name }})
</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> گالری کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <a href="{{ route('admin.market.product.index') }}" class="mb-3 btn btn-info btn-sm"> محصولات</a>

                <h5>
                 گالری کالای ({{ $product->name }})
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom border-top pb-2">
                <form action="{{ route('admin.market.product.gallery.store', $product->id) }}" enctype="multipart/form-data" method="post" class="m-2">
                    @csrf

                    <input type="file" multiple name="images[]" id="">
                    <button type="submit" class="btn btn-success btn-sm">آپلود</button>

                    @error('images.*')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </form>
            </section>

            <section class="d-flex flex-wrap">
                @foreach ($product->galleries as $gallery)
                    <section class="d-flex position-relative m-3">
                        <section
                            class="bg-danger pointer text-white rounded-pill position-absolute height-2-rem width-2-rem overflow-hidden -top-1-rem -right-1-rem"
                        >
                            <form
                                action="{{ route('admin.market.product.gallery.destroy',
                                    ['product' => $product->id, 'gallery' => $gallery->id]
                                )}}"
                                class="d-inline" method="post"
                            >
                                @csrf @method('delete')
                                <button class="d-flex justify-content-center align-items-center w-100 h-100">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </section>
                        <img src="{{ asset($gallery->image['index']) }}" height="90" alt="">
                    </section>
                @endforeach
            </section>
        </section>
    </section>
</section>

@endsection
