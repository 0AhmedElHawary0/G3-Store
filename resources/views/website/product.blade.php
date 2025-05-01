@extends('website.main_layout')

@section('page_title')
Product Page
@endsection

@section('page_content')
<!--  Modal -->
<div class="modal fade" id="productView" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button"
                data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center"
                            style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1"
                            data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none"
                            href="img/product-5-alt-1.jpg" data-gallery="gallery1"
                            data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none"
                            href="img/product-5-alt-2.jpg" data-gallery="gallery1"
                            data-glightbox="Red digital smartwatch"></a></div>
                    <div class="col-lg-6">
                        <div class="p-4 my-md-4">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                            </ul>
                            <h2 class="h4">Red digital smartwatch</h2>
                            <p class="text-muted">$250</p>
                            <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
                                ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis
                                parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                            <div class="row align-items-stretch mb-4 gx-0">
                                <div class="col-sm-7">
                                    <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5"><a
                                        class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0"
                                        href="cart.html">Add to cart</a></div>
                            </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i
                                    class="far fa-heart me-2"></i>Add to wish list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                        <div class="swiper product-slider-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                        src="{{ asset($product->photo) }}" alt="..."></div>
                                <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                        src="{{ asset('img/product-detail-2.jpg') }}" alt="..."></div>
                                <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                        src="{{ asset('img/product-detail-3.jpg') }}" alt="..."></div>
                                <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                        src="{{ asset('img/product-detail-4.jpg') }}" alt="..."></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 order-1 order-sm-2">
                        <div class="swiper product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                        href="{{ asset($product->photo) }}" data-gallery="gallery2"
                                        data-glightbox="Product item 1"><img class="img-fluid"
                                            src="{{ asset($product->photo) }}" alt="..."></a></div>
                                <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                        href="{{ asset('img/product-detail-2.jpg') }}" data-gallery="gallery2"
                                        data-glightbox="Product item 2"><img class="img-fluid"
                                            src="{{ asset('img/product-detail-2.jpg') }}" alt="..."></a></div>
                                <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                        href="{{ asset('img/product-detail-3.jpg') }}" data-gallery="gallery2"
                                        data-glightbox="Product item 3"><img class="img-fluid"
                                            src="{{ asset('img/product-detail-3.jpg') }}" alt="..."></a></div>
                                <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                        href="{{ asset('img/product-detail-4.jpg') }}" data-gallery="gallery2"
                                        data-glightbox="Product item 4"><img class="img-fluid"
                                            src="{{ asset('img/product-detail-4.jpg') }}" alt="..."></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">

                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <ul class="list-inline mb-2 text-sm">
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                </ul>
                <h1>{{ $product->name }}</h1>
                <p class="text-muted lead">${{ $product->price }}</p>
                <p class="text-sm mb-4">{{ $product->description }}</p>

                <form action="{{ url('/add-to-cart') }}" method="POST">
                    @csrf

                    <input type="hidden" name="pID" value="{{ $product->id }}" />

                    <div class="row align-items-stretch mb-4">
                        <div class="col-sm-5 pr-sm-0">
                            <div
                                class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                                <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                <div class="quantity">
                                    <button type="button" class="dec-btn p-0">
                                        <i class="fas fa-caret-left"></i>
                                    </button>
                                    <input class="form-control border-0 shadow-0 p-0" type="text" name="q" value="1">
                                    <button type="button" class="inc-btn p-0">
                                        <i class="fas fa-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-sm-0">
                            <button type="submit"
                                class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center  justify-content-center px-0">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </form>

                <a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to
                    wish list</a><br>
                <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white">
                        <strong class="text-uppercase">SKU:</strong>
                        <span class="ms-2 text-muted">{{ $product->sku }}</span>
                    </li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted">
                        <strong class="text-uppercase text-dark">Category:</strong>
                        <a class="reset-anchor ms-2" href="{{ url('/category/'. $product->category->id) }}">
                            {{ $product->category->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- RELATED PRODUCTS-->
        <h2 class="h5 text-uppercase mb-4">Related products</h2>
        <div class="row">

            <!-- PRODUCT-->
            @foreach ($product->category->products as $p)
            {{-- @if($p->id != $product->id && $loop->index < 5) --}} <div class="col-lg-3 col-sm-6">
                <div class="product text-center skel-loader">
                    <div class="d-block mb-3 position-relative"><a class="d-block"
                            href="{{ url('/product/' . $p->id) }}"><img class="img-fluid w-100" src="{{ $p->photo }}"
                                alt="..."></a>
                        <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i
                                            class="far fa-heart"></i></a></li>
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#!">Add to
                                        cart</a></li>
                                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                        href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h6> <a class="reset-anchor" href="{{ url('/product/' . $p->id) }}">{{ $p->name }}</a></h6>
                    <p class="small text-muted">${{ $p->price }}</p>
                </div>
        </div>
        {{-- @endif --}}
        @endforeach

    </div>
    </div>
</section>
@endsection