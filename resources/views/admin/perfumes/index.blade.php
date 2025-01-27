@extends('layouts.app')

@section('main-content')
    <div>
        <div class="my-5 px-5">
            <h3 class="text-white">Catalogo Profumi</h3>

            <div class="d-flex flex-wrap">
                @foreach ($perfumes as $perfume)
                    <div class="my-card d-flex col-6 border border-2 mb-4">
                        <div class="col-auto">
                            <div class="img-container">
                                <img src="{{ $perfume->img }}" alt="{{ $perfume->name_perfume ?? 'Placeholder image' }}" class="img-fluid">
                            </div>
                        </div>

                        <div class="col d-flex align-items-center">
                            <div>
                                <h5 class="px-3">{{ $perfume->name_perfume }}</h5>
                                <div class="px-3">
                                    <small>Descrizione: {{ $perfume->description }}</small><br>
                                    <strong>Prezzo: €{{ $perfume->price }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column justify-content-center align-items-center me-2">
                            <button class="btn btn-primary w-100 mb-2" 
                                    type="button" 
                                    data-bs-toggle="offcanvas" 
                                    data-bs-target="#offcanvasWithEdit{{ $perfume->id }}" 
                                    aria-controls="offcanvasWithEdit">
                                Modifica
                            </button>

                            {{-- Offcanvas per modifica profumo --}}
                            @include('components.offcanvas-edit-perfumes', ['perfume' => $perfume])

                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $perfume->id }}">
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
