<div>
    <div class="modal fade text-white " id="deleteModal{{ $perfume->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $perfume->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: darkgray;">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalLabel{{ $perfume->id }}">
                        Elimina il profumo
                    </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-start fs-5">
                    Sei sicur* di voler eliminare il profumo: <strong>{{$perfume->name_perfume}}</strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Indietro</button>
                    <form action="{{ route('admin.perfumes.destroy', [$perfume->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
