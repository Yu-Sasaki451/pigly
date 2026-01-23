
<div class="modal-form__content">
        <h2 class="content-title">Weight Logを追加</h2>
        <label class="modal-form__label" for="">日付<span> 必須</span></label>
        <input class="modal-form__date" type="date" name="date"  value="{{ old('date') }}">
        <div class="pigly__error">
                @error('date')
                {{ $message }}
                @enderror
        </div>

        <label class="modal-form__label" for="">体重<span> 必須</span></label>
        <input class="modal-form__int" type="text" step="0.1" name="weight" value="{{ old('weight') }}" placeholder="50.0"> kg
        <div class="pigly__error">
                @error('weight')
                {{ $message }}
                @enderror
        </div>

        <label class="modal-form__label" for="">摂取カロリー<span> 必須</span></label>
        <input class="modal-form__int" type="text" name="calories" value="{{ old('calories') }}" placeholder="1200"> cal
        <div class="pigly__error">
                @error('calories')
                {{ $message }}
                @enderror
        </div>

        <label class="modal-form__label" for="">運動時間<span> 必須</span></label>
        <input class="modal-form__input" type="time" name="exercise_time" value="{{ old('exercise_time') }}">
        <div class="pigly__error">
                @error('exercise_time')
                {{ $message }}
                @enderror
        </div>

        <label class="modal-form__label" for="">運動内容</label>
        <textarea class="modal-form__textarea" name="exercise_content">{{ old('exercise_content') }}</textarea>
        <div class="pigly__error">
                @error('exercise_content')
                {{ $message }}
                @enderror
        </div>
</div>
        <div class="content-item">
                <button class="close-button" type="button" data-modal-close>戻る</button>
                <button class="store-button" type="submit">登録</button>
        </div>
