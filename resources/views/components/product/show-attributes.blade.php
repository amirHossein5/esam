@props(['model'])

<section class="row">
    @foreach ($model->attributes as $attribute)
        <section class="col-12 col-md-6 my-1">

            <label for="{{ $attribute->id }}">
                {{ $attribute->name }}
            </label>


            <select name="attributeValues[{{ $attribute->id }}]" id="{{ $attribute->id }}"
                class="form-control form-control-sm">
                <option value="">انتخاب</option>

                @foreach ($attribute->defaultValues as $defaultValue)
                    <option value="{{ $defaultValue->id }}" @selected(in_array($defaultValue->id, old('attributeValues') ?? []))>
                        {{ $defaultValue->value }}
                    </option>
                @endforeach
            </select>

            @error('attributeValues.' . $attribute->id)
                <div class="my-1 text-danger">
                    {{ $message }}
                </div>
            @enderror
        </section>
    @endforeach
</section>
