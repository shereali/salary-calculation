<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        return view('home');
    }

    public function salaryCalculator(Request $request){
        /*Imagine, if 9 hours working hour per day, 30 days in month on average, 4 weekends in a month. Then total working
        hours in a month will be 30 – (4 + 3) = 23 x 9 = 207 hours. [ if 4 weekends in a month holiday will be 4 days
        and if there are extra holidays 3 days then total 7days holiday]

        So, if 8 hours working hour per day then total hours in a month will be = 30 – (4 x 2) = 22 x 8 = 176 hours [
        Friday and Saturday are government holiday so total holiday in a month = 4 x 2 = 8 days]

        */

        $hours_by_8 = (30 - (4 * 2)) * 8;
        $hours_by_9 = (30 - (4 + 3)) * 9;
       
    
        /*
        

        So, if 176 working hours salary is 30000
        Then 207 hours working salary will be (30000 x 207) / 176 = 35284 tk.
        */
         $salary_by_9_hours_in_a_month = (30000 * $hours_by_9) / $hours_by_8;
        /*
        If provident fund is deducted by 3% then total provident fund deduction will be (35284 x 3) / 100 = 1058.52
        And if per year insurance is 5000 Tk then per month insurance deduction will be 5000 / 12 = 416.67 tk.

        So, Net salary for each employee in a month will be 35284 – (1058.52 + 416.67) = 33808.81 tk.
        */
        
        $provident_fund_deduction_per_month = ($salary_by_9_hours_in_a_month * 3)/100;
        $insurance_deduction_per_month = 5000 / 12;

        $net_salary = $salary_by_9_hours_in_a_month - ($provident_fund_deduction_per_month +
        $insurance_deduction_per_month);
        
        /*
        If December is the month of finishing financial year and 2 corer Tk revenue in 2020 then
        Total revenue share = (20000000 x 5) / 100 = 1000000 Tk
        And now If team member is 50 then
        50 Team members will receive revenue share is 1000000
        So, each employee will receive 1000000 / 50 = 20000
        Now, each employee’s Salary of the January month in 2021 will be 33808.81 + 20000 = 53808.81 Tk
        */  
         $total_salary = $salary_by_9_hours_in_a_month;

        if($request->month == "January"){
            $total_revenue_of_company = $request->revenue;
            $total_revenue_share = ($total_revenue_of_company * 5) / 100;
            $each_employee_revenue_share = $total_revenue_share / $request->total_employee;

            $total_salary = $salary_by_9_hours_in_a_month + $each_employee_revenue_share;
        }

        

         return redirect()->back()->with(
             [
                'name' => $request->name, 
                'month' => $request->month,
                'total_salary' => $total_salary
            ]);

        
    }
}
