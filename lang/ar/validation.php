<?php

return array(
    'accepted' => 'يجب قبول :attribute.',
    'active_url' => 'حقل :attribute لا يُمثّل رابطًا صحيحًا.',
    'after' => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي حقل :attribute على حروفٍ وأرقامٍ فقط.',
    'array' => 'يجب أن يكون حقل :attribute ًمصفوفة.',
    'attached' => 'حقل :attribute تم إرفاقه بالفعل.',
    'before' => 'يجب على حقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على عدد من العناصر بين :min و :max.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute بين :min و :max كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute بين :min و :max.',
            'string' => 'يجب أن يكون عدد حروف نّص حقل :attribute بين :min و :max.',
        ),
    'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false .',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل :attribute ليس تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute مطابقاً للتاريخ :date.',
    'date_format' => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي حقل :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions' => 'الحقل:attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values',
    'exists' => 'القيمة المحددة :attribute غير موجودة.',
    'file' => 'الحقل :attribute يجب أن يكون ملفا.',
    'filled' => 'حقل :attribute إجباري.',
    'gt' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute أكبر من :value كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من :value.',
            'string' => 'يجب أن يكون طول نّص حقل :attribute أكثر من :value حروفٍ/حرفًا.',
        ),
    'gte' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :value عُنصرًا/عناصر.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :value كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :value.',
            'string' => 'يجب أن يكون طول نص حقل :attribute على الأقل :value حروفٍ/حرفًا.',
        ),
    'image' => 'يجب أن يكون حقل :attribute صورةً.',
    'in' => 'حقل :attribute غير موجود.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون حقل :attribute نصًا من نوع JSON.',
    'lt' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عناصر/عنصر.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute أصغر من :value كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute أصغر من :value.',
            'string' => 'يجب أن يكون طول نّص حقل :attribute أقل من :value حروفٍ/حرفًا.',
        ),
    'lte' =>
        array(
            'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
            'file' => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :value كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :value.',
            'string' => 'يجب أن لا يتجاوز طول نّص حقل :attribute :value حروفٍ/حرفًا.',
        ),
    'max' =>
        array(
            'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
            'file' => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :max كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :max.',
            'string' => 'يجب أن لا يتجاوز طول نّص الحقل  :max حروفٍ/حرفًا.',
        ),
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :min كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :min.',
            'string' => 'يجب أن يكون طول نص حقل :attribute على الأقل :min حروفٍ/حرفًا.',
        ),
    'multiple_of' => 'حقل :attribute يجب أن يكون من مضاعفات :value',
    'not_in' => 'عنصر الحقل :attribute غير صحيح.',
    'not_regex' => 'صيغة حقل :attribute غير صحيحة.',
    'numeric' => 'يجب على حقل :attribute أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب تقديم حقل :attribute.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور إذا كان :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other ضمن :values.',
    'regex' => 'صيغة حقل :attribute غير صحيحة.',
    'relatable' => 'حقل :attribute قد لا يكون مرتبطا بالمصدر المحدد.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all' => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_without' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size' =>
        array(
            'array' => 'يجب أن يحتوي حقل :attribute على :size عنصرٍ/عناصر بالضبط.',
            'file' => 'يجب أن يكون حجم ملف حقل :attribute :size كيلوبايت.',
            'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية لـ :size.',
            'string' => 'يجب أن يحتوي نص حقل :attribute على :size حروفٍ/حرفًا بالضبط.',
        ),
    'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone' => 'يجب أن يكون حقل :attribute نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة حقل :attribute مُستخدمة من قبل.',
    'uploaded' => 'يجب أن لا يتجاوز حجم الملف 5 ميغا بايت الـ :attribute.',
    'url' => 'صيغة رابط حقل :attribute غير صحيحة.',
    'uuid' => 'حقل :attribute يجب أن يكون بصيغة UUID سليمة.',
    'custom' =>
        array(
            'attribute-name' =>
                array(
                    'rule-name' => 'custom-message',
                ),
        ),
    'attributes' =>
        array(
            'category' => 'الفئات',
            'shop_name' => 'اسم المتجر',
            'address' => 'العنوان',
            'age' => 'العمر',
            'available' => 'مُتاح',
            'city' => 'المدينة',
            'content' => 'المُحتوى',
            'country' => 'الدولة',
            'date' => 'التاريخ',
            'day' => 'اليوم',
            'description' => 'الوصف',
            'email' => 'البريد الالكتروني',
            'excerpt' => 'المُلخص',
            'first_name' => 'الاسم الأول',
            'gender' => 'النوع',
            'hour' => 'ساعة',
            'last_name' => 'اسم العائلة',
            'minute' => 'دقيقة',
            'mobile' => 'رقم التليفون',
            'month' => 'الشهر',
            'name' => 'الاسم',
            'password' => 'كلمة المرور',
            'password_confirmation' => 'تأكيد كلمة المرور',
            'new_password' => 'كلمة المرور الجديدة',
            'new_password_confirmation' => 'تأكيد كلمة المرور الجديدة',
            'phone' => 'الهاتف',
            'second' => 'ثانية',
            'sex' => 'الجنس',
            'size' => 'الحجم',
            'time' => 'الوقت',
            'title' => 'العنوان',
            'username' => 'اسم المُستخدم',
            'year' => 'السنة',
            'city.*' => 'المدينة',
            'area.*' => 'المنطقة',
            'other_des' => 'فئة أخرى',
            'merchant_type' => 'نوع المتجر',
            'lat' => 'الموقع على الخريطة',
            'long' => 'الموقع على الخريطة',
            'governorate' => 'المحافظة',
            'area' => 'المدينة',
            'street_name' => 'أسم الشارع',
            'building_name' => 'رقم العقار',
            'floor_no' => 'رقم الدور',
            'apt_no' => 'رقم الشقة',
            'postal_no' => 'رقم البريد',
            'radius' => 'نصف القطر',
            'in_zone_area.0' => 'مناطق داخل نطاق الأستلام',
            'out_zone_area.0' => 'مناطق خارج نطاق الأستلام',
            'in_zone_fees' => 'رسوم التوصيل داخل نطاق الأستلام',
            'in_zone_delivery_time' => 'زمن التوصيل داخل نطاق الأستلام',
            'in_zone_delivery_time_type' => 'نوع زمن التوصيل داخل نطاق الأستلام',
            'out_zone_fees' => 'رسوم التوصيل خارج نطاق الأستلام',
            'out_zone_delivery_time' => 'زمن التوصيل خارج نطاق الأستلام',
            'out_zone_delivery_time_type' => 'نوع زمن التوصيل خارج نطاق الأستلام',
            'bank_account_name' => 'اسم الحساب المصرفي',
            'bank_account_number' => 'رقم الحساب المصرفي',
            'bank_account_iban' => 'رقم IBAN',
            'old_password' => 'كلمة المرور الحالية',
            'from' => 'من',
            'to' => 'إلى',
            'status' => 'الحالة',
            'street_name_ar' => 'اسم الشارع باللغة العربية',
            'street_name_en' => 'اسم الشارع باللغة الأنجليزية',
            'shop_name_ar' => 'اسم المتجر باللغة العربية',
            'shop_name_en' => 'اسم المتجر باللغة الأنجليزية',
            'name_en' => 'الأسم باللغة الأنجليزية',
            'name_ar' => 'الأسم باللغة العربية',
            'text_en' => 'النص باللغة الأنجليزية',
            'text_ar' => 'النص باللغة العربية',
            'description_ar' => 'الوصف باللغة الأنجليزية',
            'description_en' => 'الوصف باللغة العربية',
            'code' => 'كود',
            'return_time' => 'وقت الإرجاع',
            'return_time_type' => 'نوع وقت الإرجاع',
            'extra_taxes_fees' => 'رسوم ضرائب إضافية',
            'extra_delivery_fees' => 'رسوم التوصيل الإضافية',
            'basic_quantity' => 'الكمية الأساسية',
            'basic_price' => 'السعر الأساسي',
            'percentage' => 'النسبة المئوية',
            'start_date' => 'تاريخ البدء',
            'end_date' => 'تاريخ الانتهاء',
            'banner' => 'اللافتة',
            'images' => 'الصور',
            'text' => 'النص',
            'link' => 'الرابط',
            'all_feature_image' => 'الصور',
            'special_feature_image' => 'الصور',
            'landmark' => 'معلم',
            'type' => 'النوع',
            'whats_mobile' => 'رقم الواتس اب',
            'rate' => 'التقييم',
            'review' => 'التعليق',
            'message' => 'الرسالة',
        ),
);
