<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\StudentModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Student extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class StudentModel menggunakan $this->student
        $this->student = new StudentModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Student
        */
    }
 
    public function index()
    {
        $data['student'] = $this->student->getStudent();
        echo view('student/index', $data);
    }

    public function create()
    {
        return view('student/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
 
        $data = array(
            'student_name'     => $this->request->getPost('student_name'),
            'student_school'   => $this->request->getPost('student_school'),
            'student_email'    => $this->request->getPost('student_email'),
            'student_phone_number' => $this->request->getPost('student_phone_number'),
            'student_grade'    => $this->request->getPost('student_grade'),
            'student_department'   => $this->request->getPost('student_department'),
        );
    
        if($validation->run($data, 'student') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('student/create'));
        } else {
            $simpan = $this->student->insertStudent($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created student successfully');
                return redirect()->to(base_url('student')); 
            }
        }
    } 

    public function detail($id)
    {
        // Memanggil function getStudent($id) dengan parameter $id di dalam StudentModel dan menampungnya di variabel array student
        $data['student'] = $this->student->getStudent($id);
        // Mengirim data ke dalam view
        return view('student/detail', $data);
    }

    public function edit($id)
    {
        // Memanggil function getStudent($id) dengan parameter $id di dalam StudentModel dan menampungnya di variabel array student
        $data['student'] = $this->student->getStudent($id);
        // Mengirim data ke dalam view
        return view('student/edit', $data);
    } 

    public function update()
    {
        $id = $this->request->getPost('student_id');
 
        $validation =  \Config\Services::validation();
    
        $data = array(
            'student_name'     => $this->request->getPost('student_name'),
            'student_school'   => $this->request->getPost('student_school'),
            'student_email'    => $this->request->getPost('student_email'),
            'student_phone_number' => $this->request->getPost('student_phone_number'),
            'student_grade'    => $this->request->getPost('student_grade'),
            'student_department'   => $this->request->getPost('student_department'),
        );
        
        if($validation->run($data, 'student') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('student/edit/'.$id));
        } else {
            $ubah = $this->student->updateStudent($data, $id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated student successfully');
                return redirect()->to(base_url('student')); 
            }
        }
    }

    public function delete($id)
    {
        // Memanggil function deleteStudent() dengan parameter $id di dalam StudentModel dan menampungnya di variabel hapus
        $hapus = $this->student->deleteStudent($id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted student successfully');
            // Redirect ke halaman student
            return redirect()->to(base_url('student'));
        }
    } 

    public function export()
    {
        // ambil data transaction dari database
        $student = $this->student->getStudent();
        // panggil class Sreadsheet baru
        $spreadsheet = new Spreadsheet;
        // Buat custom header pada file excel
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Name')
                    ->setCellValue('C1', 'School')
                    ->setCellValue('D1', 'Email')
                    ->setCellValue('E1', 'Phone Number')
                    ->setCellValue('F1', 'Grade')
                    ->setCellValue('G1', 'Department');
        // define kolom dan nomor
        $kolom = 2;
        $nomor = 1;
        // tambahkan data transaction ke dalam file excel
        foreach($student as $data) {
    
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $data['student_name'])
                        ->setCellValue('C' . $kolom, $data['student_school'])
                        ->setCellValue('D' . $kolom, $data['student_email'])
                        ->setCellValue('E' . $kolom, $data['student_phone_number'])
                        ->setCellValue('F' . $kolom, $data['student_grade'])
                        ->setCellValue('G' . $kolom, $data['student_department']);
    
            $kolom++;
            $nomor++;
    
        }
        // download spreadsheet dalam bentuk excel .xlsx
        $writer = new Xlsx($spreadsheet);
    
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data_Siswa.xlsx"');
        header('Cache-Control: max-age=0');
    
        $writer->save('php://output');
    }
}