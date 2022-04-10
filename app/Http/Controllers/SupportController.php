<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;

class SupportController extends Controller
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
                Support::questions()
                    ->with('product')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        DB::table('supports')
            ->where('seen', 0)
            ->update(['seen' => 1]);

        $supportMod = 'همه پشتیبانی ها';

        return view('admin.support.index', compact('supportMod'));
    }

    /**
     * Display a closed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        if (request()->wantsJson()) {
            return datatables(
                Support::questions()
                    ->isClose()
                    ->with('product')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        DB::table('supports')
            ->where('seen', 0)
            ->update(['seen' => 1]);

        $supportMod = 'پشتیبانی های بسته';

        return view('admin.support.index', compact('supportMod'));
    }

    /**
     * Display a open listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function open()
    {
        if (request()->wantsJson()) {
            return datatables(
                Support::questions()
                    ->isOpen()
                    ->with('product')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        DB::table('supports')
            ->where('seen', 0)
            ->update(['seen' => 1]);

        $supportMod = 'پشتیبانی های باز';

        return view('admin.support.index', compact('supportMod'));
    }

    /**
     * Shows the question.
     *
     * @param int $question
     * @return \Illuminate\View\View
     */
    public function show(int $question): View
    {
        $question = Support::questions()
            ->with('answers.user', 'user', 'product')
            ->findOrFail($question);

        $question->seen = Support::SEEN;
        $question->save();

        return view('admin.support.show', compact('question'));
    }

    /**
     * Store a resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $question
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $question)
    {
        $question = Support::questions()
            ->findOrFail($question);

        $request = $request->validate([
            'description' => 'required|string'
        ]);

        $request['title'] = $question->title;
        $request['user_id'] = 2;
        $request['product_id'] = $question->product_id;
        $request['description'] = Purifier::clean($request['description']);

        $question->answers()->create($request);

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت ثبت  شد');
    }

    /**
     * Edit page of editing an answer.
     *
     * @param int $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(int $answer)
    {
        $answer = Support::justAnswers()
            ->findOrFail($answer);

        return view('admin.support.edit', compact('answer'));
    }

    /**
     * Update an answer.
     *
     * @param int $answer
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $answer)
    {
        $answer = Support::justAnswers()
            ->findOrFail($answer);

        $request = $request->validate([
            'description' => 'required|string'
        ]);

        $answer->update($request);

        return to_route('admin.support.show', $answer->question_id)
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش  شد');
    }

    /**
     * Destroy an answer.
     *
     * @param int $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $answer)
    {
        $answer = Support::justAnswers()
            ->findOrFail($answer);

        $answer->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes support's statuses.
     *
     * @param string|int $question
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(string|int $question)
    {
        $question = Support::questions()
            ->findOrFail($question);

        $question->status = !$question->status;
        $result = $question->save();

        if (request()->wantsJson()) {
            return $result
                ? response(['checked' => $question->status])
                : response('', 500);
        }

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }
}
