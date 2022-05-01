<div class="card">
    <div class="card-header">
        {{ trans('global.my_profile') }}
    </div>

    <div class="card-body">
        <form wire:submit.prevent="updateprofile">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>

                {{--wait before sending the request--}}
{{--                <input wire:model.debounce.1s="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>--}}
{{--                <input wire:model.debounce.500ms="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>--}}

                {{--when field loses focus:recommended approach--}}
{{--                <input wire:model.lazy="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>--}}

                {{--value is passed to server on next network request --}}
{{--                <input wire:model.defer="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>--}}

{{--                <input wire:model="user.name" wire:keydown="checkname" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>--}}

                <input wire:model="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required>
                @if($errors->has('user.name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user.name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                <input wire:model="user.email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            @if ($success)
                <div class="alert alert-success mt-2">Successfully saved.</div>
            @endif
        </form>

        {{--invoking the function in the--}}
{{--        <button type="button" wire:click="toggleHelp">Show/hide help section</button>--}}

{{--        <button type="button" wire:click="$set('public property','something')">Show/hide help section</button>--}}
{{--        <button type="button" wire:click="$set('showHelp','true')">Show/hide help section</button>--}}

        <button type="button" wire:click="$toggle('showHelp')">Show/hide help section</button>
        @if ($showHelp)
            <div class="alert alert-info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed lorem pellentesque, euismod nisl nec, interdum ipsum. Vestibulum rhoncus libero id sem porta venenatis. Donec dictum ullamcorper eros eget bibendum. Mauris ornare ullamcorper risus et suscipit. Suspendisse ornare non arcu sagittis bibendum. Vivamus ipsum nunc, pellentesque nec finibus in, imperdiet sit amet enim. Nunc fringilla mi leo, ut pharetra nunc venenatis sit amet.
            </div>
        @endif
    </div>
</div>
