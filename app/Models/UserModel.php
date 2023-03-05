<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = User::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['name','surname','patronymic','login','email','password','user_group'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|regex_match[/^[а-яёА-ЯЁ -]+$/u]',
        'surname' => 'required|regex_match[/^[а-яёА-ЯЁ -]+$/u]',
        'login' => 'required|min_length[3]|max_length[20]',
        'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]|max_length[200]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
