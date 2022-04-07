@props(['model', 'attributeValues' => null])

<section class="row">
    @foreach ($model->attributes as $attribute)
        <section class="my-1 col-12 col-md-6">

            <label for="{{ $attribute->id }}">
                {{ $attribute->name }}
            </label>


            <select name="attributeValues[{{ $attribute->id }}]" id="{{ $attribute->id }}"
                class="form-control form-control-sm">
                <option value="">انتخاب</option>

                @foreach ($attribute->defaultValues as $defaultValue)
                    <option value="{{ $defaultValue->id }}" @selected(in_array($defaultValue->id, $attributeValues))>
                        {{ $defaultValue->value }}
                    </option>
                @endforeach
            </select>
        </section>
    @endforeach
</section>
