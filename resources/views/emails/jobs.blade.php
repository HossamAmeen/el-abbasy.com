@component('mail::message')
<head>
    <style>
        body {
            direction: rtl;
        }
    </style>
</head>

<body>
    {{ "عزيزي العباسي," }}

    تم استقبال طلب توظيف

    تفاصيل الطلب
    اسم المستخدم: {{ $name }}
    رقم المستخدم: {{ $number }}

    شكرا
    {{ "فريق العباسي" }}
</body>
@endcomponent
