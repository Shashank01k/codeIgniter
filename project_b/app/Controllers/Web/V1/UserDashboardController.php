<?php

namespace App\Controllers\Web\V1;

use App\Constants\UserConstant;
use App\Controllers\BaseController;
use App\Database\Seeds\UsersModelSeeder;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Seeder;
use Config\Database;

class UserDashboardController extends BaseController
{
    public $userConstant;

    public function __construct()
    {
        //call constatnt and utils class        
    }
    
    public function dashboard()
    {
        ################################################################################

        $defaultPageDataCount = 5;
        $tblNewsModel = new \App\Models\TblUsersModel();
        $tableData = $tblNewsModel->paginateNews($defaultPageDataCount);
        
        $totalCount = self::getTotalRecords();
        // echo $totalCount; die;
        $data['total'] = 0;
        $data['status'] = 'error';
        if($totalCount > 0){
            $data['userDataArray'] = $tableData;
            $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
            $data['perPage'] = $defaultPageDataCount;
            $data['total'] = $totalCount;
            $data['data'] = $tblNewsModel->paginate($defaultPageDataCount);
            $data['pager'] = $tblNewsModel->pager;
            $data['status'] = 'success';
        }
        return view('project_b/crud/dashboard',$data);
    }
    
    public function getTotalRecords(): int
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('users AS u');
        $builder->join('states AS st', 'u.state = st.id','left');
        $builder->select();
        $builder->where('st.country_id', 101);
        $builder->where('u.deleted_at', null);
        $query = $builder->get();
        $totalCount = $query->connID->affected_rows;
        return $totalCount;
    }

    public function terms()
    {
        return view('project_b/crud/terms');
    }

    public function inserDummyData()
    {
        $data = [];
        // print_R("insertDummyData"); die;
        $number = $this->request->getVar('number');
        $data['message'] = "Insert input number for create dummy Data...🤠🤠🤠";
        if($number != ''){
            $usersModelSeeder = new UsersModelSeeder();
            $run = $usersModelSeeder->run($number);
            $data['message'] = "Dummy Data Inserted Successfully...😎😎😎";

        }
        // echo "number is :". $number; 
        // $rand = rand(1,10);
        // echo "randum number between 0 to 10 : ";
        // echo PHP_EOL;
        // for($i =0; $i<10; $i++){
            
        //     echo rand(1,40);
        //     echo PHP_EOL;
        // }
        // print_R($run);
        return view('project_b/crud/seeder',$data);
    }
}
// print_R($data); die;
