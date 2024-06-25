<?php

namespace App\Services;

use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Services\Interfaces\LanguageServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class LanguageService
 * @package App\Services
 */
class LanguageService implements LanguageServiceInterface
{

    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function paginate($request)
    {
        // $users = $this->UserCatalogueService->getAllPaginate();
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] =  $request->integer('publish');
        $perPage = $request->integer('perpage');
        $languages = $this->languageRepository
        ->pagination($this->paginateSelect(), $condition, [], ['path' => 'language/index'], $perPage, []);
        return $languages;
    }

    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->except('_token','send');
            $payload['user_id'] = Auth::id();
            $user = $this->languageRepository->create($payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
        }

    }

    

    public function update($id, $request){
        DB::beginTransaction();
        try{

            $payload = $request->except('_token','send');
            $user = $this->languageRepository->update($id,$payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
        }

    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try{
            $payload[$post['field']] = (($post['value'] ==1 )?2:1);
            $language = $this->languageRepository->update($post['modelId'],$payload);
            
            $this->changeUserStatus($post, $payload[$post['field']]);

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
         }
        
    }

    public function updateStatusAll($post =[]){
        DB::beginTransaction();
        try{
            $payload[$post['field']] = $post['value'];
            $flag = $this->languageRepository->updateByWhereIn('id',$post['id'],$payload);
            
            $this->changeUserStatus($post,$payload[$post['field']]);

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
         }
    }

    public function changeUserStatus($post, $value){
        
        DB::beginTransaction();
        try{
            $array = [];
            if(isset($post['modelId'])){
                $array[] = $post['modelId'];
            }else{
                $array = $post['id'];
            }

            $payload[$post['field']] =  $value;
            $this->languageRepository->updateByWhereIn('id', $array, $payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
         }
        
        
        
     }


    public function destroy($id){
        DB::beginTransaction();
        try{
            $user = $this->languageRepository->delete($id); //Có thể sử dụng hàm delete() để xóa mềm, forceDelete() để xóa vĩnh viễn
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
        }
    }

    private function paginateSelect(){
        return [
            'id',
            'name',
            'canonical',
            'publish'
        ];
    }



}