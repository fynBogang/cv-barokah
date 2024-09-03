<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
    Import Data
</button>

<!-- Modal -->
<div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('petugas.import') }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group form-default">
                        <input type="file" name="file" class="form-control" required="required">
                        <span class="form-bar"></span>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
