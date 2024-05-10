<?php

namespace App\Controllers\Web\V1;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class UserDeleteController extends BaseController
{
    public function delete($userId)
    {
        //
        $userModel = new User();
        $userDataArray = [
            'deleted_at' => date('Y-m-d H:i:s'),
            'status' => 0,
        ];
        // $userModelResult = $userModel->set('deleted_at', date('Y-m-d H:i:s'))->where('id', $userId)->update();
        if($userModel->update($userId,$userDataArray)){
            return redirect()->to('dashboard');
        }

        // delete
        // if($userModel->where('id',$userId)->delete()){
        //     return redirect()->to('dashboard');
        // }
    }
    public $output;
    public function deleteAll($userData)
    {
        //
        $response = array(
            'message' => 'deleteAll method executed successfully'
        );
        // Return JSON response
        return json_encode($response);//TODO:this function is not done
    }
}
