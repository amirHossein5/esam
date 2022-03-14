<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeField;
use App\Models\Market\ProductCategory;
use App\View\Components\Admin\Market\Attribute\InputParser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

class AttributeController extends Controller
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
    public function create()
    {
        $productCategories = ProductCategory::get(['name', 'id']);
        $field_types = AttributeField::get();

        return view('admin.market.attribute.create', compact('productCategories', 'field_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $request = $request->validated();

        $fieldName = DB::table('attribute_fields')
            ->where('id', request()->field_type)
            ->value('name');

        // value check
        if (AttributeField::mustHasValue($fieldName) and !isset($request['value'])) {
            return back()
                ->withInput()
                ->withErrors([
                    'value' =>
                    __('validation.required', ['attribute' => __('validation.attributes.value')])
                ]);
        }

        if (!$hasValue = AttributeField::hasValue($fieldName) and isset($request['value'])) {
            unset($request['value']);
        }

        // validation check
        if (!AttributeField::hasValidations($fieldName) and isset($request['validations'])) {
            unset($fieldName['validations']);
        }

        if (isset($request['validations'])) {
            foreach (array_keys($request['validations']) as $validation) {
                if (!AttributeField::hasValidationRule($fieldName, $validation)) {
                    unset($request['validations'][$validation]);
                }
            }
        }

        if (AttributeField::hasValidations($fieldName)) {
            if (!isset($request['validations'])) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'validations.*' =>
                        __('validation.required', ['attribute' => __('validation.attributes.validation')])
                    ]);
            }

            if (
                array_diff(
                    AttributeField::getRequiredRules($fieldName),
                    array_keys(array_filter($request['validations']))
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
            $productCategory = ProductCategory::with('children')
                ->findOrFail($request['attributable_id']);

            $categories = $this->getNestedCategories($productCategory->children)->reject(function ($category) {
                return $category->attributes->isNotEmpty();
            })->add($productCategory);

            $categories->each(function ($category) use ($request, $hasValue) {
                $attribute = $category
                    ->attributes()
                    ->create(collect($request)->except(['value'])->toArray());

                if ($hasValue and isset($request['value'])) {
                    if (preg_match('/,/', $request['value'])) {
                        $request['value'] = explode(',', $request['value']);
                    } else {
                        $request['value'] = [$request['value']];
                    }

                    collect($request['value'])->each(function ($value) use ($attribute) {
                        $attribute->default_values()->create(['value' => $value]);
                    });
                }
            });
        });

        return redirect()
            ->route('admin.market.attribute.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Gets just nested categories.
     */
    private function getNestedCategories(Collection $productCategory): Collection
    {
        $models = collect();

        foreach ($productCategory as $category) {
            $models->add($category);

            if (isset($category['children'])) {
                $models->add($this->getNestedCategories($category['children']));
            }
        }

        return $models->flatten();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $category = ProductCategory::with('attributes.attribute_field', 'attributes.default_values.attributes.attribute_field')
            ->findOrFail($request->get('category'));

        return view('admin.market.attribute.show', compact('category'));
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

    public function getInputParser(): Response
    {
        $input = View::make('components.admin.market.attribute.input-parser')
            ->with([
                'attribute' => collect(json_decode(request()->attribute, true)),
                'class' => "form-control form-control-sm",
                'checkboxDivClasses' => 'my-3',
                'label' => ' :label ',
                'rootClasses' => 'valueAttribute',
                'attributes' => null
            ])->render();

        return response(['input' => $input]);
    }
}
