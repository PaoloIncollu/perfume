@extends('layouts.app')

@section('main-content')
    <div>
        <div class="my-5 px-5">
          <h1 class="text-white fw-bold d-inline-block rounded rounded-4 my-bg-dark-gray p-3">Catalogo Profumi</h1>  
        </div>
        
        <div class="my-5 px-5">
            

            <div class="d-flex flex-wrap">
                @foreach ($perfumes as $perfume)
                    <div class="my-card d-flex justify-content-between col-sm-12 col-md-12 col-lg-6  border border-2 mb-4">
                        <div class="col-xs-12 col-sm-4 d-flex align-items-center">
                            <div class="img-container ">
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
                                <img src="{{ $imagePath ?? $defaultImage }}" alt="{{ $perfume->name_perfume ?? 'Placeholder image' }}" class="img-thumbnail h-300">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 d-flex align-items-center">
                            <div>
                                <h3 class="px-3">{{ $perfume->name_perfume }}</h3>
                                <div class="px-3">
                                    <strong>Descrizione: {{ $perfume->description }}</strong><br>
                                    <strong>Prezzo: €{{ $perfume->price }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 d-flex flex-column justify-content-center me-2">
                            <button class="btn fw-bold bg-black text-warning w-100 mb-2" 
                                    type="button" 
                                    data-bs-toggle="offcanvas" 
                                    data-bs-target="#offcanvasWithEdit{{ $perfume->id }}" 
                                    aria-controls="offcanvasWithEdit">
                                Modifica
                            </button>

                            {{-- Offcanvas per modifica profumo --}}
                            @include('components.offcanvas-edit-perfumes', ['perfume' => $perfume])

                            <button type="button" class="btn w-100 bg-black text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $perfume->id }}">
                                Elimina
                            </button>

                            {{-- Modal --}}
                            @include('components.modal-delete-perfumes', ['perfume' => $perfume])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
