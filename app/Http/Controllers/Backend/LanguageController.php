<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\LanguageServiceInterface as LanguageService;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;

class LanguageController extends Controller
{
    protected $languageService;
    protected $languageRepository;
    public function __construct
    (
        LanguageService $languageService,
        LanguageRepository $languageRepository

    )
    {
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;

    }


    public function index(Request $request){
        $languages = $this->languageService->paginate($request); 
        // $users = User::paginate(15); //Phương thức cũ, có thể sử dụng
        $config = [
                'js' =>[
                    'backend/js/plugins/switchery/switchery.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',



                ],
                'css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',

                    'backend/css/plugins/switchery/switchery.css'
                ]
            ];


        $config['seo'] = config('apps.language');
        $template = 'backend.language.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'languages'
        ));
    }

    public function create()
    {
       
        $config = $this->configData();
        $config['seo'] = config('apps.language');
        $config['method'] = 'create';
        $template = 'backend.language.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StoreLanguageRequest $request)
    {
        if($this->languageService->create($request)){
            flash()->success('Thêm mới thành công');
            return redirect()->route('language.index');
        }
        flash()->error('Thêm mới thất bại');
        return redirect()->route('language.index');

    }

    public function edit($id){
        $config = $this->configData();
        $language = $this->languageRepository->findById($id);
        $config['seo'] = config('apps.language');
        $config['method'] = 'edit';
        $template = 'backend.language.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'language'
        ));
    }

    public function update($id, UpdateLanguageRequest $request)
    {
        if($this->languageService->update($id, $request)){
            flash()->success('Cập nhật thành công');
            return redirect()->route('language.index');
        }
        flash()->success('Cập nhật thất bại. Vui lòng thử lại.');
        return redirect()->route('language.index');
    }

    public function delete($id){
        $config['seo'] = config('apps.language');
        $language = $this->languageRepository->findById($id);
        $template = 'backend.language.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'language',
            'config'
        ));
    }

    public function destroy($id){
        if($this->languageService->destroy($id)){
            flash()->success('Xóa thành công');
            return redirect()->route('language.index');
        }
        flash()->success('Xóa thất bại. Vui lòng thử lại.');
        return redirect()->route('language.index');
    }

    private function configData(){
        return [
            'js' => [
                'backend/plugin/ckfinder_2/ckfinder.js',
                'backend/library/finder.js'
            ]
        ];
    }
}
