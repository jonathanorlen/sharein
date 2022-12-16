<div class="row">
    <h2>Dashboard</h2>
    <div class="col-12">
        <div class="card p-4">
            <div class="row page-card">
                <div class="col-9 col-sm-4 col-md-2 page-card-item">
                    <div class="page-card-item-background">
                        <img src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg"
                            class="page-card-item-profile" alt="">
                        <p class="page-card-item-name">Orstelly Care</p>
                        <span class="badge badge-pill badge-success position-absolute">Aktif</span>
                        <img src="{{ asset('icons/edit-3.svg') }}" class="page-card-item-edit">
                    </div>
                </div>
                <div class="col-9 col-sm-4 col-md-2 page-card-item-add" data-bs-toggle="modal"
                    data-bs-target="#pageCreateModal">
                    <div class="page-card-item-background">
                        <i class="page-card-item-icon" data-feather="plus-square"></i>
                        <p class="page-card-item-name">Tambah Halaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('modal')
@endpush

@push('modals')
    <div class="modal fade" id="pageCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan username kamu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"
                                    id="basic-addon3"><strong>sharein.com/</strong>
                                </span>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Masukan Username">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top-0">
                    <div class="row w-100 p-0">
                        <div class="col-12 px-1">
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal"
                                    wire:click="delete()">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
