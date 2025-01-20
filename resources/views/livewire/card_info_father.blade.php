@if($step == 1)
<div class="card card-body">
    <div class="card-body">
        <h2 class="card-title text-center display-4">الخطوة 1: البيانات الشخصية للأب</h2>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label"><strong>البريد الإلكتروني</strong></label>
                <input type="email" wire:model.blur="email" class="form-control" id="email" required>
               @if ($isupdate)
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @endif
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label"><strong>كلمة المرور</strong></label>
                <input type="password" wire:model.blur="password" class="form-control" id="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name_father" class="form-label"><strong>اسم الأب</strong></label>
                <input type="text" wire:model.blur="name_father" class="form-control" id="name_father" required>
                @error('name_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="job_father" class="form-label"><strong>الوظيفة</strong></label>
                <input type="text" wire:model.blur="job_father" class="form-control" id="job_father" required>
                @error('job_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone_father" class="form-label"><strong>رقم الهاتف</strong></label>
                <input type="text" wire:model.blur="phone_father" class="form-control" id="phone_father" required>
                @error('phone_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="passport_id_father" class="form-label"><strong>رقم جواز السفر</strong></label>
                <input type="text" wire:model.blur="passport_id_father" class="form-control" id="passport_id_father">
                @error('passport_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="blood_type_father_id" class="form-label"><strong>فصيلة الدم</strong></label>
                <select wire:model="blood_type_father_id" class="form-control" id="blood_type_father_id" required>
                    <option value="" selected disabled>-- اختر فصيلة الدم --</option>
                    @foreach($boolds as $blood)
                        <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                    @endforeach
                </select>
                @error('blood_type_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="religion_father_id" class="form-label"><strong>الديانة</strong></label>
                <select wire:model="religion_father_id" class="form-control" id="religion_father_id" required>
                    <option value="" selected disabled>-- اختر الديانة --</option>
                    @foreach($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('religion_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nationality_father_id" class="form-label"><strong>الدولة</strong></label>
                <select wire:model="nationality_father_id" class="form-control" id="nationality_father_id" required>
                    <option value="" selected disabled>-- اختر الدولة --</option>
                    @foreach($nationals as $national)
                        <option value="{{ $national->id }}">{{ $national->name }}</option>
                    @endforeach
                </select>
                @error('nationality_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="national_id_father" class="form-label"><strong>رقم الهوية</strong></label>
                <input type="text" wire:model="national_id_father" class="form-control" id="national_id_father" required>
                @error('national_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="address_father" class="form-label"><strong>العنوان</strong></label>
                <textarea wire:model="address_father" class="form-control" id="address_father" required></textarea>
                 @error('address_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                 
            </div>
        </div>

        <button type="button" wire:click="goToNextStep" class="btn btn-primary">التالي</button>
    </div>
</div>
@endif
