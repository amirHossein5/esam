<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\AttributeValueRequest;
use App\Models\Attribute;
use App\Models\AttributeDefaultValue;
use App\Models\AttributeField;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::get(['name', 'id']);

        return view('admin.market.attribute.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Attribute $attribute, ProductCategory $productCategory)
    {
        $productCategory->load(['attributes' => function ($query) {
            return $query->selectBox()->with('default_values');
        }]);

        $default_values = collect($productCategory->attributes)->pluck('default_values')->flatten();

        $field_types = AttributeField::get();

        return view('admin.market.attribute.value.create', compact('default_values', 'field_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeValueRequest $request)
    {
        $request = $request->validated();

        $fieldName = DB::table('attribute_fields')
            ->where('id', request()->field_type)
            ->value('name');

        // value check
        if (AttributeField::mustHasValue($fieldName) and ! isset($request['value'])) {
            return back()
                ->withInput()
                ->withErrors(['value' =>
                    __('validation.required', ['attribute' => __('validation.attributes.value')])
                ]);
        }

        if (! $hasValue = AttributeField::hasValue($fieldName) and isset($request['value'])) {
            unset($request['value']);
        }

        // validation check
        if (! AttributeField::hasValidations($fieldName) and isset($request['validations'])) {
            unset($fieldName['validations']);
        }

        if (isset($request['validations'])) {
            foreach (array_keys($request['validations']) as $validation) {
                if (! AttributeField::hasValidationRule($fieldName, $validation)) {
                    unset($request['validations'][$validation]);
                }
            }
        }

        if (AttributeField::hasValidations($fieldName)) {
            if (! isset($request['validations'])) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'validations.*' =>
                        __('validation.required', ['attribute' => __('validation.attributes.validation')])
                    ]);
            }

            if (
                array_diff(
                    AttributeField::getRequiredRules($fieldName), array_keys(array_filter($request['validations']))
                )
            ) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'validations.*' =>
                        __('validation.required', ['attribute' => __('validation.attributes.validation')])
                    ]);
            }
        }

        DB::transaction(function () use ($request, $hasValue) {
            $attribute = AttributeDefaultValue::findOrFail($request['attributable_id'])
                ->attributes()
                ->create(collect($request)->except(['value'])->toArray());

            if ($hasValue and isset($request['value'])) {
                if (preg_match('/,/', $request['value'])) {
                    $request['value'] = explode(',', $request['value']);
                } else {
                    $request['value'] = [ $request['value'] ];
                }

                collect($request['value'])->each(function ($value) use ($attribute) {
                    $attribute->default_values()->create(['value' => $value]);
                });
            }
        });

        return redirect()
            ->route('admin.market.attribute.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
