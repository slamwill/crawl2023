<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>編輯用戶</title>
</head>
<body>
    <h1>編輯用戶</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">姓名:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        <br>

        <label for="email">電子郵件:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        <br>

        <label for="gender">性別:</label>
        <select name="gender" id="gender">
            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>男</option>
            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>女</option>
            <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>其他</option>
        </select>
        <br>

        <label for="phone">電話:</label>
        <input type="text" name="phone" id="phone" value="{{ $user->phone }}" required>
        <br>

        <label for="address">地址:</label>
        <textarea name="address" id="address">{{ $user->address }}</textarea>
        <br>

        <button type="submit">更新用戶</button>
    </form>
</body>
</html>
