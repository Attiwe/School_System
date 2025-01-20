@if($step == 2)
    <div class="card card-body">
        <div class="card-body">
            <h4 class="card-title text-center display-4">الخطوة 2: البيانات الشخصية الأم</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email_mather" class="form-label"><strong>البريد الإلكتروني</strong></label>
                    <input type="email" wire:model.blur="email_mather" class="form-control" id="email_mather" required>
                    @if ($isupdate)
                    @error('email_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name_mother" class="form-label"><strong>اسم الأم</strong></label>
                    <input type="text" wire:model.blur="name_mother" class="form-control" id="name_mother" required>
                    @if ($isupdate)
                    @error('name_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="job_mother" class="form-label"><strong>اسم الوظيفة</strong></label>
                    <input type="text" wire:model.blur="job_mother" class="form-control" id="job_mother" required>
                    @if ($isupdate)
                    @error('job_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone_mother" class="form-label"><strong>رقم الهاتف</strong></label>
                    <input type="text" wire:model.blur="phone_mother" class="form-control" id="phone_mother" required>
                    @if ($isupdate)
                    @error('phone_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="passport_id_mother" class="form-label"><strong>جواز السفر</strong></label>
                    <input type="text" wire:model.blur="passport_id_mother" class="form-control" id="passport_id_mother">
                    @if ($isupdate)
                    @error('passport_id_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="national_id_mother" class="form-label"><strong>رقم الهوية</strong></label>
                    <input type="text" wire:model.blur="national_id_mother" class="form-control" id="national_id_mother" required>
                    @if ($isupdate)
                    @error('national_id_mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="blood_type_mother_id" class="form-label"><strong>فصيلة الدم</strong></label>
                    <select class="form-control" wire:model.blur="blood_type_mother_id" id="blood_type_mother_id" required>
                        <option value="" selected disabled>-- اختر نوع الدم --</option>
                        @foreach ($boolds as $blood)
                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                        @endforeach
                    </select>
                    @if ($isupdate)
                    @error('blood_type_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="religion_mother_id" class="form-label"><strong>الديانة</strong></label>
                    <select class="form-control" wire:model="religion_mother_id" id="religion_mother_id" required>
                        <option value="" selected disabled>-- اختر الديانة --</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                    </select>
                    @if ($isupdate)
                    @error('religion_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="nationality_mother_id" class="form-label"><strong>الدولة</strong></label>
                    <select class="form-control" wire:model="nationality_mother_id" id="nationality_mother_id" required>
                        <option value="" selected disabled>-- اختر الدولة --</option>
                        @foreach ($nationals as $national)
                            <option value="{{ $national->id }}">{{ $national->name }}</option>
                        @endforeach
                    </select>
                    @if ($isupdate)
                    @error('nationality_mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="address_mother" class="form-label"><strong>العنوان</strong></label>
                <textarea class="form-control" wire:model="address_mother" id="address_mother" required></textarea>
                @if ($isupdate)
                @error('address_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @endif
            </div>
            
            <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">رجوع</button>
            <button type="button" wire:click="goToNextStep" class="btn btn-primary">التالي</button>
        </div>
    </div>
@endif
