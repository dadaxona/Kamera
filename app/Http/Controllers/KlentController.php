<?php

namespace App\Http\Controllers;

use App\Models\Tavar;
use App\Models\User;
use App\Providers\KlentServis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Adress;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Itogo;
use App\Models\Karzina;
use App\Models\Updatetavr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\KlentController2;
use App\Models\Clentmalumot;
use App\Models\Ishchilar;
use App\Models\Jonatilgan2;
use App\Models\Sqladpoytaxt;
use App\Models\Tavar2;
use App\Models\Tayyorsqlad;
use App\Models\Updatetavrp;

class KlentController extends KlentController2
{
    public function tavar_live(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('tavars')
            ->where('name', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
        }
        else
        {
        $data = DB::table('tavars')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td class="ui-widget-content">'.$row->name.'</td>
                    <td class="ui-widget-content">
                        <a href="javascript:void(0)" onclick="editPost2('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function tavar2_live(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data =Tavar2::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();
        }
        else
        {
        $data = Tavar2::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td class="ui-widget-content">'.$row->tavar->name.'</td>
                    <td class="ui-widget-content">'.$row->name.'</td>
                    <td class="ui-widget-content">
                        <a href="javascript:void(0)" onclick="editPost2('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function live_adress(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('adresses')
            ->where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = DB::table('adresses')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'. $row->adress.'</td>
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPosts2('.$row->id .')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

    public function malumotser_live(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('clentmalumots')
                ->where('namese2', 'like', '%'.$query.'%')
                ->orderBy('id', 'DESC')
                ->get();
            
        }
        else
        {
        $data = DB::table('clentmalumots')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {               
                $output .= '
                <tr onclick="foo('.$row->id.')" style="border-bottom: 1px solid;">
                    <td class="ui-widget-content">'.$row->namese2.'</td>
                    <td class="ui-widget-content">'.$row->familiya.'</td>
                    <td class="ui-widget-content">'.$row->sana.'</td>
                    <td class="ui-widget-content">'.$row->tels.'</td>
                    <td class="ui-widget-content">'.$row->tels2.'</td>
                    <td class="ui-widget-content">'.$row->region.'</td>
                    <td class="ui-widget-content">'.$row->adress.'</td>
                    <td class="ui-widget-content">'.$row->orentr.'</td>
                    <td class="ui-widget-content">'.$row->ishjoyi.'</td>
                    <td class="ui-widget-content">'.$row->lavozim.'</td>
                    <td class="ui-widget-content">'.$row->qoshimachaish.'</td>
                    <td class="ui-widget-content">'.$row->qoshimcha.'</td>
                    <td class="ui-widget-content">'.$row->coment.'</td>
                </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="18">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function live_clent(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')
            ->where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = DB::table('users')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->tel.'</td>
                <td class="ui-widget-content">'.$row->firma.'</td>
                <td class="ui-widget-content">'.$row->inn.'</td>
            
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                  <a href="javascript:void(0)" id="malumotclent" data-id="'.$row->id.'" class="mx-3" style="color: blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
                    </svg>
                    </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

    public function live_admin(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Drektor::where('login', 'like', '%'.$query.'%')
                        ->orderBy('id', 'DESC')
                        ->get();            
        }
        else
        {
        $data = Drektor::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->login.'</td>
                <td class="ui-widget-content">'.$row->password.'</td>            
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="4">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }


    public function live_ishchi(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ishchilar::where('name', 'like', '%'.$query.'%')
                        ->orderBy('id', 'DESC')
                        ->get();            
        }
        else
        {
        $data = Ishchilar::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->login.'</td>
                <td class="ui-widget-content">'.$row->password.'</td>            
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="4">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function index()
    {
             $dt= Carbon::now('Asia/Tashkent');  
        $sana = $dt->toDateString();
        $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
        $jonatilgan = Jonatilgan2::count();
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavar',[
            'jonatilgan'=>$jonatilgan,
             'sana2'=>$sana2,
              'brends'=>$brends
          ]);
        }else{
            return redirect('/logaut');
        }
    }
    
    public function indextip()
    {
        $data = Tavar::all();
             $dt= Carbon::now('Asia/Tashkent');  
        $sana = $dt->toDateString();
        $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
        $jonatilgan = Jonatilgan2::count();
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavartip',[
            'jonatilgan'=>$jonatilgan,
             'sana2'=>$sana2,
              'brends'=>$brends,
              'tovar'=>$data
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function store(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tel' => 'required',
            'firma' => 'required',
            'inn' => 'required',
        ]);
        if($validator->passes()){
            return $model->store($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function storemalumot(Request $request, KlentServis $model)
    {
        return $model->storemalumot($request);     
    }

    public function storeishchi(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);
        if($validator->passes()){
            return $model->storeishchi($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function storeadmin(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);
        if($validator->passes()){
            return $model->storeadmin($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function show($id)
    {
        $post = User::find($id);    
        return response()->json($post);
    }
        
    public function showklentmalumot($id)
    {
        $post = Clentmalumot::find($id);    
        return response()->json($post);
    }
    
    public function showishchi($id)
    {
        $post = Ishchilar::find($id);    
        return response()->json($post);
    }

    public function showadmin($id)
    {
        $post = Drektor::find($id);    
        return response()->json($post);
    }
    
    public function destroy($id, KlentServis $model)
    {
        return $model->delete($id);
    }

    public function deletemijoz($id, KlentServis $model)
    {
        return $model->deletemijoz($id);
    }
    
    public function deleteishchi($id, KlentServis $model)
    {
        return $model->deleteishchi($id);
    }

    public function deleteadmin($id, KlentServis $model)
    {
        return $model->deleteadmin($id);
    }
    
    public function store2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function store2tip(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.tavar_id' => 'required',
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2tip($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function show2(Request $request)
    {
        $post = Tavar2::find($request->id);
        return response()->json($post);
    }

    public function shower2($id)
    {
        $post = Tavar::find($id);    
        return response()->json($post);
    }
    
    public function edit3(KlentServis $model)
    {
        return $model->edit3();
    }

    public function update2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->update2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумот киритилмади', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function updateer2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->updateer2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумот киритилмади', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function delete2($id)
    {
        Tavar2::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }
    
    public function deleteer2($id)
    {
        Tavar::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function store3(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.tavar_id' => 'required',
            'addmore.*.adress' => 'nullable',
            'addmore.*.tavar2_id' => 'required',
            'addmore.*.raqam' => 'nullable',
            'addmore.*.hajm' => 'required',
            'addmore.*.summa' => 'required|numeric',
            'addmore.*.summa2' => 'required|numeric',
            'addmore.*.summa3' => 'required|numeric',
        ]);
        if($validator->passes()){
            return $model->store3($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function updates(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'tavar_id' => 'required',
            'adress' => 'nullable',
            'tavar2_id' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required|numeric',
            'summa2' => 'required|numeric',
            'summa3' => 'required|numeric',
        ]);
        if($validator->passes()){
            return $model->updates($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function edit4(Request $request)
    {
        // $post = Updatetavr::where('ichkitavar_id', $request->id)->first();
        $post = Ichkitavar::find($request->id);
        return response()->json($post);
    }

    public function delete3($id, KlentServis $model)
    {
        return $model->delete3($id);
    }

    public function tiklash($id, KlentServis $model)
    {
        return $model->tiklash($id);
    }

    public function deleetemnu($id, KlentServis $model)
    {
        return $model->deleetemnu($id);
    }

    public function edit5(Request $request)
    {
        $post = Ichkitavar::find($request->id);    
        return response()->json($post);
    }

    public function store4(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required',
            'summa2' => 'required'
        ]);
        if($validator->passes()){
            return $model->store4($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function adress()
    {
        $tavar = Tavar::paginate(10);
             $dt= Carbon::now('Asia/Tashkent');  
        $sana = $dt->toDateString();
        $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
        $jonatilgan = Jonatilgan2::count();
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('adress',[
            'jonatilgan'=>$jonatilgan,
             'sana2'=>$sana2,
              'brends'=>$brends,
              'tavar'=>$tavar,
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function ombor()
    {
        $tavar = Tavar::paginate(10);
             $dt= Carbon::now('Asia/Tashkent');  
        $sana = $dt->toDateString();
        $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
        $jonatilgan = Jonatilgan2::count();
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('ombor',[
            'jonatilgan'=>$jonatilgan,
             'sana2'=>$sana2,
              'brends'=>$brends,
              'tavar'=>$tavar,
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function index2()
    {
        $adress = Adress::paginate(10);
             $dt= Carbon::now('Asia/Tashkent');  
        $sana = $dt->toDateString();
        $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
        $jonatilgan = Jonatilgan2::count();
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('adress2',[
            'jonatilgan'=>$jonatilgan,
             'sana2'=>$sana2,
              'brends'=>$brends,
              'adress'=>$adress,
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function pastavka(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.adress' => 'required',
        ]);
        if($validator->passes()){
            return $model->pastavka($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотларни толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function show3($id)
    {
        $post = Adress::find($id);    
        return response()->json($post);
    }

    public function pastavkaupdate(Request $request, KlentServis $model)
    {
        return $model->pastavkaupdate($request);
    }

    public function delete4($id, KlentServis $model)
    {
        return $model->deletew4($id);
    }

    public function clents(KlentServis $model)
    {
        return $model->clents();
    }

    public function sazdat(Request $request, KlentServis $model)
    {
        return $model->sazdat($request);
    }

    public function belgila(Request $request)
    {
        $post = Karzina::find($request->id);    
        return response()->json($post);
    }

    public function belgi2(Request $request)
    {
        $post = Karzina::find($request->id);    
        return response()->json($post);
    }

    public function kursm()
    {
        $post = Itogo::find(1);    
        return response()->json($post);
    }

    public function usdkurd2(Request $request, KlentServis $model)
    {
        return $model->usdkurd2($request);
    }

    public function sotuv(Request $request)
    {
        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         if($query != '')
         {
          $data = DB::table('karzinas')
            ->where('name', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
         }
         else
         {
          $data = DB::table('karzinas')
            ->orderBy('id', 'DESC')
            ->get();
         }
         $total_row = $data->count();
         if($total_row > 0)
         {
          foreach($data as $row)
          {
           $output .= '
           <tr onclick="belgilash('.$row->id.')" style="border-bottom: 1px solid;">  
            <td class="ui-widget-content">'.$row->name.'</td>
            <td class="ui-widget-content">'.number_format($row->summa2, 3).'</td>
            <td class="ui-widget-content">'.$row->soni.'</td>
            <td class="ui-widget-content">'.$row->chegirma.'</td>
            <td class="ui-widget-content">'.number_format($row->itog, 3).'</td>
            <td class="ui-widget-content">'.$row->hajm.'</td>
           </tr>
           ';
          }
         }
         $data = array(
          'table_data'  => $output,
          'total_data'  => $total_row
         );   
         echo json_encode($data);
        }
    }

    function live_search(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavar::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavar::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr ondblclick="plus('.$row->id.')" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->hajm.'</td>
                <td class="ui-widget-content">'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }
    
    public function rum()
    {
        $data = Tavar2::all();
        return response()->json($data);        
    }
    public function rum2(Request $request)
    {
        $data = Tavar2::where('tavar_id', $request->id)->get();
        return response()->json($data);        
    }

    function sqladiskizapas(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavar::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavar::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->tavar->name.'</td>
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->hajm.'</td>
                <td class="ui-widget-content">'.$row->summa.'</td>
                <td class="ui-widget-content">'.$row->summa2.'</td>
                <td class="ui-widget-content">'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }
    
    function sqladiskizapas2(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Sqladpoytaxt::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Sqladpoytaxt::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->tavar->name.'</td>
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->hajm.'</td>
                <td class="ui-widget-content">'.$row->summa.'</td>
                <td class="ui-widget-content">'.$row->summa2.'</td>
                <td class="ui-widget-content">'.$row->summa3.'</td>
                </tr>
                ';
            }
        }

        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    function tbody3table(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = Tayyorsqlad::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Tayyorsqlad::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->tavar->name.'</td>
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->hajm.'</td>
                <td class="ui-widget-content">'.$row->summa.'</td>
                <td class="ui-widget-content">'.$row->summa2.'</td>
                <td class="ui-widget-content">'.$row->summa3.'</td>
                </tr>
                ';
            }
        }

        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function tbody3table2(Request $request)
    {
        if($request->ajax())
        {
            $output = ''; 
            $data = Tayyorsqlad::whereBetween('updated_at', [$request->date1, $request->date2])->get(); 
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                    <td class="ui-widget-content">'.$row->tavar->name.'</td>
                    <td class="ui-widget-content">'.$row->name.'</td>
                    <td class="ui-widget-content">'.$row->hajm.'</td>
                    <td class="ui-widget-content">'.$row->summa.'</td>
                    <td class="ui-widget-content">'.$row->summa2.'</td>
                    <td class="ui-widget-content">'.$row->summa3.'</td>
                    </tr>
                    ';
                }
            }
            $data = array(
                'table_data'  => $output,
            );
            echo json_encode($data);
        }
    }

    public function plus(Request $request, KlentServis $model)
    {
        return $model->plus($request);
    }

    public function minus(Request $request, KlentServis $model)
    {
        return $model->minus($request);
    }

    public function udalit(Request $request, KlentServis $model)
    {
        return $model->udalit($request);
    }

    public function yangilash(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'soni' => 'required',
            'summo' => 'required',
            'summ' => 'required'
        ]);
        if($validator->passes()){
            return $model->yangilash($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотни киритинг', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function tugle(Request $request, KlentServis $model)
    {
        return $model->tugle($request);
    }

    public function rachot()
    {
        $data = Itogo::find(1);
        return response()->json($data);
    }

    public function oplata(Request $request, KlentServis $model)
    {
        if($request->naqt){
            return $model->oplata($request);
        }elseif($request->plastik){
            return $model->oplata($request);
        }elseif($request->bank){
            return $model->oplata($request);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Барча устунлар бош']);
        }
    }

    public function zakazayt(Request $request, KlentServis $model)
    {
        return $model->zakazayt($request);
    }
}
