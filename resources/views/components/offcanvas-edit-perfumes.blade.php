<div class="offcanvas offcanvas-end my-bg-gray" data-bs-scroll="true" tabindex="-1" id="offcanvasWithEdit{{ $perfume->id }}" aria-labelledby="offcanvasWithEditLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="card my-bg-gray text-white border-0">
            <div class="card-body my-bg-gray">
                <h5 class="card-title" id="offcanvasWithEditLabel">Modifica i dettagli del profumo</h5>
                <form action="{{ route('admin.perfumes.update', $perfume->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name_perfume" class="form-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('name_perfume') is-invalid @enderror" 
                               id="name_perfume" name="name_perfume" required minlength="3" maxlength="255" 
                               value="{{ old('name_perfume', $perfume->name_perfume) }}" placeholder="Inserisci il nome...">
                        @error('name_perfume')
                            <span class="text-danger">Il campo nome è obbligatorio, inserire almeno tre caratteri</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('brand') is-invalid @enderror" 
                               id="brand" name="brand" required minlength="3" maxlength="255" 
                               value="{{ old('brand', $perfume->brand) }}" placeholder="Inserisci il brand...">
                        @error('brand')
                            <span class="text-danger">Il campo brand è obbligatorio, inserire almeno tre caratteri</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" 
                               id="description" name="description" required minlength="10" maxlength="1024" 
                               value="{{ old('description', $perfume->description) }}" placeholder="Inserisci la descrizione del profumo...">
                        @error('description')
                            <span class="text-danger">Il campo descrizione è obbligatorio, inserire almeno dieci caratteri</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label">Misura / ml <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('size') is-invalid @enderror" 
                               id="size" name="size" required minlength="2" maxlength="4" 
                               value="{{ old('size', $perfume->size) }}" placeholder="Inserisci la descrizione del profumo...">
                        @error('size')
                            <span class="text-danger">Il campo misura è obbligatorio, inserire almeno 2 numeri</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" required min="0.01" step="0.01" max="999.99" 
                               value="{{ old('price', $perfume->price) }}" placeholder="Inserisci il prezzo...">
                        @error('price')
                            <span class="text-danger">Il campo prezzo non accetta valori negativi</span>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex flex-column align-items-center ">
                        
                        <label class="mb-2" for="img_input{{ $perfume->id }}">Carica immagine:</label>
                        <input type="file" id="img_input{{ $perfume->id }}" name="img" class="form-control">
                        <div class="mt-4">
                            @if ($perfume->img)
                                <div class="position-relative img-preview-wrapper" id="image_container{{ $perfume->id }}">
                                    @if (filter_var($perfume->img, FILTER_VALIDATE_URL))
                                        <img class="h-200 img-thumbnail" 
                                            id="img_preview{{ $perfume->id }}" 
                                            src="{{ $perfume->img }}" 
                                            alt="{{ $perfume->name_perfume }}">
                                    @else
                                        <img class="h-200 img-thumbnail" 
                                        id="img_preview{{ $perfume->id }}" 
                                        src="{{ asset('storage/'.$perfume->img) }}" 
                                        alt="{{ $perfume->name_perfume }}">

                                    @endif
                                    
                                    
                                    
                                    <button type="button" class="remove-img-btn btn mt-4 w-100 d-flex justify-content-center" id="remove_image{{ $perfume->id }}">
                                        <i class="fa-solid fa-trash fa-2xl"></i>
                                    </button>
                                    <input class="d-none" type="checkbox" id="removeimage_input{{ $perfume->id }}" name="remove_image" value="1">
                                </div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn bg-black fw-bold text-white w-100">Modifica</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite('resources/js/buttons/imgPerfume.js')
@endpush
