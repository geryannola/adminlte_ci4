<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	public $student = [
        'student_name'       => 'required',
        'student_school'     => 'required',
        'student_email'      => 'required',
        'student_phone_number'     => 'required',
        'student_grade'      => 'required',
        'student_department' => 'required'
    ];
     
    public $student_errors = [
        'student_name' => [
            'required'    => 'Student name wajib diisi.',
		],
		'student_school' => [
            'required'    => 'Student school wajib diisi.',
		],
		'student_email' => [
            'required'    => 'Student email wajib diisi.',
		],
		'student_phone_number' => [
            'required'    => 'Student phone number wajib diisi.',
		],
		'student_grade' => [
            'required'    => 'Student grade wajib diisi.',
        ],
        'student_department'    => [
            'required' => 'Student department wajib diisi.'
        ]
    ];

	//--------------------------------------------------------------------
}
