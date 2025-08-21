@extends('layouts.admin')

@section('content')

<div class="content">
                <h2 class="intro-y text-lg font-medium mt-10">
                    Product List
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                        <a href="{{ route('products.create') }}" class="btn btn-primary shadow-md mr-2">Add New Product</a>

                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-slate-500">
                                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">IMAGES</th>
                                    <th class="whitespace-nowrap">PRODUCT NAME</th>
                                    <th class="text-center whitespace-nowrap">PRICE</th>
                                    <th class="text-center whitespace-nowrap">Description</th>
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="products-rows">
                                @include('dashboard.products._rows')
                            </tbody>
                        </table>
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                        <div id="products-pagination" class="w-full sm:w-auto sm:mr-auto">
                            @include('dashboard.products._pagination')
                        </div>

                    </div>
                    <!-- END: Pagination -->
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- form action is set dynamically by JS when opening modal --}}
                            <form id="delete-form" action="#" method="POST" class="modal-body p-0" data-destroy-url-template="{{ route('products.destroy', 0) }}">
                                @csrf
                                @method('DELETE')
                                <div class="p-5 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" data-lucide="x-circle" class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-slate-500 mt-2">
                                        Do you really want to delete these records?
                                        <br>
                                        This process cannot be undone.
                                    </div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-danger w-24">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->
            </div>

    <script>
        (function(){
            const input = document.querySelector('.form-control[placeholder="Search..."]');
            if(!input) return;

            let timeout = null;
            input.addEventListener('input', function(e){
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    const q = encodeURIComponent(e.target.value.trim());
                    fetch(`{{ route('products.index') }}?q=${q}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    }).then(r => r.json()).then(data => {
                        if(data.rows !== undefined) {
                            document.getElementById('products-rows').innerHTML = data.rows;
                        }
                        if(data.pagination !== undefined) {
                            document.getElementById('products-pagination').innerHTML = data.pagination;
                        }
                    }).catch(err => console.error(err));
                }, 300);
            });
        })();
    </script>

    <script>
        // Delegate click for delete buttons to set the form action dynamically
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('[data-id][data-tw-toggle="modal"][data-tw-target="#delete-confirmation-modal"]');
            if (!btn) return;

            const id = btn.getAttribute('data-id');
            const form = document.getElementById('delete-form');
            if (!form) return;
            const template = form.getAttribute('data-destroy-url-template'); // route(..., 0)
            if (!template) return;
            // replace the trailing 0 with the id (works for numeric ids)
            const action = template.replace(/\d+$/, id);
            form.setAttribute('action', action);
        });
    </script>

@endsection
