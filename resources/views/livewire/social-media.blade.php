<div class="col-md-6 pe-md-5 side-left">
    <div class="row mt-5 mb-5 pb-3">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"whatsapp"' }})"
                        wire:model="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="+62 890-7897-XXXX">
                    @error('whatsapp')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Line</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"line"' }})"
                        wire:model="line" class="form-control @error('line') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('line')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"instagram"' }})"
                        wire:model="instagram" class="form-control @error('instagram') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('instagram')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Twitter</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"twitter"' }})"
                        wire:model="twitter" class="form-control @error('twitter') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('twitter')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"facebook"' }})"
                        wire:model="facebook" class="form-control @error('facebook') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('facebook')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tik-Tok</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"tiktok"' }})"
                        wire:model="tiktok" class="form-control @error('tiktok') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('tiktok')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" wire:change="updateSocialMedia($event.target.value,{{ '"email"' }})"
                        wire:model="email" class="form-control @error('email') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('email')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telegram</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"telegram"' }})"
                        wire:model="telegram" class="form-control @error('telegram') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('telegram')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Youtube</label>
                    <input type="text" wire:change="updateSocialMedia($event.target.value,{{ '"youtube"' }})"
                        wire:model="youtube" class="form-control @error('youtube') is-invalid @enderror"
                        id="exampleFormControlInput1" placeholder="">
                    @error('youtube')
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
