<div class="container mt-5">
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if (!empty($catchError))
        <div class="alert alert-danger" id="error-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    @if ($showTable)
        <div>
            @include('livewire.show_tabel')
        </div>
     
     @else

    <a wire:navigate class="btn btn-primary btn-lg pull-right mb-4" href="{{ url   ('add_parent') }}">
    <i class="bi bi-arrow-left"></i> الرجوع </a>
        <h2>نموذج متعدد الخطوات</h2>

             <ul class="nav nav-pills justify-content-center mb-4">
                <li class="nav-item">
                    <a class="nav-link {{ $step == 1 ? 'active' : '' }}" href="javascript:void(0)"
                        wire:click="$set('step', 1)">الخطوة 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $step == 2 ? 'active' : '' }}" href="javascript:void(0)"
                        wire:click="$set('step', 2)">الخطوة 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $step == 3 ? 'active' : '' }}" href="javascript:void(0)"
                        wire:click="$set('step', 3)">الخطوة 3</a>
                </li>
            </ul>

            @include('livewire.card_info_father')
            @include('livewire.card_info_mother')

            @if ($step == 3)
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center display-4">الخطوة 3: تأكيد البيانات</h2>
                        <hr>

                        <h3>الخطوة 1: البيانات الشخصية الأب</h3>
                        <ul>
                            <li><strong>الاسم:</strong> {{ $name_father ?: 'ادخل الاسم' }}</li>
                            <li><strong>البريد الإلكتروني:</strong> {{ $email ?: 'ادخل البريد الإلكتروني' }}</li>
                            <li><strong>كلمة المرور:</strong> {{ $password ?: 'ادخل كلمة المرور' }}</li>
                            <li><strong>المسمى الوظيفي:</strong> {{ $job_father ?: 'ادخل المسمى الوظيفي' }}</li>
                            <li><strong>تلفون الأب:</strong> {{ $phone_father ?: 'ادخل رقم الهاتف' }}</li>
                            <li><strong>جواز السفر:</strong> {{ $passport_id_father ?: 'غير متوفر' }}</li>
                            <li><strong>الديانة:</strong> {{ $religion_father_id ?: 'ادخل الديانة' }}</li>
                            <li><strong>الجنسيه:</strong> {{ $nationality_father_id ?: 'ادخل الجنسية' }}</li>
                            <li><strong>العنوان:</strong> {{ $address_father ?: 'ادخل العنوان' }}</li>
                        </ul>

                        <h3>الخطوة 2: البيانات الشخصية الأم</h3>
                        <ul>
                            <li><strong>الاسم:</strong> {{ $name_mother ?: 'ادخل الاسم' }}</li>
                            <li><strong>البريد الإلكتروني:</strong> {{ $email_mather ?: 'ادخل البريد الإلكتروني' }}</li>
                            <li><strong>كلمة المرور:</strong> {{ $password_mother ?: 'ادخل كلمة المرور' }}</li>
                            <li><strong>المسمى الوظيفي:</strong> {{ $job_mother ?: 'ادخل المسمى الوظيفي' }}</li>
                            <li><strong>تلفون الأم:</strong> {{ $phone_mother ?: 'ادخل رقم الهاتف' }}</li>
                            <li><strong>جواز السفر:</strong> {{ $passport_id_mother ?: 'غير متوفر' }}</li>
                            <li><strong>الديانة:</strong> {{ $religion_mother_id ?: 'ادخل الديانة' }}</li>
                            <li><strong>الجنسيه:</strong> {{ $nationality_mother_id ?: 'ادخل الجنسية' }}</li>
                            <li><strong>العنوان:</strong> {{ $address_mother ?: 'ادخل العنوان' }}</li>
                        </ul>

                        <div class="mb-3">
                            @include('livewire.card_ParentAttachment')
                        </div>
                         @if ($updatFrome)
                        <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">رجوع</button>
                        <button type="submit" wire:click="submit_editForm" class="btn btn-success">إرسال</button>
                        @else
                         
                        <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">رجوع</button>
                        <button type="submit" wire:click="save" class="btn btn-success">إرسال</button>
                        @endif
                    </div>
                </div>
            @endif
     @endif
</div>
