@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate ml-5">
                            Product Details
                        </h2>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>

    </div>
    <div class="bg-white py-6 px-6 m-5 rounded-lg shadow-lg max-w-3xl">
        <!-- BEGIN: Blog Layout -->
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-medium truncate ">
                {{ $product->name }}
            </h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
        </div>
        <div class="flex justify-between items-center mt-2">
            <div class="text-slate-600 dark:text-slate-500 text-xs sm:text-sm">Created
                <span class="text-success"> {{ $product->created_at->diffForHumans() }}</span>
            </div>
                    <div class="intro-y text-slate-600 dark:text-slate-500 mt-3 text-xs sm:text-sm">₦ {{ $product->price }}</div>
        </div>
        <div class="intro-y mt-6">
            <div class="">
                @if(isset($product->files) && count($product->files))
                    @foreach ($product->files->take(3) as $file)
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 px-2 mb-4">
                            <img alt="product Image" class="rounded-md object-cover w-full h-96" src="{{ asset('storage/' . $file->path) }}">
                        </div>
                    @endforeach
                @elseif(!empty($product->image))
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 px-2 mb-4">
                        <img alt="product Image" class="rounded-md object-cover w-full h-96" src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image) }}">
                    </div>
                @endif
            </div>


        </div>
        <div class=" text-xs  mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="">
                <p class="text-base text-start sm:text-lg font-medium -mt-1">Description:</p>
                <p class="text-slate-500 mt-1"> {!! $product->description !!}</p>
            </div>
        </div>
        {{-- <div class=" grid grid-cols-4 text-xs sm:text-sm sm:flex-row  my-5 py-5 border-t border-b border-slate-200/60 dark:border-darkmode-400">
            <div class="flex space-x-3 px-2 border-r">
                <p class="text-base text-start sm:text-lg font-medium -mt-1">Address:</p>
                <div class="text-slate-600 dark:text-slate-500 ">
                    <p>{{ $product->address }}</p>
                </div>

            </div>


        </div> --}}
    </div>

@endsection
