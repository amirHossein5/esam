<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\SelectableAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectableAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $selectableAttributes = SelectableAttribute::query()
                ->with(['values' => fn ($query) => $query->take(5)]);
            $count = $selectableAttributes->count();

            return datatables(
                $selectableAttributes
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->setTotalRecords($count)->skipPaging()->toJson();
        }
        return view('admin.market.selectable-attributes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.selectable-attributes.create');
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
            'name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ]);

        SelectableAttribute::create($request);

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

        $isColor = $selectableAttribute['name'] == SelectableAttribute::COLOR;

        if (!$isColor) {
            $selectableAttribute = collect($selectableAttribute);
            $values = '';

            collect($selectableAttribute['values'])->each(function ($attribute) use (&$values) {
                $values .= ',' . $attribute['value'];
            });

            $selectableAttribute['values'] = trim($values, ',');
        }

        return view('admin.market.selectable-attributes.edit', compact('selectableAttribute', 'isColor'));
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
        if ($isColor = $selectableAttribute->name != SelectableAttribute::COLOR) {
            $validation = ['values' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui'];
        } else {
            $validation = [
                'values.*' => 'required|distinct:strict|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
                'backgrounds.*' => 'required|distinct:strict|regex:/^#[a-zA-Z0-9]{6}$/'
            ];
        }

        $request = $request->validate([
            'name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ] + $validation, [], [
            'values.*' => __('validation.attributes.value'),
            'backgrounds.*' => __('validation.attributes.background'),
        ]);

        DB::transaction(function () use ($request, $selectableAttribute, $isColor) {
            $selectableAttribute->update($request);
            $selectableAttribute->values()->delete();

            if ($isColor) {
                $request['values'] = str_replace(',,', ',', $request['values']);

                collect(explode(',', $request['values']))->each(function ($value) use ($selectableAttribute) {
                    $selectableAttribute->values()->create(['value' => $value]);
                });
            } else {
                foreach (array_combine($request['values'], $request['backgrounds']) as $value => $background) {
                    $selectableAttribute->values()->create([
                        'value' => $value,
                        'background' => $background,
                    ]);
                }
            }
        });

        return to_route('admin.market.selectableAttributes.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectableAttribute $selectableAttribute)
    {
        $selectableAttribute->delete();

        return to_route('admin.market.selectableAttributes.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
