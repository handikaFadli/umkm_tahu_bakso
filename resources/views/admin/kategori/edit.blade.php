<!-- Modal -->
<div class="modal fade" id="edit-{{ $ktgr->id_kategori }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="editLabel">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.update', $ktgr->id_kategori) }}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nm_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" value="{{ $ktgr->nm_kategori }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button> 
            </form>
            </div>
        </div>
    </div>
</div>
