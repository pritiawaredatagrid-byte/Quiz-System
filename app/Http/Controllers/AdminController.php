<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;

use Session;
class AdminController extends Controller
{
    function login(Request $request){
        
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where([
            ['name',"=", $request->name],
            ['password',"=", $request->password],
        ])->first();

        if(!$admin){
             $validation = $request->validate([
            'user' => 'required',
        ],[
            'user.required' => 'User does not exist',
        ]);
        }
        Session::put('admin',$admin);
        return redirect('dashboard');
    }

    function dashboard(){
        $admin =  Session::get('admin');
        if($admin){
            return view('admin',["name"=>$admin->name]);
        }else{
           return redirect('/admin-login'); 
        }
        return view('admin',$admin);
    }

    function categories(){
        $categories = category::get();
        $admin =  Session::get('admin');
        if($admin){
            return view('categories',["name"=>$admin->name,"categories"=>$categories]);
        }else{
           return redirect('/admin-login'); 
        }
    }

    function addCategory(Request $request){
        $validation = $request->validate([
              'category' => 'required|min:3|unique:categories,name',
        ]);

       $admin =  Session::get('admin');
       $category = new Category();
       $category->name = $request->category;
       $category->creator = $admin->name;
       if($category->save()){
           Session::flash('category','Category '.$request->category.' added successfully.');
       }else{
           return 'Something went wrong';  
    }
         return redirect('admin-categories');
    }

    function deleteCategory($id){
        $admin =  Session::get('admin');
        if($admin){
            $category = Category::find($id);
            if($category->delete()){
                Session::flash('category','Category deleted successfully.');
            }else{
                return 'Something went wrong';  
            }
            return redirect('admin-categories');
        }else{
           return redirect('/admin-login'); 
        }
    }   

   
    public function showAddQuizForm()
    {
        $admin = Session::get('admin');

        if (!$admin) {
            return redirect('/admin-login');
        }

        $categories = Category::all();

        return view('add-quiz', [
            'name' => $admin->name,
            'categories' => $categories
        ]);
    }

    public function addQuiz(Request $request)
    {
        $admin = Session::get('admin');

        if (!$admin) {
            return redirect('/admin-login');
        }

        $quizName = $request->input('quiz');
        $category_id = $request->input('category_id');

        if ($quizName && $category_id) {
            $quiz = new Quiz();
            $quiz->name = $quizName;
            $quiz->category_id = $category_id;

            if ($quiz->save()) {
                Session::put("quizDetails", $quiz);
                Session::flash('quiz', 'Quiz added successfully.');
            }
        }

        return redirect()->back(); 
    }

    function logout(){
        Session::forget('admin');
        return redirect('/admin-login');
    }

}
