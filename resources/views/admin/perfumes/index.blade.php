@extends('layouts.app')

@section('main-content')
@vite('resources/js/perfumeSearch.js')
    <div>
        <div class="my-5 px-5 ">

            <div class="row gx-3 rounded justify-content-between align-items-center bg-white">
                <div class="col-12 col-md-3 py-2">
                    <h1 class="fw-bold">Catalogo Profumi</h1> 
                </div>
                <div class="col-8 col-md d-flex justify-content-center py-2">
                    
                    <input 
                        type="text" 
                        id="searchPerfume" 
                        class="form-control w-75"
                        data-bs-theme="dark" 
                        placeholder="Filtra per brand...">
                
                </div>
                <div class="col-4 col-md-2 d-flex justify-content-end py-2">
                    <button class="fw-bold fs-2 btn btn-light d-flex align-items-center justify-content-center" 
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithAdd" 
                        aria-controls="offcanvasWithAdd"
                        style="width: 50px; height: 50px; border-radius: 10px;">
                        +
                    </button>
                </div>
                
            </div>
            
            
        </div>
        
        <div class="my-5 px-5">
            

            <div class="row vw-75 gx-3 gy-3">
                @foreach ($perfumes as $perfume)
                    
                    {{-- Offcanvas per modifica profumo --}}
                    @include('components.offcanvas-add-perfumes', ['perfume' => $perfume])
                    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4 perfumes">
                        <div class="my-card d-flex justify-content-between rounded p-3 ">
                            <div class="col-sm-3 d-flex align-items-center pe-2">
                                <div class="img-container">
                                    @php
                                        $defaultImage = "https://via.placeholder.com/300x200";
                                        $imagePath = null;
                                        if (!empty($perfume->img)) {
                                            if (Str::startsWith($perfume->img, ['http://', 'https://'])) {
                                                $imagePath = $perfume->img;
                                            } elseif (file_exists(storage_path('app/public/' . $perfume->img))) {
                                                $imagePath = asset('storage/' . $perfume->img);
                                            }
                                        }
                                    @endphp
                                    <img src="{{ $imagePath ?? $defaultImage }}" alt="{{ $perfume->name_perfume ?? 'Placeholder image' }}" class="img-thumbnail border-0 h-200">
                                </div>
                            </div>
            
                            <div class="my-col-info col-sm-6 d-flex align-items-center perfumes">
                                <div>
                                    <h3>{{ $perfume->brand }}</h3>
                                    <h5>{{ $perfume->name_perfume }}</h5>
                                    <div>
                                        <strong>Descrizione: {{ $perfume->description }}</strong><br>
                                        <strong>Misura: {{ $perfume->size }} ml</strong><br>
                                        <strong>Prezzo: €{{ $perfume->price }}</strong>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-sm-3 d-flex flex-column justify-content-center mx-2">
                                <button class="btn fw-bold bg-black text-white w-100 mb-2" 
                                        type="button" 
                                        data-bs-toggle="offcanvas" 
                                        data-bs-target="#offcanvasWithEdit{{ $perfume->id }}" 
                                        aria-controls="offcanvasWithEdit">
                                    Modifica
                                </button>
            
                                {{-- Offcanvas per modifica profumo --}}
                                @include('components.offcanvas-edit-perfumes', ['perfume' => $perfume])
            
                                <button type="button" class="btn w-100 bg-black text-white fw-bold" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $perfume->id }}">
                                    Elimina
                                </button>
            
                                {{-- Modal --}}
                                @include('components.modal-delete-perfumes', ['perfume' => $perfume])
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>

@endsection
