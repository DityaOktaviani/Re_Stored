<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'password',
        'status'
    ];

	public function get(){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				*
			FROM
				admin
			ORDER BY
				admin.`status` ASC"
		);
        return $query->getResult();
    }

	public function search($key){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				*
			FROM
				admin
			WHERE
				admin.username LIKE '%$key%'
			ORDER BY
				admin.`status` ASC"
		);
        return $query->getResult();
    }
	
	public function view($id){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				*
			FROM
				admin
			WHERE
				admin.id_admin = '$id'
			ORDER BY
				admin.`status` ASC"
		);
        return $query->getResult();
    }

}
?>