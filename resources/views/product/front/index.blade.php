@extends('layouts.front.index')

@section('content')

    <div class="container">

        <div class="text-center">
            {!! $products->render() !!}
        </div>

        <div>
            <form action="{{ route('product.search.index') }}">
                <label>
                    <input name="q" type="text" placeholder="Search in product names..." class="form-control" value="{{ request('q') }}">
                </label>

                <label>
                    <input name="min" type="text" placeholder="Min Price" class="form-control" value="{{ request('min') }}">
                </label>
                <label>
                    <input name="max" type="text" placeholder="Max Price" class="form-control" value="{{ request('max') }}">
                </label>

                <button class="btn btn-primary">Filter</button>
                <a href="/" class="btn btn-success">Clear Filters</a>
            </form>
        </div>

        <div class="row equal">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="img-thumbnail h-100 p-3">

                        <h4>
                            <a href="#">{{ $product->name }}</a>
                        </h4>

                        <hr>

                        <strong>Colors:</strong>

                        @foreach($product->properties as $property)

                            <div>
                                {{ $property->color }} : {{ $property->displayable_price }}
                            </div>

                        @endforeach

                        <hr>

                        <p>{{ $product->description }}</p>

                    </div>
                </div>
            @empty

                <div class="col">
                    <div class="alert alert-dark">We're sorry but we couldn't find any product matching to your desires.</div>
                </div>

            @endforelse
        </div>

        <div class="text-center">
            {!! $products->render() !!}
        </div>


    </div>

@endsection
