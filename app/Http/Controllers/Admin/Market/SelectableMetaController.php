<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\SelectableMeta;
use App\Models\Market\SelectableMetaValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectableMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                SelectableMeta::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with(['values' => fn ($query) => $query->take(5)])
                    ->get()
            )->toJson();
        }
        return view('admin.market.selectable-metas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.selectable-metas.create');
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
            'values' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ]);

        DB::transaction(function () use ($request) {
            $meta = SelectableMeta::create($request);
            $request['values'] = str_replace(',,', ',', $request['values']);

            collect(explode(',', $request['values']))->each(function ($value) use ($meta) {
                $meta->values()->create(['value' => $value]);
            });
        });

        return to_route('admin.market.selectableMetas.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SelectableMeta $selectableMeta)
    {
        $selectableMeta->load('values');

        $selectableMeta = collect($selectableMeta);
        $values = '';

        collect($selectableMeta['values'])->each(function ($meta) use (&$values) {
            $values .= ',' . $meta['value'];
        });

        $selectableMeta['values'] = trim($values, ',');

        return view('admin.market.selectable-metas.edit', compact('selectableMeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelectableMeta $selectableMeta)
    {
        $request = $request->validate([
            'name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'values' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ]);

        DB::transaction(function () use ($request, $selectableMeta) {
            $selectableMeta->update($request);
            $selectableMeta->values()->delete();
            $request['values'] = str_replace(',,', ',', $request['values']);

            collect(explode(',', $request['values']))->each(function ($value) use ($selectableMeta) {
                $selectableMeta->values()->create(['value' => $value]);
            });
        });

        return to_route('admin.market.selectableMetas.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectableMeta $selectableMeta)
    {
        $selectableMeta->delete();

        return to_route('admin.market.selectableMetas.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
