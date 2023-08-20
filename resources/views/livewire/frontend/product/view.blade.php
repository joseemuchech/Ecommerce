<div>
    <div class="py-3 py-md-5 mt-1">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mt-3" wire:ignore>
                    <div class="bg-white border">
                        @if ($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" style="height: 330px" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">

                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $itemImg)
                                  <li><img src="{{ asset($itemImg->image) }}" /></li>
                                @endforeach

                              </ul>
                            </div>

                            <div class="exzoom_nav"></div>

                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>
                        @else
                           No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">Ksh{{ $product->selling_price }}</span>
                            <span class="original-price">Ksh{{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                           @if ($product->productColors)
                              @foreach ($product->productColors as $colorItem)
                                 {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}"/> {{ $colorItem->color->name }} --}}
                                 <label class="colorSelectionLabel" style="background-color: {{ $colorItem->color->code }}"
                                     wire:click="colorSelected({{ $colorItem->id }})"
                                    >
                                    {{ $colorItem->color->name }}
                                 </label>
                              @endforeach
                           @endif
                           <div>
                                @if ($this->prodColorSelectedQuality == 'OutofStock')
                                <label class="btn-sm p-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                @elseif($this->prodColorSelectedQuality > 0)
                                <label class="btn-sm p-1 mt-2 text-white bg-success">In Stock</label>
                                @endif
                            </div>
                           @else
                                @if ($product->quantity)
                                <label class="btn-sm p-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                <label class="btn-sm p-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                @endif
                           @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                 <i class="fa fa-shopping-cart"></i>Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1">
                                 <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                 </span>
                                 <span wire:loading wire:target="addToWishList">
                                    Adding...
                                 </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Related brand --}}
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Related
                        @if ($product) {{ $product->brand }} @endif
                        Products
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col md-12">
                @if ($category)
                <div class="owl-carousel owl-theme all-carousel">
                    @foreach ($category->relatedProducts as $relatedProductItem )
                    @if ($relatedProductItem->brand == "$product->brand")
                    <div class="item mb-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($relatedProductItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                <img src="{{ asset($relatedProductItem->productImages[0]->image) }}" style="height: 200px" alt="{{ $relatedProductItem->name }}"/>
                                 </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $relatedProductItem->brand }}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                    {{ $relatedProductItem->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">Ksh{{ $relatedProductItem->selling_price }}</span>
                                    <span class="original-price">Ksh{{ $relatedProductItem->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                   @endforeach
                </div>
                    @else
                    <div class="p-2">
                        <h4>No Related Products Available</h4>
                    </div>
                    @endif
            </div>

            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Related
                        @if ($category) {{ $category->name }} @endif
                        Products
                    </h4>
                    <div class="underline"></div>
                </div>
            <div class="col-md-12">
                @if ($category)
                <div class="owl-carousel owl-theme all-carousel">
                    @foreach ($category->relatedProducts as $relatedProductItem )
                    <div class="item mb-3">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if ($relatedProductItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                    <img src="{{ asset($relatedProductItem->productImages[0]->image) }}" style="height: 200px" alt="{{ $relatedProductItem->name }}"/>
                                     </a>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $relatedProductItem->brand }}</p>
                                    <h5 class="product-name">
                                       <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                        {{ $relatedProductItem->name }}
                                       </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">Ksh{{ $relatedProductItem->selling_price }}</span>
                                        <span class="original-price">Ksh{{ $relatedProductItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                @else
                <div class="p-2">
                    <h4>No Related Products Available</h4>
                </div>
                @endif

            </div>


            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function(){

        $("#exzoom").exzoom({

        "navWidth": 40,
        "navHeight": 40,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        "autoPlay": false,
        "autoPlayTimeout": 2000

        });
     });

     $('.all-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
</script>
@endpush
