<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\LandingPageCopan;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Discount\LandingPageCopan\StoreLandingPageCopanRequest;
use App\Http\Requests\Admin\Market\Discount\LandingPageCopan\UpdateLandingPageCopanRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class LandingPageCopanController extends Controller
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
                LandingPageCopan::skip(request()->start)
                    ->take(request()->length)
                    ->with('copan:code,id')
                    ->get()
            )->toJson();
        }

        return view('admin.market.discount.landing-page-copans.index');
    }

    /**
     * Create a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $copans = DB::table('copans')->get(['code', 'id']);

        return view('admin.market.discount.landing-page-copans.create', compact('copans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandingPageCopanRequest $request)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        $request['image'] = $request['image']
            ->store('images/landingPageCopans', 'public');

        if (!$request['image']) {
            return $this->imageError();
        }

        LandingPageCopan::create($request);

        return redirect()
            ->route('admin.market.discount.landingPageCopans.index')
            ->with('sweetalert-mixin-success', 'با موفقیت اضافه شد');
    }

    /**
     * Edit a listing of the resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingPageCopan $landingPageCopan)
    {
        $copans = DB::table('copans')->get(['code', 'id']);

        return view('admin.market.discount.landing-page-copans.edit', compact('landingPageCopan', 'copans'));
    }

    /**
     * Update a created resource in storage.
     *
     * @param \App\Models\Market\Copan $copan
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLandingPageCopanRequest $request, LandingPageCopan $landingPageCopan)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        if (isset($request['image'])) {
            $request['image'] = $request['image']
                ->store('images/landingPageCopans', 'public');

            if (!$request['image']) {
                return $this->imageError();
            }

            Image::rm($landingPageCopan->image);
        }

        $landingPageCopan->update($request);

        return redirect()
            ->route('admin.market.discount.landingPageCopans.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Delete a resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LandingPageCopan $landingPageCopan)
    {
        Image::rm($landingPageCopan->image);

        $landingPageCopan->delete();

        return redirect()
            ->route('admin.market.discount.landingPageCopans.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes status of resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(LandingPageCopan $landingPageCopan): Response
    {
        if ($landingPageCopan->status === 0) {
            $canBeActive = LandingPageCopan::where('end_date', '>=', now())
                ->where('id', $landingPageCopan->id)
                ->exists();

            if (!$canBeActive) {
                return response(['message' => 'از تاریخ پایان گذشته است'], SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            $canBeActive = $landingPageCopan->copan->end_date->gte(now());

            if (!$canBeActive) {
                return response(['message' => 'از تاریخ پایان  کپن گذشته است'], SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            LandingPageCopan::where('status', 1)->update([
                'status' => 0
            ]);
        }

        $landingPageCopan->status = !$landingPageCopan->status;
        $result = $landingPageCopan->save();

        return $result
            ? response(['checked' => $landingPageCopan->status])
            : response('', 500);
    }
}
