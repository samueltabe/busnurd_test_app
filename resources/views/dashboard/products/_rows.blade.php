@foreach ($products as $product )
    <tr class="intro-x">
        <td class="w-40">
           <div class="flex">
               <div class="w-10 h-10 image-fit zoom-in">
                    <img alt="{{ $product->name }}" class="tooltip rounded-full" src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image) }}">
               </div>
           </div>
        </td>
       <td>
           <P class="font-medium whitespace-nowrap">{{ $product->name }}</P>
       </td>
       <td class="text-center">{{ $product->price }}</td>
       <td class="text-center">{!! Str::limit($product->description, 50) !!}</td>
       <td class="table-report__action w-56">
           <div class="flex justify-center items-center">
                <a class="flex items-center text-success mr-3" href="{{ route('products.show', $product->id) }}"> View</a>
                <a class="flex items-center mr-3 text-primary" href="{{ route('products.edit', $product->id) }}"> Edit</a>
                <a class="flex items-center text-danger" href="#" data-id="{{ $product->id }}" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> Delete</a>
           </div>
       </td>
    </tr>
@endforeach

@if($products->isEmpty())
<tr><td colspan="5" class="text-center">No products found.</td></tr>
@endif
