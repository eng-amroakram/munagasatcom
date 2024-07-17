<div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <label class="form-label"><strong>{{ $label }}</strong></label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="far fa-file-lines"></i>
        </span>

        <input type="file" wire:model.defer="{{ $name }}" class="form-control"
            placeholder="ارفق {{ $label }}" />

    </div>
    <div class="form-helper text-danger {{ $name }}-{{ $model }}-validation reset-validation">
    </div>
    <!-- Progress Bar -->
    <div x-show="uploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>
</div>
