
<div class="container mt-4">
    <h3 class="mb-3 text-center">المرفقات إن وجدت</h3>
    <form wire:submit.prevent="save" class="p-4 border rounded bg-light">
        <div class="mb-3">
            <label for="photos" class="form-label">تحميل الصور</label>
            <input type="file" id="photos" class="form-control" wire:model="photos" multiple accept="image/*">
        </div>
    </form>
</div>



 