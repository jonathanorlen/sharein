<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-5 text-center">
                <p>Apakah anda yakin menghapus data ini?.</p>
            </div>
            <div class="modal-footer border-top-0">
                <div class="row w-100 p-0">
                    <div class="col-6 px-1">
                        <div class="d-grid">
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    <div class="col-6 px-1">
                        <div class="d-grid">
                            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal"
                                wire:click="delete()">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
