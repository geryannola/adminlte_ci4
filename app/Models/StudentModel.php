<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class StudentModel extends Model
{
    protected $table = "students";
 
    public function getStudent($id = false)
    {
        if($id === false){
            return $this->table('students')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('students')
                        ->where('student_id', $id)
                        ->get()
                        ->getRowArray();
        }  
    }

    public function insertStudent($data)
    {
        return $this->db->table($this->table)->insert($data);
    } 

    public function updateStudent($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['student_id' => $id]);
    }

    public function deleteStudent($id)
    {
        return $this->db->table($this->table)->delete(['student_id' => $id]);
    } 
}