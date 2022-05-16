<div class="col-md-6 pe-md-5 side-left">
    <div class="row mt-5 mb-5 pb-3">
        <div class="col-md-12">
            <div class="card p-4 border-neutral-20 border">
                <div class="mb-3 container">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-6 col-xxl-6 position-relative mx-auto">
                            <img src="@if($old_profile_picture) {{ asset('uploads/profile/'.$old_profile_picture) }}  @else {{ asset('attribute/square.jpg') }}  @endif" class="" alt="logo" style="width: 100%;border-radius: 50%;display: block;">
                            <label class="btn btn-primary btn-circle position-absolute top-0 start-100 translate-btn-image badge rounded-pill" style="height:36px; width:36px;padding-top:6px !important" for="logo"><img src="{{ asset('icons/edit-white.svg') }}"></label>
                            <input type="file" name="logo" id="logo" class="d-none" wire:model="profile_picture">
                            <input type="file" name="logo_old" id="logo_old" class="d-none" wire:model="old_profile_picture">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Profile Title</label>
                    <input type="text" wire:change="update($event.target.value,{{ '"profile_title"' }})"
                        wire:model="profile_title" class="form-control @error('profile_title') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('profile_title')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Bio</label>
                    <textarea name="" wire:change="update($event.target.value,{{ '"bio"' }})" id="" cols="30" rows="3" wire:model="bio" class="form-control @error('bio') is-invalid @enderror"></textarea>
                    @error('bio')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">About</label>
                    <textarea name="" id="" wire:change="update($event.target.value,{{ '"about"' }})" cols="30" rows="10" wire:model="about" class="form-control @error('about') is-invalid @enderror"></textarea>
                    @error('about')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            .image-ratio {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                width: 100%;
                padding-top: 100%;
                /* 1:1 Aspect Ratio */
                position: relative;
                /* If you want text inside of it */
            }

            .draggable-mirror {
                background-color: white !important;
                width: 50%;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                list-style-type: none;
            }

            .side-left {
                height: calc(100vh - 110px);
                overflow-y: scroll;
            }

            /* width */
            ::-webkit-scrollbar {
                width: 4px;
                border-radius: 10px
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

        </style>
    @endpush
</div>
