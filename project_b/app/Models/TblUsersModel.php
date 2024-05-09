<?php

namespace App\Models;

use CodeIgniter\Model;

class TblUsersModel extends \CodeIgniter\Model
{
    protected $table = 'users AS u';
    protected $primaryKey = 'id';

    // your function to paginate
    public function paginateNews(int $ndPage = 5) {
        return $this->select('u.id AS u_id , u.user_name, u.email, u.phone,u.gender,u.state,st.state_name,u.created_at,u.updated_at')->join('states AS st', 'u.state = st.id','left')->where('st.country_id', 101)->where('u.deleted_at', null)->paginate($ndPage);

        // $db      = \Config\Database::connect();
        // $builder = $db->table('users AS u');
        // $builder->join('states AS st', 'u.state = st.id','left');
        // $builder->select('u.id AS u_id , u.user_name, u.email, u.phone,u.gender,u.state,st.state_name,u.created_at,u.updated_at');
        // $builder->where('st.country_id', 101);
        // $builder->where('u.deleted_at', null);
        // $query = $builder->get();
        // $userDataArray = $query->getResultArray();
    }
}
