<div class="offcanvas offcanvas-end my-bg-gray" data-bs-scroll="true" tabindex="-1" id="offcanvasWithAdd" aria-labelledby="offcanvasWithAddLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="card my-bg-gray text-white border-0">
            <div class="card-body my-bg-gray">
                <h5 class="card-title" id="offcanvasWithAddLabel">Aggiungi un nuovo profumo</h5>
                <form action="{{ route('admin.perfumes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name_perfume_add" class="form-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name_perfume') is-invalid @enderror" 
                               id="name_perfume_add" name="name_perfume" required minlength="3" maxlength="255" 
                               placeholder="Inserisci il nome...">
                        @error('name_perfume')
                            <span class="text-danger">Il campo nome è obbligatorio, inserire almeno tre caratteri</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand_add" class="form-label">Brand <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" 
                               id="brand_add" name="brand" required minlength="3" maxlength="255" 
                               placeholder="Inserisci il brand...">
                        @error('brand')
                            <span class="text-danger">Il campo brand è obbligatorio, inserire almeno tre caratteri</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description_add" class="form-label">Descrizione <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" 
                               id="description_add" name="description" required minlength="10" maxlength="1024" 
                               placeholder="Inserisci la descrizione del profumo...">
                        @error('description')
                            <span class="text-danger">Il campo descrizione è obbligatorio, inserire almeno dieci caratteri</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="size_add" class="form-label">Misura / ml <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('size') is-invalid @enderror" 
                               id="size_add" name="size" required min="10" step="5" max="200" 
                               placeholder="Inserisci la misura in ml...">
                        @error('size')
                            <span class="text-danger">Il campo misura è obbligatorio, non accetta valori inferiori a 10</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price_add" class="form-label">Prezzo <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                               id="price_add" name="price" required min="0.01" step="0.01" max="999.99" 
                               placeholder="Inserisci il prezzo...">
                        @error('price')
                            <span class="text-danger">Il campo prezzo non accetta valori negativi</span>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex flex-column align-items-center ">
                        <label class="mb-2" for="img_input_add">Carica immagine:</label>
                        <input type="file" id="img_input_add" name="img" class="form-control @error('img') is-invalid @enderror" minlength="3" maxlength="2048" placeholder="Carica un immagine per il tuo profumo...">
                        <div class="mt-4">
                            <img class="h-200 img-thumbnail d-none" id="img_preview_add" alt="Anteprima immagine">
                        </div>
                    </div>

                    <button type="submit" class="btn bg-black fw-bold text-white w-100">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite('resources/js/buttons/imgPerfume.js')
@endpush
