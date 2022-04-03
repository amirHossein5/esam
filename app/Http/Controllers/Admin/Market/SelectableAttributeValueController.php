<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\SelectableAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectableAttributeValueController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.selectable-attribute-values.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'attribute_id' => 'required|numeric|exists:selectable_attributes,id',
            'values' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'background' => 'nullable|regex:/^#[a-zA-Z0-9]{6}$/'
        ]);

        $attribute = SelectableAttribute::findOrFail($request);
        $request['values'] = str_replace(',,', ',', $request['values']);

        collect(explode(',', $request['values']))->each(function ($value) use ($attribute) {
            $attribute->values()->create(['value' => $value]);
        });

        return to_route('admin.market.selectableAttributes.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SelectableAttribute $selectableAttribute)
    {
        $selectableAttribute->load('values');

        $selectableAttribute = collect($selectableAttribute);
        $values = '';

        collect($selectableAttribute['values'])->each(function ($attribute) use (&$values) {
            $values .= ',' . $attribute['value'];
        });

        $selectableAttribute['values'] = trim($values, ',');

        return view('admin.market.selectable-attributes.edit', compact('selectableAttribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelectableAttribute $selectableAttribute)
    {

    }
}
