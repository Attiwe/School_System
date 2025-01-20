<?php
namespace App\Livewire;

use App\Models\MyParents;
use App\Models\Nationalities;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\TypeBloods;
use Cache;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Request;

class AddParent extends Component
{
    use WithFileUploads;
    public $skipValidation = false; // make validation is false case update;
    public $isupdate = true; //make hiddent massage error
    
    public $Parent_id; //constise on id spacial update Form

    public $catchError, $showTable = true ,$updatFrome = false ;
  
    public $step = 1, $photos = [];
  
    public $national_id_father, $name_father, $email, $job_father, $phone_father,
           $passport_id_father, $blood_type_father_id, $nationality_father_id,
           $religion_father_id, $password, $address_father;

    public $national_id_mother, $job_mother, $passport_id_mother, $blood_type_mother_id, 
           $nationality_mother_id, $religion_mother_id, $email_mather, $name_mother, 
           $phone_mother, $address_mother,$password_mother ;

      
   public function show_Tabel()
    {
      $this->showTable = false;
    }   
             
     public $listeners = ['validateField'];
  

     public function validateField($field)
    {
        $this->validateOnly($field);  
    }
    

    protected $rules = [
        'name_father' => 'required|min:3|max:255',
        'name_mother' => 'required|min:3|max:255',
        'email' => 'required|email|unique:my_parents,email',
        'email_mather' => 'required|email|unique:my_parents,email',
        'phone_father' => 'required|numeric|min:10',
        'phone_mother' => 'required|numeric|min:10',
        'password' => 'required|min:6',
    ];
    protected $messages = [
        'name_father.required' => 'اسم الأب مطلوب.',
        'name_father.min' => 'اسم الأب يجب أن يحتوي على :min أحرف على الأقل.',
        'name_father.max' => 'اسم الأب يجب ألا يتجاوز :max حرفًا.',
    
        'name_mother.required' => 'اسم الأب مطلوب.',
        'name_mother.min' => 'اسم الأب يجب أن يحتوي على :min أحرف على الأقل.',
        'name_mother.max' => 'اسم الأب يجب ألا يتجاوز :max حرفًا.',
    
        'email.required' => 'البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
    
        'email_mather.required' => 'البريد الإلكتروني مطلوب.',
        'email_mather.email' => 'يجب إدخال بريد إلكتروني صالح.',
        'email_mather.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
    
        'phone_father.required' => 'رقم هاتف الأب مطلوب.',
        'phone_father.numeric' => 'رقم الهاتف يجب أن يكون أرقامًا فقط.',
        'phone_father.min' => 'رقم الهاتف يجب أن يحتوي على :min أرقام على الأقل.',
    
        'phone_mother.required' => 'رقم هاتف الأب مطلوب.',
        'phone_mother.numeric' => 'رقم الهاتف يجب أن يكون أرقامًا فقط.',
        'phone_mother.min' => 'رقم الهاتف يجب أن يحتوي على :min أرقام على الأقل.',
    
        'password.required' => 'كلمة المرور مطلوبة.',
        'password.min' => 'كلمة المرور يجب أن تحتوي على :min أحرف على الأقل.',
    ];
    
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);

    }

    public function goToNextStep()
    {
        $this->step++;
        $this->validate();  
    }

    public function goToPreviousStep()
    {
        $this->step--;
    }

    public function save()
    {
        $this->validate();  
    try {
        MyParents::create([
            'email' => $this->email,
            'email_mather' => $this->email_mather,
            'national_id_father' => $this->national_id_father,
            'national_id_mother' => $this->national_id_mother,
            'passport_id_father' => $this->passport_id_father,
            'passport_id_mother' => $this->passport_id_mother,
            'phone_father' => $this->phone_father,
            'phone_mother' => $this->phone_mother,
            'name_father' => $this->name_father,
            'name_mother' => $this->name_mother,
            'job_father' => $this->job_father,
            'job_mother' => $this->job_mother,
            'address_father' => $this->address_father,
            'address_mother' => $this->address_mother,
            'blood_type_father_id' => $this->blood_type_father_id,
            'blood_type_mother_id' => $this->blood_type_mother_id ??null,
            'nationality_father_id' => $this->nationality_father_id,
            'nationality_mother_id' => $this->nationality_mother_id,
            'religion_father_id' => $this->religion_father_id,
            'religion_mother_id' => $this->religion_mother_id,
            'password' => Hash::make($this->password),
        ]);
        toastr()->success('تم إرسال البيانات بنجاح!');
         $this->reset([
            'step',
            'name_father',
            'email',
            'job_father',
            'job_mother',
            'phone_father',
            'passport_id_father',
            'passport_id_mother',
            'blood_type_father_id',
            'blood_type_mother_id',
            'nationality_father_id',
            'nationality_mother_id',
            'religion_father_id',
            'religion_mother_id',
            'email_mather',
            'name_mother',
            'phone_mother',
            'address_father',
            'address_mother',
            'password'
        ]);  
        
        if( !empty($this->photos) && count($this->photos) <= 4 ){
            foreach ($this->photos as $photo) {
                $photo->storeAs($this->phone_father, $photo->getClientOriginalName(), $disks = 'parent_Attachments');
                
                ParentAttachment::create( [
                    'first_name' => $photo->getClientOriginalName(),
                    'parent_id' => MyParents::latest()->with('parentAttact')->first()->id
                ]);
            }
        } else {
            toastr()->message(  'لا يمكن رفع أكثر من 4 صور.');
            return redirect()->back();
        }
        
     } catch (\Exception $e) {
        $this->catchError = $e->getMessage();
     }
    }

    public function editForm($id)
    {
        
        $this->showTable = false;
        $this->updatFrome = true;
        $this->isupdate = false;
        $infoParent = MyParents::where('id',$id)->first();
        $this->Parent_id = $id; 
        $this->email = $infoParent->email;
        $this->email_mather = $infoParent->email_mather;
        $this->national_id_father = $infoParent->national_id_father;
        $this->national_id_mother = $infoParent->national_id_mother;
        $this->passport_id_father = $infoParent->passport_id_father;
        $this->passport_id_mother = $infoParent->passport_id_mother;
        $this->phone_father = $infoParent->phone_father;
        $this->phone_mother = $infoParent->phone_mother;
        $this->name_father = $infoParent->name_father;
        $this->name_mother = $infoParent->name_mother;
        $this->job_father = $infoParent->job_father;
        $this->job_mother = $infoParent->job_mother;
        $this->address_father = $infoParent->address_father;
        $this->address_mother = $infoParent->address_mother;
        $this->blood_type_father_id = $infoParent->blood_type_father_id;
        $this->blood_type_mother_id = $infoParent->blood_type_mother_id;
        $this->nationality_father_id = $infoParent->nationality_father_id;
        $this->nationality_mother_id = $infoParent->nationality_mother_id;
        $this->religion_father_id = $infoParent->religion_father_id;
        $this->religion_mother_id = $infoParent->religion_mother_id;
        $this->password = $infoParent->password;
         
    }
    
    public function submit_editForm(){
        if ($this->skipValidation) { 
            $this->validate();  
        }
        $parent = MyParents::find($this->Parent_id);
       if( $parent ){
           $parent->update([
            'email' => $this->email,
            'email_mather' => $this->email_mather,
            'national_id_father' => $this->national_id_father,
            'national_id_mother' => $this->national_id_mother,
            'passport_id_father' => $this->passport_id_father,
            'passport_id_mother' => $this->passport_id_mother,
            'phone_father' => $this->phone_father,
            'phone_mother' => $this->phone_mother,
            'name_father' => $this->name_father,
            'name_mother' => $this->name_mother,
            'job_father' => $this->job_father,
            'job_mother' => $this->job_mother,
            'address_father' => $this->address_father,
            'address_mother' => $this->address_mother,
            'blood_type_father_id' => $this->blood_type_father_id,
            'blood_type_mother_id' => $this->blood_type_mother_id,
            'nationality_father_id' => $this->nationality_father_id,
            'nationality_mother_id' => $this->nationality_mother_id,
            'religion_father_id' => $this->religion_father_id,
            'religion_mother_id' => $this->religion_mother_id,
            'password' => Hash::make($this->password),  
        ]);
    
        toastr()->success('تم تعديل البيانات بنجاح!');
        return redirect()->back();
       }  
    }

    public function render()
    {
        $boolds = Cache::remember('type_bloods', now()->addMinutes(60), function () {
            return TypeBloods::all();
        });

        $religions = Cache::remember('religions', now()->addMinutes(60), function () {
            return Religion::all();
        });

        $nationals = Cache::remember('nationalities', now()->addMinutes(60), function () {
            return Nationalities::all();
        });

        $parents = MyParents::latest()->get();


        return view('livewire.add-parent', compact('boolds', 'religions', 'nationals','parents'));

 
    }
}
