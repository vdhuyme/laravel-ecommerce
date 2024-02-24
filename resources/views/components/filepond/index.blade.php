@props([
    'name' => '',
    'id' => '',
    'multiple' => false,
    'model' => '',
    'label' => '',
    'fileSize' => '1MB'
])

<div
        wire:ignore
        x-data
        x-init="
                                                        FilePond.registerPlugin(FilePondPluginImagePreview);
                                                        FilePond.registerPlugin(FilePondPluginFileValidateSize);
                                                        FilePond.create($refs.input);
                                                        FilePond.setOptions({
                                                            acceptedFileTypes: ['image/*'],
                                                            server: {
                                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                    @this.upload('{{ $model }}', file, load, error, progress)

                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('{{ $model }}', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">

    <x-admin.input
            :label="$label"
            type="file"
            :name="$name"
            :id="$id"
            data-max-file-size="{{ $fileSize }}"
            x-ref="input"
            {{ $multiple ? 'multiple' : '' }}
            wire:model="{{ $model ?: '' }}" />

    @error($model) @dd($message)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>