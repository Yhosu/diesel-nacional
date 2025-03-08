{{-- x-capyei.field --}}
@props([
    'type'          => 'text',
    'name',
    'id',
    'customId'      => false,
    'label'         => '',
    'value'         => null,
    'disabled'      => false,
    'required'      => false,
    'multiple'      => false,
    'errors',
    'fill'          => true,
    'hasLabel'      => true,
    'subtext'       => null,
    'property'      => '',
    'propertyField' => '',
    'propertyLabel' => '',
    'placeholder'   => '',
    'classField'    => '',
    'min'           => null,
    'max'           => null,
    'description',
    'options'
])

<div {{ $attributes->merge(['class' => "content__field " . ($fill ? 'fill' : '') . ""]) }}>
    <div class="d-block" {!! $property !!}>
        @if ($type == 'select')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            {{-- @if (isset($slot))
                {{ $slot }}
            @else --}}
                <select name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} class="{{ $classField }} form-control" {{ $multiple ? 'multiple="multiple"' : '' }}
                    {!! $propertyField !!}
                >
                    @if ($placeholder)
                        <option value="" disabled>{{ $placeholder }}</option>
                    @endif
                    {{-- @foreach ($options as $value_option => $text)
                        <option {{ $value == $value_option ? 'selected' : '' }} value="{{ $value_option }}">{{ $text }}</option>
                    @endforeach --}}
                    <option value="">--Seleccione una opción--</option>
                    @foreach ($options as $option)
                        <option {{ $value == $option['key'] || $option['key'] == request()->$name ?  'selected' : '' }} value="{{ $option['key'] }}">{{ $option['value'] }}</option>
                    @endforeach
                </select>
            {{-- @endif --}}
        @elseif($type == 'checkbox' || $type == 'radio')
            <div class="form-check">
                <div class="{{ $type }}__field">
                    <input type="{{ $type }}" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-check-input" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}
                        {!! $propertyField !!}
                    >
                    <span></span>
                </div>
                @if($hasLabel)
                    <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-check-label"
                        {!! $propertyLabel !!}>
                        <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                    </label>
                @endif
            </div>
        @elseif($type == 'switch')
            <div class="form-check form-switch">
                <div class="{{ $type }}__field">
                    <input type="checkbox" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-check-input" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}
                        {!! $propertyField !!}
                    >
                    <span></span>
                </div>
                @if($hasLabel)
                    <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-check-label"
                        {!! $propertyLabel !!}>
                        <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                    </label>
                @endif
            </div>
        @elseif($type == 'textarea')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <div class="{{ $type }}__field">
                <textarea name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-control" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} rows="3"
                    {!! $propertyField !!}
                >{{ $value ?? '' }}</textarea>
                <span></span>
            </div>
        @elseif($type == 'froala')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <div class="{{ $type }}__field" wire:ignore>
                <textarea name="{{ $name }}" value="{!! $description ?? '' !!}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-control froala-textarea" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} rows="3"
                    {!! $propertyField !!}
                >{{ $value ?? '' }}</textarea>
                <span></span>
            </div>            
        @elseif($type == 'date')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <div class="d-block" wire:ignore>
                <input placeholder="{{ $placeholder }}" type="date" value="{{ $value ?? request()->$name ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} flatpickr-basic form-control" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {{ $min ? 'min='.$min : '' }} {{ $max ? 'max='.$max : '' }}
                    {!! $propertyField !!}
                >
            </div>
        @elseif($type === 'password')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <div class="input-group input-group-merge form-password-toggle">
                <input placeholder="{{ $placeholder }}" type="password" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" aria-describedby="password" class="{{ $classField }} form-control form-control-merge" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {{ $min ? 'min='.$min : '' }} {{ $max ? 'max='.$max : '' }}
                    {!! $propertyField !!}
                >
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
        @elseif($type === 'boolean')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <select name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} class="{{ $classField }} form-control"
                {!! $propertyField !!}
            >
                @if ($placeholder)
                    <option value="" disabled>{{ $placeholder }}</option>
                @endif
                <option {{ $value == '0' ? 'selected' : '' }} value="0">No</option>
                <option {{ $value == '1' ? 'selected' : '' }} value="1">Si</option>
            </select>
        @elseif($type === 'image')
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <input placeholder="{{ $placeholder }}" type="file" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-control" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {{ $min ? 'min='.$min : '' }} {{ $max ? 'max='.$max : '' }}
                {!! $propertyField !!}
            >
        @else
            @if($hasLabel)
                <label for="{{ $customId ? ('field__custom-'.$id) : $id }}" class="form-label"
                    {!! $propertyLabel !!}>
                    <b>{{ $label }} @if($subtext) {!! $subtext !!} @endif</b>
                </label>
            @endif
            <input placeholder="{{ $placeholder }}" type="{{ $type }}" value="{{ $value ?? request()->$name ?? '' }}" name="{{ $name }}" id="{{ $customId ? ('field__custom-'.$id) : $id }}" class="{{ $classField }} form-control" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {{ $min ? 'min='.$min : '' }} {{ $max ? 'max='.$max : '' }}
                {!! $propertyField !!}
            >
        @endif
    </div>
    @if ($errors)
        <div class="d-block">
            @foreach ((array) $errors as $error)
                <span class="error d-block">{{ $error }}</span>
            @endforeach
        </div>
    @endif
</div>