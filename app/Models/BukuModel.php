<?php
namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = [
        'judul',
        'penulis',
        'link',
		'type_buku',
		'pemilik_buku',
		'dikonfirmasi',
		'view',
		'abstrak',
		'tahun',
		'timestamp'
    ];

	public function get(){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				buku.judul AS judul, 
				buku.penulis AS penulis, 
				type_buku.nama_type AS type, 
				anggota.nama AS pemilik, 
				buku.`view` AS `view`, 
				`status`.`status` AS `status`, 
				buku.link, 
				buku.dikonfirmasi AS dikonfirmasi, 
				buku.abstrak AS abstrak, 
				buku.tahun AS tahun, 
				buku.pemilik_buku AS id_pemilik, 
				buku.id_buku AS id_buku, 
				buku.type_buku AS id_type
			FROM
				buku
				INNER JOIN
				type_buku
				ON 
					buku.type_buku = type_buku.id_type_buku
				LEFT JOIN
				anggota
				ON 
					buku.pemilik_buku = anggota.id_Anggota
				INNER JOIN
				`status`
				ON 
					buku.dikonfirmasi = `status`.id_status
			ORDER BY
				buku.dikonfirmasi ASC"
		);
        return $query->getResult();
    }

	public function get_r(){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				buku.judul AS judul, 
				buku.penulis AS penulis, 
				type_buku.nama_type AS type, 
				anggota.nama AS pemilik, 
				buku.`view` AS `view`, 
				`status`.`status` AS `status`, 
				buku.link, 
				buku.dikonfirmasi AS dikonfirmasi, 
				buku.abstrak AS abstrak, 
				buku.tahun AS tahun, 
				buku.pemilik_buku AS id_pemilik, 
				buku.id_buku AS id_buku, 
				buku.type_buku AS id_type
			FROM
				buku
				INNER JOIN
				type_buku
				ON 
					buku.type_buku = type_buku.id_type_buku
				LEFT JOIN
				anggota
				ON 
					buku.pemilik_buku = anggota.id_Anggota
				INNER JOIN
				`status`
				ON 
					buku.dikonfirmasi = `status`.id_status
			WHERE
				buku.dikonfirmasi = 2
			ORDER BY
				buku.`view` ASC"
		);
        return $query->getResult();
    }

	public function search($key){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				buku.judul AS judul, 
				buku.penulis AS penulis, 
				type_buku.nama_type AS type, 
				anggota.nama AS pemilik, 
				buku.`view` AS `view`, 
				`status`.`status` AS `status`, 
				buku.link, 
				buku.dikonfirmasi AS dikonfirmasi, 
				buku.abstrak AS abstrak, 
				buku.tahun AS tahun, 
				buku.pemilik_buku AS id_pemilik, 
				buku.id_buku AS id_buku, 
				buku.type_buku AS id_type
			FROM
				buku
				INNER JOIN
				type_buku
				ON 
					buku.type_buku = type_buku.id_type_buku
				LEFT JOIN
				anggota
				ON 
					buku.pemilik_buku = anggota.id_Anggota
				INNER JOIN
				`status`
				ON 
					buku.dikonfirmasi = `status`.id_status
			WHERE
				buku.judul LIKE '%$key%'
			ORDER BY
				buku.dikonfirmasi ASC"
		);
        return $query->getResult();
    }
	
	public function search_r($key){
        $db = db_connect();
        $query = $db->query(
			"SELECT
				buku.judul AS judul, 
				buku.penulis AS penulis, 
				type_buku.nama_type AS type, 
				anggota.nama AS pemilik, 
				buku.`view` AS `view`, 
				`status`.`status` AS `status`, 
				buku.link, 
				buku.dikonfirmasi AS dikonfirmasi, 
				buku.abstrak AS abstrak, 
				buku.tahun AS tahun, 
				buku.pemilik_buku AS id_pemilik, 
				buku.id_buku AS id_buku, 
				buku.type_buku AS id_type
			FROM
				buku
				INNER JOIN
				type_buku
				ON 
					buku.type_buku = type_buku.id_type_buku
				LEFT JOIN
				anggota
				ON 
					buku.pemilik_buku = anggota.id_Anggota
				INNER JOIN
				`status`
				ON 
					buku.dikonfirmasi = `status`.id_status
			WHERE
				buku.dikonfirmasi = 2 AND
				buku.judul LIKE '%$key%'
			ORDER BY
				buku.`view` ASC"
		);
        return $query->getResult();
    }

	public function view($id){
        $db = db_connect();
        $query = $db->query(
			"SELECT
			buku.judul AS judul, 
			buku.penulis AS penulis, 
			type_buku.nama_type AS type, 
			anggota.nama AS pemilik, 
			buku.`view` AS `view`, 
			`status`.`status` AS `status`, 
			buku.link, 
			buku.dikonfirmasi AS dikonfirmasi, 
			buku.abstrak AS abstrak, 
			buku.tahun AS tahun, 
			buku.pemilik_buku AS id_pemilik, 
			buku.id_buku AS id_buku, 
			buku.type_buku AS id_type
		FROM
			buku
			INNER JOIN
			type_buku
			ON 
				buku.type_buku = type_buku.id_type_buku
			LEFT JOIN
			anggota
			ON 
				buku.pemilik_buku = anggota.id_Anggota
			INNER JOIN
			`status`
			ON 
				buku.dikonfirmasi = `status`.id_status
			WHERE
				buku.id_buku = '$id'
			ORDER BY
				buku.dikonfirmasi ASC"
		);
        return $query->getResult();
    }

}
?>