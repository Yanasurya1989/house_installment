<!-- resources/views/house_installments/_form.blade.php -->
<div class="form-group">
    <label for="user_id">Nama User</label>
    <select name="user_id" class="form-control" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ isset($houseInstallment) && $houseInstallment->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="payment_date">Tanggal Setor</label>
    <input type="date" name="payment_date" class="form-control"
        value="{{ old('payment_date', $houseInstallment->payment_date ?? '') }}" required>
</div>
<div class="form-group">
    <label for="amount">Jumlah</label>
    <input type="number" name="amount" class="form-control"
        value="{{ old('amount', $houseInstallment->amount ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Keterangan</label>
    <input type="text" name="description" class="form-control"
        value="{{ old('description', $houseInstallment->description ?? '') }}">
</div>
