<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\FaqDataTable;
use App\FaqQuestions;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\FaqRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Faq\Store;
use App\Http\Requests\Faq\Update;

class FaqController extends Controller
{
    protected $faqRepo;
    public function __construct(FaqRepository $faqRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->faqRepo = $faqRepository;
    }

    public function index(FaqDataTable $dataTable)
    {
        return $dataTable->render('dashboard.faq.index');
    }

    public function create()
    {
        return view('dashboard.faq.create');
    }

    public function store(Store $request)
    {
        $model=new FaqQuestions();
        $model->fill($request->input());

        $model->save();

        return redirect()->route('dashboard.faq');
    }

    public function edit($id)
    {
        $faq = $this->faqRepo->findFaqQuestionById($id);

        return view('dashboard.faq.edit', [
            'model' => $faq
            ]);
    }

    public function update(Update $request)
    {
        $faq = FaqQuestions::find($request->FaqID);
        $faq->fill($request->input());

        if ($faq->save()) {

            session()->flash('app_message', 'Faq successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Faq');
            }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $faq = FaqQuestions::find($id);

        if ($faq->delete()) {
                session()->flash('app_message', 'Faq successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Faq');
            }

        return redirect()->back();
    }
}
