@extends('layouts.app')

@section('main-content')
    <div>
        <div class="my-5 px-5 d-flex justify-content-between align-items-center">
            <div class="rounded rounded-4 bg-white">
                <h1 class="fw-bold p-3">Catalogo Profumi</h1> 
            </div>
 
            <div>
                <button class="fw-bold btn btn-light rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithAdd" aria-controls="offcanvasWithAdd">+</button>
            </div>
            
        </div>
        
        <div class="my-5 px-5">
            

            <div class="row vw-75 gx-3 gy-3">
                @foreach ($perfumes as $perfume)
                
                    {{-- Offcanvas per modifica profumo --}}
                    @include('components.offcanvas-add-perfumes', ['perfume' => $perfume])
                    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4">
                        <div class="my-card d-flex justify-content-between rounded p-3">
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
            
                            <div class="my-col-info col-sm-6 d-flex align-items-center">
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
