<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('can:read_users')->only(['index']);
//        $this->middleware('can:create_users')->only(['create', 'store']);
//        $this->middleware('can:update_users')->only(['edit', 'update']);
//        $this->middleware('can:delete_users')->only(['delete', 'bulk_delete']);
    }// end of __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Task::query();
            return DataTables::of($data)
                ->editColumn('name', function($row) {
                return $row->name;
            })
                ->addColumn('actions', function ($row){
                    $btn = '<a href="'. route('admin.task.edit', $row->id) .'" class="btn btn-success btn-sm"><i class=" fas  fa-edit"></i> </a>';
                    $btn .= '<a href="'. route('admin.task.show', $row->id) .'" class="btn btn-primary btn-sm ml-1 mr-1"><i class="fas  fa-eye"></i> </a>';
                    $btn .= '<form action="'. route('admin.task.destroy', $row->id) .'" class="my-1 my-xl-0" method="post" style="display: inline-block;">';
                    $btn .= '<input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'.csrf_token().'">';
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm ml-1 mr-1 btn-jinja-delete"><i class="fas  fa-trash"></i> </button>';
                    $btn .= '</form>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $task = new Task();
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.task.create', compact(['task', 'languages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = new Task();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation($transFields,['name'=>'','employee_id'=>'','project_id'=>'']);
        $this->validate($request, array_merge(['employee_id'=>'required','project_id'=>'required'],$validationRulesTranslatable));

        $requestData = $request->all();
        $requestExceptData = $request->except($allFieldLangs);
        $requestTranslatableData = $request->only($allFieldLangs);
        if(count($requestTranslatableData) > 0){
            $requestTranslatableData = \App\Helpers\GettingMultiLanguagesFields::getMultiLanguage($transFields, $requestTranslatableData);
            $requestData = array_merge($requestExceptData, $requestTranslatableData);
        }


        Task::create($requestData);

        return redirect('admin/task')->with('flash_message',  __('general.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.task.show', compact(['task', 'languages']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.task.edit', compact(['task', 'languages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = new Task();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation($transFields,['name'=>'','employee_id'=>'','project_id'=>'']);
$this->validate($request, array_merge(['employee_id'=>'required','project_id'=>'required'],$validationRulesTranslatable));

        $requestData = $request->all();
        $requestExceptData = $request->except($allFieldLangs);
        $requestTranslatableData = $request->only($allFieldLangs);
        if(count($requestTranslatableData) > 0){
            $requestTranslatableData = \App\Helpers\GettingMultiLanguagesFields::getMultiLanguage($transFields, $requestTranslatableData);
            $requestData = array_merge($requestExceptData, $requestTranslatableData);
        }


        $task = Task::findOrFail($id);
        $task->update($requestData);

        return redirect('admin/task')->with('flash_message', __('general.updated_successfully'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('admin/task')->with('flash_message', __('general.deleted_successfully'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $data = Task::FindOrFail($recordId);
            $data->delete();

        }//end of for each

        return redirect('admin/task')->with('flash_message',  __('general.deleted_successfully'));
    }// end of bulkDelete
}
