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
}
?>