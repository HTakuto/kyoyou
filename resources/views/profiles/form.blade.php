@csrf
<div class="form-group">
    <label for="user_image">プロフィール画像</label>
    <input id="user_image" type="file" name="user_image" class="form-control-file">
  </div>
<div class="form-group">
    <label for="age">年齢</label>
    <select class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age">
      <option value="">選択してください</option>
      <option value="20代" {{ old('age', $profile->age) === '20代' ? 'selected' : '' }}>20代</option>
      <option value="30代" {{ old('age', $profile->age) === '30代' ? 'selected' : '' }}>30代</option>
      <option value="40代" {{ old('age', $profile->age) === '40代' ? 'selected' : '' }}>40代</option>
      <option value="50代" {{ old('age', $profile->age) === '50代' ? 'selected' : '' }}>50代</option>
      <option value="60代" {{ old('age', $profile->age) === '60代' ? 'selected' : '' }}>60代</option>
      <option value="70代" {{ old('age', $profile->age) === '70代' ? 'selected' : '' }}>70代</option>
      <option value="80代" {{ old('age', $profile->age) === '80代' ? 'selected' : '' }}>80代</option>
    </select>
    @if ($errors->has('age'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('age') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="gender">性別</label>
    <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender">
      <option value="">選択してください</option>
      <option value="男性" {{ old('gender', $profile->gender) === '男性' ? 'selected' : '' }}>男性</option>
      <option value="女性" {{ old('gender', $profile->gender) === '女性' ? 'selected' : '' }}>女性</option>
    </select>
    @if ($errors->has('gender'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('gender') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="school_type">学校種別</label>
    <select class="form-control{{ $errors->has('school_type') ? ' is-invalid' : '' }}" id="school_type" name="school_type">
      <option value="">選択してください</option>
      <option value="小学校" {{ old('school_type', $profile->school_type) === '小学校' ? 'selected' : '' }}>小学校</option>
      <option value="中学校" {{ old('school_type', $profile->school_type) === '中学校' ? 'selected' : '' }}>中学校</option>
      <option value="高校" {{ old('school_type', $profile->school_type) === '高校' ? 'selected' : '' }}>高校</option>
    </select>
    @if ($errors->has('school_type'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('school_type') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="school_year">学年</label>
    <select class="form-control{{ $errors->has('school_year') ? ' is-invalid' : '' }}" id="school_year" name="school_year">
        <option value="">選択してください</option>
        <option value="1年" {{ old('school_year', $profile->school_year) === '1年' ? 'selected' : '' }}>1年</option>
        <option value="2年" {{ old('school_year', $profile->school_year) === '2年' ? 'selected' : '' }}>2年</option>
        <option value="3年" {{ old('school_year', $profile->school_year) === '3年' ? 'selected' : '' }}>3年</option>
        <option value="4年" {{ old('school_year', $profile->school_year) === '4年' ? 'selected' : '' }}>4年</option>
        <option value="5年" {{ old('school_year', $profile->school_year) === '5年' ? 'selected' : '' }}>5年</option>
        <option value="6年" {{ old('school_year', $profile->school_year) === '6年' ? 'selected' : '' }}>6年</option>
      </select>
    @if ($errors->has('school_year'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('school_year') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="subject">教科</label>
    <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject', $profile->subject) }}" autofocus>
    @if ($errors->has('subject'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('subject') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="club">クラブ活動</label>
    <input id="club" type="text" class="form-control{{ $errors->has('club') ? ' is-invalid' : '' }}" name="club" value="{{ old('club', $profile->club) }}" autofocus>
    @if ($errors->has('club'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('club') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    <label for="comment">コメント</label>
    <textarea id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" rows="4">{{ old('comment', $profile->comment) }}</textarea>
    @if ($errors->has('comment'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('comment') }}</strong>
        </span>
    @endif
</div>
