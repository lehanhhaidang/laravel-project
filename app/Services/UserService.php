<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate($request)
    {
        // $users = $this->userRepository->getAllPaginate();
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] =  $request->integer('publish');
        $perPage = $request->integer('perpage');
        
        $users = $this->userRepository
        ->pagination($this->paginateSelect(), $condition, [], ['path' => 'user/index'], $perPage);
        return $users;
    }

    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->except('_token','send','repassword');
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);
            Log::info('Payload:', $payload);
            $user = $this->userRepository->create($payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
        }

    }

    

    public function update($id,$request){
        DB::beginTransaction();
        try{

            $payload = $request->except('_token','send');
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            $user = $this->userRepository->update($id,$payload);
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
            $user = $this->userRepository->update($post['modelId'],$payload);
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
            $flag = $this->userRepository->updateByWhereIn('id',$post['id'],$payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();die();
            return false;
         }
    }

    private function convertBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d',$birthday);
        $birthday = $carbonDate->format('Y-m-d');

        return $birthday;
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            $user = $this->userRepository->delete($id); //Có thể sử dụng hàm delete() để xóa mềm, forceDelete() để xóa vĩnh viễn
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
            'image',
            'email',
            'address',
            'publish',
            'user_catalogue_id',
        ];
    }



}
