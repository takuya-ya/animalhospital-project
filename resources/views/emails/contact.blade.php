@component('mail::message')
# 新しいお問い合わせがありました

以下の内容でお問い合わせを受け付けました。

---

**氏名**：{{ $data['name'] }}  
**メールアドレス**：{{ $data['email'] }}  
@if(!empty($data['phone']))
**電話番号**：{{ $data['phone'] }}  
@endif

@if (!empty($data['topics']))
**お問い合わせ項目：**
@foreach ($data['topics'] as $topic)
- {{ $topic }}
@endforeach
@endif

---

**お問い合わせ内容：**

{{ $data['message'] }}

---

@endcomponent
