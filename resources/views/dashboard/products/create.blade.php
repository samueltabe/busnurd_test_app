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
                            {{ isset($product) ? 'Update' : 'Add' }} Product
                        </h2>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>

    </div>
    <div class="bg-white py-6 px-6 m-5 rounded-lg shadow-lg max-w-3xl">

        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
            @method('PUT')
            @endif

            <div class="grid grid-cols-3 gap-4 mb-3">
                <div class="col-span-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-1">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" id="price" value="{{ old('price', $product->price ?? '') }}" name="price" class="form-control">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-3">
                <div class="">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" value="{{ old('description', $product->description ?? '') }}" name="description">
                    <trix-editor input="description"></trix-editor>
                    @error('description') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-3">
                <div class="">
                    <label for="image" class="form-label">Product Image</label>

                    <input type="file" class="form-control" id="image" name="image">
                    @error('image') <span class="error">{{ $message }}</span> @enderror

                    @if(isset($product))
                        @if(isset($product->files) && count($product->files))
                            <div class="mt-4">
                                <h4 class="font-bold">Existing Images:</h4>
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach($product->files as $file)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $file->path) }}" alt="product Image" class="w-full h-20 object-cover">
                                            <!-- Optionally, you can add a delete button for each image -->
                                            <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-1 text-xs" onclick="deleteImage({{ $file->id }})">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif(!empty($product->image))
                            <div class="mt-4">
                                <h4 class="font-bold">Existing Image:</h4>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="relative">
                                        <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image) }}" alt="product Image" class="w-full h-20 object-cover">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary shadow-lg py-1 rounded-full px-4 mr-2">
                    {{ isset($product) ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-light rounded-full px-4">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection
