<?php
namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model{
    protected $table = 'anggota';
    protected $primaryKey = 'id_Anggota';
    protected $allowedFields = [
        'username',
        'nama',
        'password',
        'type_anggota',
        'status'
    ];

    public function get_mhs(){
        $db = db_connect();
        $query = $db->query(
			'SELECT
				anggota.id_Anggota AS id, 
				anggota.username AS username, 
				anggota.nama AS nama, 
				type_anggota.nama_type AS type, 
				anggota.`status` AS `status`
			FROM
				anggota
				INNER JOIN
				type_anggota
				ON 
					anggota.type_anggota = type_anggota.id_type_anggota
			WHERE
				anggota.type_anggota = 2
			ORDER BY
			anggota.`status` ASC'
		);
        return $query->getResult();
    }

    public function get_one($id){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				anggota.id_Anggota AS id, 
				anggota.username AS username, 
				anggota.nama AS nama, 
				type_anggota.nama_type AS type, 
				anggota.`status` AS `status`
			FROM
				anggota
				INNER JOIN
				type_anggota
				ON 
					anggota.type_anggota = type_anggota.id_type_anggota
			WHERE
                anggota.id_Anggota = $id
			ORDER BY
			anggota.`status` ASC"
		);
        return $query->getResult();
    }

	public function find_mhs($key){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				anggota.username, 
				anggota.nama, 
				type_anggota.nama_type, 
				anggota.`status`
			FROM
				anggota
				INNER JOIN
				type_anggota
				ON 
					anggota.type_anggota = type_anggota.id_type_anggota
			WHERE
				anggota.nama LIKE '%$key%' AND
				anggota.type_anggota = 2
			ORDER BY
				anggota.`status` ASC"
		);
        return $query->getResult();
    }
}
?>