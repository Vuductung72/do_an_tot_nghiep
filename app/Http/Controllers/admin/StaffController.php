<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StaffRequest;
use App\Models\Allowance;
use App\Models\Attendance;
use App\Models\Staff;
use App\Models\Position;
use App\Models\Department;
use App\Models\Paycheck;
use App\Models\SalaryChange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        $departments = Department::all();
        $staffs = Staff::orderBy('id', 'DESC')->paginate(10);
        return view('admin.staff.index', compact('staffs','departments', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.staff.create', compact('positions', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'identityCard', 'ethnic' , 'dateOfBird', 'gender', 'email', 'phone', 'address', 'idPosition', 'idDepartment', 'salary');
            $data['salary_basic'] = $request->salary;
            $data['password'] = Hash::make($request->password);
            $dataImageStaff = $this->storageTraitUpload($request, 'image', 'ImageStaff');
            $data['image'] = $dataImageStaff['file_path'];
            $data['status'] = 0;
            Staff::create($data);
            DB::commit();
            session()->flash('success', 'Thêm tài khoản nhân viên thành công');
            return redirect()->route('ad.staffs_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('ad.staffs_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::all();
        $departments = Department::all();
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('positions', 'departments', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            DB::beginTransaction();
            $staff = Staff::find($id);
            $data = $request->only('name', 'identityCard', 'ethnic' , 'dateOfBird', 'gender', 'email', 'phone', 'address', 'idPosition', 'idDepartment', 'status');
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }else{
                $data['password'] = $staff->password;
            }
            $dataImageStaff = $this->storageTraitUpload($request, 'image', 'ImageStaff');
            if( !empty($dataImageStaff) ) {
                $data['image'] = $dataImageStaff['file_path'];
            }
            $staff->update($data);
            DB::commit();
            session()->flash('success', 'Sửa tài khoản nhân viên thành công');
            return redirect()->route('ad.staffs_index');

        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        session()->flash('success', 'Xóa tài khoản nhân viên thành công');
        return redirect()->route('ad.staffs_index');
    }

    public function attendance($id)
    {
        $attendance = Attendance::where('idStaff', '=' , $id)->orderBY('date', 'DESC')->paginate();
        return view('admin.staff.attendance', compact('attendance'));
    }

    public function listpaychecks($id)
    {
        $staff = Staff::find($id);

        $totalAllowances = 0;
        foreach ($staff->allowance as $item) {
            $totalAllowances += $item->money;
        }

        /* lấy tổng só này đi lam */
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfMonth()->toDateString();  //lay ngay dau tien cua thang
        $endDay = $startDate->endOfMonth()->toDateString();   //lay ngay cuoi cung cua thang
        $totalDay = Attendance::where('idStaff', $id)->where('date', '>=', $firstDay)-> where('date', '<=', $endDay)->count(); //tính số ngày công
        /* tính tổng lương */
        $salary = $staff->salary;
        $totalSalary = ($salary/25)*$totalDay + $totalAllowances;
        /* lấy dữ liệu bảng lương nhân viên */
        $paychecks = Paycheck::where('idStaff', '=' , $id)->orderBY('month', 'DESC')->paginate(5);
        return view('admin.staff.paycheck.index', compact('paychecks', 'staff', 'totalDay', 'totalAllowances', 'totalSalary'));
    }

    public function calculatorSalary(Request $request, $id)
    {

        try {
            DB::beginTransaction();
            // dd($id);
            $staff = Staff::find($id);
            $totalAllowances = 0;
            // dd($staff);
            foreach ($staff->allowance as $item) {
                $totalAllowances += $item->money;
            }
            /* lấy tổng só này đi lam */
            $startDate = Carbon::now(); //returns current day
            $firstDay = $startDate->firstOfMonth()->toDateString();  //lay ngay dau tien cua thang
            $endDay = $startDate->endOfMonth()->toDateString();   //lay ngay cuoi cung cua thang
            $totalDay = Attendance::where('idStaff', $id)->where('date', '>=', $firstDay)-> where('date', '<=', $endDay)->count(); //tính số ngày công
            /* tính tổng lương */
            $salary = $staff->salary;
            $totalSalary = ($salary/25)*$totalDay + $totalAllowances; // tong luong = (luong co ban/25 ngay di lam)*so ngay di lam thuc te + tong phu cap;

            $data['idStaff'] = $staff->id;
            $data['month'] = now()->month;
            $data['year'] = now()->year;
            $data['total_allowances'] = $totalAllowances;
            $data['total_day_working'] = $totalDay;
            $data['total_salary'] = $totalSalary;
            // dd($data);
            Paycheck::create($data);
            DB::commit();
            session()->flash('success', 'Tính lương thành công');
            return redirect()->route('ad.staffs_litspaycheck', ['id'=>$staff->id]);
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }   

    public function search(Request $request)
    {
        $positions = Position::all();
        $departments = Department::all();
        $name = $request->name ?? '';
        $department = $request->department ?? '';
        $position = $request->position ?? '';
        $staffs = Staff::when($name, function($query, $name){
            return $query->where('name', 'LIKE', '%' .$name. '%');
        })->when($department, function($query, $department){
            return $query->where('idDepartment', $department);
        })->when($position, function($query, $position){
            return $query->where('idPosition', $position);
        })->orderBy('id', 'desc')->paginate(10);

        return view('admin.staff.index', compact('positions', 'departments', 'staffs', 'name', 'department', 'position'));
    }

    public function salaryChange($id)
    {
        $staff = Staff::find($id);
        $salary_changes = SalaryChange::where('id_staff', '=' , $id)->orderBY('created_at', 'DESC')->paginate(5);
        return view('admin.staff.paycheck.salary_change', compact('staff', 'salary_changes'));
    }

    public function calculatorSalaryChange(Request $request, $id)
    {
        
        try {
            DB::beginTransaction();
            $staff = Staff::find($id);
            $data['id_staff'] = $staff->id;
            $data['old_salary'] = $staff->salary;
            $data['new_salary'] = $request->new_salary;
            if ($request->has('reason')) {
                $data['reason'] = $request->reason;
            }
            // dd($data);
            SalaryChange::create($data);
            $staff->update([
                'salary' => $request->new_salary
            ]);
            DB::commit();
            session()->flash('success', 'Tính lương thành công');
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Tính lương thất bại');
            return redirect()->back();
        }
    }

}
