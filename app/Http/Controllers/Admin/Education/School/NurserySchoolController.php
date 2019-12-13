<?php

namespace App\Http\Controllers\Admin\Education\School;

use App\Models\Commune;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\NurserySchool;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NurserySchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-admin-writer-permission');
    }

    public function index() {
        $schools = School::where('type_school', '=', 1)->with('commune','district','nursery')->get();
        $districts = District::pluck('name', 'id');

        return view('admin.education.school.nursery.list')->with(compact('schools', 'districts'));
    }

    public function filter(Request $request) {
        $districts = District::pluck('name', 'id');
        $schools = School::where('type_school', '=', 1)->with('commune','district','primary');
        $filter = [];
        if ($request->district_id) {
            $filter['district_id'] = $request->district_id;
        }
        if ($request->commune_id) {
            $filter['commune_id'] = $request->commune_id;
        }
        $schools = $schools->where($filter)->get();
        return view('admin.education.school.nursery.list')->with(compact('schools', 'districts'));
    }

    public function getForm() {
        $districts = District::pluck('name', 'id');
        return view('admin.education.school.nursery.form')->with(compact('districts'));
    }

    public function saveForm(Request $request) {
        $rules = [
            'code' => 'required',
            'name' => 'required|max:100',
            'district_id' => 'required',
            'commune_id' => 'required',
            'address' => 'required',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'name_of_principal' => 'required|max:30',
            'total_of_nursery_class' => 'numeric',
            'total_of_nursery_3_12' => 'numeric',
            'total_of_nursery_13_24' => 'numeric',
            'total_of_nursery_25_36' => 'numeric',
            'total_of_nursery_collect' => 'numeric',
            'total_of_kindergarten_class' => 'numeric',
            'total_of_kindergarten_3_4' => 'numeric',
            'total_of_kindergarten_4_5' => 'numeric',
            'total_of_kindergarten_5_6' => 'numeric',
            'total_of_kindergarten_collect' => 'numeric',
            'total_of_nursery_student' => 'numeric',
            'total_of_nursery_3_12_student	' => 'numeric',
            'total_of_nursery_13_24_student' => 'numeric',
            'total_of_nursery_25_36_student' => 'numeric',
            'total_of_nursery_collect_student' => 'numeric',
            'total_of_kindergarten_student' => 'numeric',
            'total_of_kindergarten_3_4_student' => 'numeric',
            'total_of_kindergarten_4_5_student' => 'numeric',
            'total_of_kindergarten_5_6_student' => 'numeric',
            'total_of_kindergarten_collect_student' => 'numeric',
            'total_of_all_employees' => 'numeric',
            'total_of_manager' => 'numeric',
            'total_of_nursery_teacher' => 'numeric',
            'total_of_kindergarten_teacher' => 'numeric',
            'total_of_employees' => 'numeric',
            'total_classroom' => 'numeric',
            'total_classroom_nursery' => 'numeric',
            'total_classroom_kindergarten' => 'numeric',
            'total_function_room' => 'numeric',
        ];

        $messages = [
            'code.required' => 'mã trường không được để trống',
            'name.required' => 'tên trường không được để trống',
            'name.max' => 'tên trường không được quá 255 ký tự',
            'phone.numeric' => 'Số điện thoại phải nhập số',
            'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
            'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
            'district_id.required' => 'quận/huyện không được để trống',
            'commune_id.required' => 'phường/xã không được để trống',
            'address.required' => 'địa chỉ không được để trống',
            'email.email' => 'email phải là dạng email',
            'email.max' => 'email nhập tối đa 100 ký tự',
            'name_of_principal.required' => 'tên hiểu trưởng không được để trống',
            'name_of_principal.max' => 'tên hiệu trưởng nhập tối đa 30 ký tự',
            'total_of_nursery_class.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_3_12.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_13_24.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_25_36.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_collect.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_class.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_3_4.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_4_5.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_5_6.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_collect.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_3_12_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_13_24_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_25_36_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_collect_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_3_4_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_4_5_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_5_6_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_collect_student.numeric' => 'Trường này phải nhập số',
            'total_of_all_employees.numeric' => 'Trường này phải nhập số',
            'total_of_manager.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_teacher.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_teacher.numeric' => 'Trường này phải nhập số',
            'total_of_employees.numeric' => 'Trường này phải nhập số',
            'total_classroom_nursery.numeric' => 'Trường này phải nhập số',
            'total_classroom_kindergarten.numeric' => 'Trường này phải nhập số',
            'total_function_room.numeric' => 'Trường này phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $update = $request->all();
            unset($update['avatar']);
            if($request->hasFile('avatar'))
            {
                $image_path = $request->file('avatar')->store('schools', 'public');
                $update['avatar'] = $image_path;
            }
            $update['type_school'] = 1;
            $year = new Carbon($request->day_and_year);
            $update['year'] = $year->year;
            $school = School::create($update);
            $update['school_id'] = $school->id;
            NurserySchool::create($update);
            return redirect()->route('admin.school.nursery.list');
        }
    }

    public function editForm($id) {
        $districts = District::pluck('name', 'id');
        $school = School::FindOrFail($id);
        $communes = Commune::where('district_id', '=', $school->district_id)->pluck('name', 'id');
        $data = NurserySchool::where('school_id', '=', $id)->first();
        return view('admin.education.school.nursery.edit', compact('school', 'districts', 'communes', 'data'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'code' => 'required',
            'name' => 'required|max:100',
            'district_id' => 'required',
            'commune_id' => 'required',
            'address' => 'required',
            'phone' => 'numeric|min:10|min:20',
            'email' => 'email|max:100',
            'name_of_principal' => 'required|max:30',
            'total_of_nursery_class' => 'numeric',
            'total_of_nursery_3_12' => 'numeric',
            'total_of_nursery_13_24' => 'numeric',
            'total_of_nursery_25_36' => 'numeric',
            'total_of_nursery_collect' => 'numeric',
            'total_of_kindergarten_class' => 'numeric',
            'total_of_kindergarten_3_4' => 'numeric',
            'total_of_kindergarten_4_5' => 'numeric',
            'total_of_kindergarten_5_6' => 'numeric',
            'total_of_kindergarten_collect' => 'numeric',
            'total_of_nursery_student' => 'numeric',
            'total_of_nursery_3_12_student	' => 'numeric',
            'total_of_nursery_13_24_student' => 'numeric',
            'total_of_nursery_25_36_student' => 'numeric',
            'total_of_nursery_collect_student' => 'numeric',
            'total_of_kindergarten_student' => 'numeric',
            'total_of_kindergarten_3_4_student' => 'numeric',
            'total_of_kindergarten_4_5_student' => 'numeric',
            'total_of_kindergarten_5_6_student' => 'numeric',
            'total_of_kindergarten_collect_student' => 'numeric',
            'total_of_all_employees' => 'numeric',
            'total_of_manager' => 'numeric',
            'total_of_nursery_teacher' => 'numeric',
            'total_of_kindergarten_teacher' => 'numeric',
            'total_of_employees' => 'numeric',
            'total_classroom' => 'numeric',
            'total_classroom_nursery' => 'numeric',
            'total_classroom_kindergarten' => 'numeric',
            'total_function_room' => 'numeric',
        ];

        $messages = [
            'code.required' => 'mã trường không được để trống',
            'name.required' => 'tên trường không được để trống',
            'name.max' => 'tên trường không được quá 255 ký tự',
            'phone.numeric' => 'Số điện thoại phải nhập số',
            'phone.max' => 'Số điện thoại nhập tối đa 20 ký tự',
            'phone.min' => 'Số điện thoại nhập tối thiểu 10 ký tự',
            'district_id.required' => 'quận/huyện không được để trống',
            'commune_id.required' => 'phường/xã không được để trống',
            'address.required' => 'địa chỉ không được để trống',
            'email.email' => 'email phải là dạng email',
            'email.max' => 'email nhập tối đa 100 ký tự',
            'name_of_principal.required' => 'tên hiểu trưởng không được để trống',
            'name_of_principal.max' => 'tên hiệu trưởng nhập tối đa 30 ký tự',
            'total_of_nursery_class.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_3_12.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_13_24.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_25_36.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_collect.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_class.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_3_4.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_4_5.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_5_6.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_collect.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_3_12_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_13_24_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_25_36_student.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_collect_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_3_4_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_4_5_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_5_6_student.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_collect_student.numeric' => 'Trường này phải nhập số',
            'total_of_all_employees.numeric' => 'Trường này phải nhập số',
            'total_of_manager.numeric' => 'Trường này phải nhập số',
            'total_of_nursery_teacher.numeric' => 'Trường này phải nhập số',
            'total_of_kindergarten_teacher.numeric' => 'Trường này phải nhập số',
            'total_of_employees.numeric' => 'Trường này phải nhập số',
            'total_classroom_nursery.numeric' => 'Trường này phải nhập số',
            'total_classroom_kindergarten.numeric' => 'Trường này phải nhập số',
            'total_function_room.numeric' => 'Trường này phải nhập số',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $year = !empty($request->day_and_year) ? new Carbon($request->day_and_year) : '';
            $school = School::FindOrFail($id);
            if ($request->hasFile('avatar')) {
                //xoa anh cu neu co
                $currentImg = $school->avatar;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('avatar');
                $pathImage = $image->store('schools', 'public');
            }
            $avatar = !empty($pathImage) ? $pathImage : $school->avatar;
            School::where('id', '=', $id)->update([
                'code' => $request->code,
                'name' => $request->name,
                'district_id' => $request->district_id,
                'commune_id' => $request->commune_id,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'website' => $request->website,
                'acreage' => $request->acreage,
                'day_and_year' => $request->day_and_year,
                'year' => !empty($year) ? $year->year : '',
                'name_of_principal' => $request->name_of_principal,
                'avatar' => $avatar,
            ]);
            $update = $request->all();
            unset($update['_token']);
            unset($update['code']);
            unset($update['name']);
            unset($update['district_id']);
            unset($update['commune_id']);
            unset($update['address']);
            unset($update['phone']);
            unset($update['email']);
            unset($update['website']);
            unset($update['acreage']);
            unset($update['name_of_principal']);
            unset($update['avatar']);
            unset($update['day_and_year']);
            NurserySchool::where('school_id', '=', $id)->update($update);
            return redirect()->route('admin.school.nursery.list');
        }
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'code' => __('Mã trường'),
            'name' => __('Tên trường'),
            'district_id' => __('Quận/ huyện'),
            'commune_id' => __('Phường/ xã'),
            'address' => __('địa chỉ'),
            'phone' => __('số điện thoại'),
            'email' => __('thư điện tử'),
            'website' => __('website'),
            'acreage' => __('diện tích(m2)'),
            'name_of_principal' => __('Tên hiệu trưởng'),
            'total_of_nursery_class' => __('tổng số lớp học nhà trẻ'),
            'total_of_nursery_3_12' => __('tổng số lớp học nhà trẻ nhóm 3 - 12 tháng'),
            'total_of_nursery_13_24' => __('tổng số lớp học nhà trẻ nhóm 13 - 24 tháng'),
            'total_of_nursery_25_36' => __('Tổng số lớp học nhà trẻ nhóm 25 - 36 tháng'),
            'total_of_nursery_collect' => __('Tổng số lớp học nhà trẻ lớp ghép'),
            'total_of_kindergarten_class' => __('Tổng số lớp học mẫu giáo'),
            'total_of_kindergarten_3_4' => __('Tổng số lớp học mẫu giáo nhóm 3 - 4 tuổi'),
            'total_of_kindergarten_4_5' => __('Tổng số lớp học mẫu giáo nhóm 4 - 5 tuổi'),
            'total_of_kindergarten_5_6' => __('Tổng số lớp học mẫu giáo nhóm 5 - 6 tuổi'),
            'total_of_kindergarten_collect' => __('Tổng số lớp học mẫu giáo lớp ghép'),
            'total_of_nursery_student' => __('Tổng số học sinh nhà trẻ'),
            'total_of_nursery_3_12_student' => __('Tổng số học sinh nhà trẻ nhóm 3 - 12 tháng'),
            'total_of_nursery_13_24_student' => __('Tổng số học sinh nhà trẻ nhóm 13 - 24 tháng'),
            'total_of_nursery_25_36_student' => __('Tổng số học sinh nhà trẻ nhóm 25 - 36 tháng'),
            'total_of_nursery_collect_student' => __('Tổng số học sinh nhà trẻ lớp ghép'),
            'total_of_kindergarten_student' => __('Tổng số học sinh mẫu giáo'),
            'total_of_kindergarten_3_4_student' => __('Tổng số học sinh mẫu giáo nhóm 3 - 4 tuổi'),
            'total_of_kindergarten_4_5_student' => __('Tổng số học sinh mẫu giáo nhóm 4 - 5 tuổi'),
            'total_of_kindergarten_5_6_student' => __('Tổng số học sinh mẫu giáo nhóm 5 - 6 tuổi'),
            'total_of_kindergarten_collect_student' => __('Tổng số học sinh mẫu giáo lớp ghép'),
            'total_of_all_employees' => __('Tổng số cán bộ, giáo viên, nhân viên'),
            'total_of_nursery_teacher' => __('Tổng số giáo viên nhà trẻ'),
            'total_of_kindergarten_teacher' => __('Tổng số giáo viên mẫu giáo'),
            'total_of_employees' => __('Tổng số nhân viên'),
            'total_classroom_nursery' => __('Tổng số phòng học nhà trẻ'),
            'total_classroom_kindergarten' => __('Tổng số phòng học mẫu giáo'),
            'total_function_room' => __('Tổng số phòng học chức năng'),
        ];
        $schools = School::where('type_school', '=', 1)->with('district', 'commune', 'nursery')->orderBy('created_at', 'desc')->get();

        $data = [];
        foreach ($schools as $item) {
            $item['district_id'] = $item['district'] ['name'];
            $item['commune_id'] = $item['commune'] ['name'];
            $item['total_of_class'] = $item['nursery'] ['total_of_class'];
            $item['total_of_nursery_class'] = $item['nursery'] ['total_of_nursery_class'];
            $item['total_of_nursery_3_12'] = $item['nursery'] ['total_of_nursery_3_12'];
            $item['total_of_nursery_13_24'] = $item['nursery'] ['total_of_nursery_13_24'];
            $item['total_of_nursery_25_36'] = $item['nursery'] ['total_of_nursery_25_36'];
            $item['total_of_nursery_collect'] = $item['nursery'] ['total_of_nursery_collect'];
            $item['total_of_kindergarten_class'] = $item['nursery'] ['total_of_kindergarten_class'];
            $item['total_of_kindergarten_3_4'] = $item['nursery'] ['total_of_kindergarten_3_4'];
            $item['total_of_kindergarten_4_5'] = $item['nursery'] ['total_of_kindergarten_4_5'];
            $item['total_of_kindergarten_5_6'] = $item['nursery'] ['total_of_kindergarten_5_6'];
            $item['total_of_kindergarten_collect'] = $item['nursery'] ['total_of_kindergarten_collect'];
            $item['total_of_nursery_student'] = $item['nursery'] ['total_of_nursery_student'];
            $item['total_of_nursery_3_12_student'] = $item['nursery'] ['total_of_nursery_3_12_student'];
            $item['total_of_nursery_13_24_student'] = $item['nursery'] ['total_of_nursery_13_24_student'];
            $item['total_of_nursery_25_36_student'] = $item['nursery'] ['total_of_nursery_25_36_student'];
            $item['total_of_nursery_collect_student'] = $item['nursery'] ['total_of_nursery_collect_student'];
            $item['total_of_kindergarten_student'] = $item['nursery'] ['total_of_kindergarten_student'];
            $item['total_of_kindergarten_3_4_student'] = $item['nursery'] ['total_of_kindergarten_3_4_student'];
            $item['total_of_kindergarten_4_5_student'] = $item['nursery'] ['total_of_kindergarten_4_5_student'];
            $item['total_of_kindergarten_5_6_student'] = $item['nursery'] ['total_of_kindergarten_5_6_student'];
            $item['total_of_kindergarten_collect_student'] = $item['nursery'] ['total_of_kindergarten_collect_student'];
            $item['total_of_all_employees'] = $item['nursery'] ['total_of_all_employees'];
            $item['total_of_manager'] = $item['nursery'] ['total_of_manager'];
            $item['total_of_nursery_teacher'] = $item['nursery'] ['total_of_nursery_teacher'];
            $item['total_of_kindergarten_teacher'] = $item['nursery'] ['total_of_kindergarten_teacher'];
            $item['total_of_employees'] = $item['nursery'] ['total_of_employees'];
            $item['total_classroom_nursery'] = $item['nursery'] ['total_classroom_nursery'];
            $item['total_classroom_kindergarten'] = $item['nursery'] ['total_classroom_kindergarten'];
            $item['total_function_room'] = $item['nursery'] ['total_function_room'];

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('mẫu giáo data'.date('Y-m-d'), $exportFields, $data, 'mẫu giáo-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id)
    {
        School::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
