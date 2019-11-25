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
        2 => 'Cán bộ quản lý',
        3 => 'Nhân viên',
    ],

    'type_of_nursery_teacher' => [
        1 => 'Giáo viên nhà trẻ',
        2 => 'Giáo viên mẫu giáo',
        3 => 'Cán bộ quản lý',
        4 => 'Nhân viên',
    ],

    'type_of_primary_junior_high_school' => [
        1 => 'Giáo viên tiểu học',
        2 => 'Giáo viên thcs',
        3 => 'Cán bộ quản lý',
        4 => 'Nhân viên',
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
    'level_of_student_nursery' => [
        1 => 'nhóm 3-12 tháng',
        2 => 'nhóm 13-24 tháng',
        3 => 'nhóm 25-36 tháng',
        4 => 'nhóm trẻ lớp ghép',
        5 => 'nhóm 3-4 tuổi',
        6 => 'nhóm 4-5 tuổi',
        7 => 'nhóm 5-6 tuổi',
        8 => 'nhóm mẫu giáo lớp ghép',
    ],

    'level_of_student_primary' => [
        1 => 'Lớp 1',
        2 => 'Lớp 2',
        3 => 'Lớp 3',
        4 => 'Lớp 4',
        5 => 'Lớp 5',
    ],

    'level_of_student_junior_high' => [
        1 => 'Lớp 6',
        2 => 'Lớp 7',
        3 => 'Lớp 8',
        4 => 'Lớp 9',
    ],

    'level_of_student_high' => [
        1 => 'Lớp 10',
        2 => 'Lớp 11',
        3 => 'Lớp 12',
    ],

    'level_of_student_primary_junior_high' => [
        1 => 'Lớp 1',
        2 => 'Lớp 2',
        3 => 'Lớp 3',
        4 => 'Lớp 4',
        5 => 'Lớp 5',
        6 => 'Lớp 6',
        7 => 'Lớp 7',
        8 => 'Lớp 8',
        9 => 'Lớp 9',
    ],

    'level_of_student_cen' => [
        1 => 'Lớp 6',
        2 => 'Lớp 7',
        3 => 'Lớp 8',
        4 => 'Lớp 9',
        5 => 'Lớp 10',
        6 => 'Lớp 11',
        7 => 'Lớp 12',
    ],

    'type_of_student' => [
        1 => 'Xuất xắc',
        2 => 'Giỏi',
        3 => 'Khá',
        4 => 'Trung Bình',
        5 => 'Yếu/ kém',
    ],
];

