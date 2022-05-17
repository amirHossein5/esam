@props(['model', 'attributeValues' => null, 'tailwind' => false])

<section class="row">
    @forelse ($model->attributes as $attribute)
        @if (!$tailwind)
            <section class="my-1 col-12 col-md-6">

                <label for="{{ $attribute->id }}">
                    {{ $attribute->name }}
                </label>


                <select name="attributeValues[{{ $attribute->id }}]" id="{{ $attribute->id }}"
                    class="form-control form-control-sm">
                    <option value="">انتخاب</option>

                    @foreach ($attribute->defaultValues as $defaultValue)
                        <option value="{{ $defaultValue->id }}" @selected(in_array($defaultValue->id, $attributeValues ?? []))>
                            {{ $defaultValue->value }}
                        </option>
                    @endforeach
                </select>
            </section>
        @else
            <section class="my-1 w-full md:w-1/2 p-1">

                <x-label for="{{ $attribute->id }}">
                    {{ $attribute->name }}
                </x-label>


                <x-select name="attributeValues[{{ $attribute->id }}]" id="{{ $attribute->id }}"
                    class="w-full rtl">
                    <option value="">انتخاب</option>

                    @foreach ($attribute->defaultValues as $defaultValue)
                        <option value="{{ $defaultValue->id }}" @selected(in_array($defaultValue->id, $attributeValues ?? []))>
                            {{ $defaultValue->value }}
                        </option>
                    @endforeach
                </x-select>
            </section>
        @endif
    @empty

    @endforelse
</section>
