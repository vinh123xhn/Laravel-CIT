<?php

/* --- System group user */
if (!defined('GROUP_ADMIN')) {define('GROUP_ADMIN', 1);}
if (!defined('GROUP_WRITER')) {define('GROUP_WRITER', 2);}

/* --- System active */
if (!defined('ACTIVE_TRUE')) {define('ACTIVE_TRUE', 1);}
if (!defined('ACTIVE_FALSE')) {define('ACTIVE_FALSE', 0);}
if (!defined('EMAIL_TEMPLATE_FORGOT_PASSWORD')) {define('EMAIL_TEMPLATE_FORGOT_PASSWORD', 1);}



if (!defined('SESSION_EXPIRED')) {define('SESSION_EXPIRED', 180);} // Expired in 30 minutes

return [
    'type_of_school' => [
        1 => 'Mầm non',
        2 => 'Tiểu học',
        3 => 'THCS',
        4 => 'THPT',
        5 => 'Tiểu học/ THCS',
        6 => 'THCS/ THPT',
    ],

    'type_of_teacher' => [
        1 => 'Giáo viên',
        2 => 'Giáo viên nhà trẻ',
        3 => 'Giáo viên mẫu giáo',
        4 => 'Cán bộ quản lý',
        5 => 'Nhân viên',
    ],

    'level_of_teacher' => [
        1 => 'Trung cấp',
        2 => 'Cao đẳng',
        3 => 'Đại học',
        4 => 'Thạc sĩ',
        5 => 'Tiến sĩ',
    ],

    'gender' => [
        1 => 'Nam',
        2 => 'Nữ',
    ],
    'level_of_user' => [
        1 => 'Admin',
        2 => 'Người viết',
        3 => 'Khách',
    ],
    'active' => [
        1 => 'Có',
        2 => 'Không',
    ],
    'level_of_student' => [
        1 => 'Mẫu giáo',
        2 => 'Lớp 1',
        3 => 'Lớp 2',
        4 => 'Lớp 3',
        5 => 'Lớp 4',
        6 => 'Lớp 5',
        7 => 'Lớp 6',
        8 => 'Lớp 7',
        9 => 'Lớp 8',
        10 => 'Lớp 9',
        11 => 'Lớp 10',
        12 => 'Lớp 11',
        13 => 'Lớp 12',
    ],
    'type_of_student' => [
        1 => 'Xuất xắc',
        2 => 'Giỏi',
        3 => 'Khá',
        4 => 'Trung Bình',
        5 => 'Yếu/ kém',
    ],
];

