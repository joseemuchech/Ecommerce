@extends('layouts.app')

@section('title', 'Search Products')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Search Results</h4>
                <div class="underline mb-3"></div>
            </div>


                @forelse ($searchProducts as $productItem )
                <div class="col-md-8">
                <div class="product-card p-2">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>
                                @if ($productItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                <img src="{{ asset($productItem->productImages[0]->image) }}" style="height: 200px" alt="{{ $productItem->name }}"/>
                                 </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{ $productItem->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">Ksh{{ $productItem->selling_price }}</span>
                                    <span class="original-price">Ksh{{ $productItem->original_price }}</span>
                                </div>
                                <p style="height: 45px; overflow:hidden">
                                    <b>Description:</b>{{ $productItem->description }}
                                </p>
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}"
                                    class="btn btn-outline-primary">View
                                   </a>
                            </div>
                        </div>
                    </div>
                  </div>
                    </div>
                        @empty
                            <div class="col-md-12 p-2">
                                <h4>No Such Products Found</h4>
                            </div>
                        @endforelse
                    <div class="col-md-8">
                        {{ $searchProducts->appends(request()->input())->links() }}
                    </div>
            </div>
        </div>
    </div>
  </div>

@endsection
