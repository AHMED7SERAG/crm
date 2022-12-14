<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
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
            $data = Project::query();
            return DataTables::of($data)
                ->editColumn('name', function($row) {
                return $row->name;
            })
                ->addColumn('actions', function ($row){
                    $btn = '<a href="'. route('admin.project.edit', $row->id) .'" class="btn btn-success btn-sm"><i class=" fas  fa-edit"></i> </a>';
                    $btn .= '<a href="'. route('admin.project.show', $row->id) .'" class="btn btn-primary btn-sm ml-1 mr-1"><i class="fas  fa-eye"></i> </a>';
                    $btn .= '<form action="'. route('admin.project.destroy', $row->id) .'" class="my-1 my-xl-0" method="post" style="display: inline-block;">';
                    $btn .= '<input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'.csrf_token().'">';
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm ml-1 mr-1 btn-jinja-delete"><i class="fas  fa-trash"></i> </button>';
                    $btn .= '</form>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $project = new Project();
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.project.create', compact(['project', 'languages']));
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
        $model = new Project();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation($transFields,['name'=>'']);
$this->validate($request, array_merge([],$validationRulesTranslatable));

        $requestData = $request->all();
        $requestExceptData = $request->except($allFieldLangs);
        $requestTranslatableData = $request->only($allFieldLangs);
        if(count($requestTranslatableData) > 0){
            $requestTranslatableData = \App\Helpers\GettingMultiLanguagesFields::getMultiLanguage($transFields, $requestTranslatableData);
            $requestData = array_merge($requestExceptData, $requestTranslatableData);
        }

        
        Project::create($requestData);

        return redirect('admin/project')->with('flash_message',  __('general.added_successfully'));
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
        $project = Project::findOrFail($id);
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.project.show', compact(['project', 'languages']));
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
        $project = Project::findOrFail($id);
        $languages = \App\Models\Language::select('code', 'name', 'id')->get();
        return view('admin.project.edit', compact(['project', 'languages']));
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
        $model = new Project();
        $transFields = $model->getTranslatableFields();
        $allFieldLangs = \App\Helpers\GettingMultiLanguagesFields::getAllFieldLangs($transFields);

        $validationRulesTranslatable = \App\Helpers\ValidationRules::getValidation($transFields,['name'=>'']);
$this->validate($request, array_merge([],$validationRulesTranslatable));

        $requestData = $request->all();
        $requestExceptData = $request->except($allFieldLangs);
        $requestTranslatableData = $request->only($allFieldLangs);
        if(count($requestTranslatableData) > 0){
            $requestTranslatableData = \App\Helpers\GettingMultiLanguagesFields::getMultiLanguage($transFields, $requestTranslatableData);
            $requestData = array_merge($requestExceptData, $requestTranslatableData);
        }

        
        $project = Project::findOrFail($id);
        $project->update($requestData);

        return redirect('admin/project')->with('flash_message', __('general.updated_successfully'));
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
        Project::destroy($id);

        return redirect('admin/project')->with('flash_message', __('general.deleted_successfully'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $data = Project::FindOrFail($recordId);
            $data->delete();

        }//end of for each

        return redirect('admin/project')->with('flash_message',  __('general.deleted_successfully'));
    }// end of bulkDelete
}
