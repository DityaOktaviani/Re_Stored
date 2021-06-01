<?php
namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model{
    protected $table = 'peminjam';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'buku',
        'id_buku',
        'peminjam',
        'username',
        'timestamp'
    ];

    public function search($key){
        $db = db_connect();
        $query = $db->query(
            "SELECT
                *
            FROM
                peminjam
            WHERE
                peminjam.peminjam LIKE '%$key%'
            ORDER BY
                peminjam.`timestamp` DESC"
		);
        return $query->getResult();
    }
}
?>